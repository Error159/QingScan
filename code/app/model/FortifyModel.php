<?php
/**
 * Created by PhpStorm.
 * User: song
 * Date: 2018/8/15
 * Time: 上午10:54
 */


namespace app\model;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use think\facade\Db;


class FortifyModel extends BaseModel
{

    public static $tableName = 'fortify';
    public static $fortifyPath = "/data/tools/fortify_linux";

    /**
     * @return string
     */
    public static function getFortifData($xmlPath)
    {

        $str = file_get_contents($xmlPath);

        $obj = simplexml_load_string($str, "SimpleXMLElement", LIBXML_NOCDATA);
        $test = json_decode(json_encode($obj), true);

        if (!isset($test['ReportSection'][2])) {
            echo "{$xmlPath} 数据为空";
            return [];
        }

        $list = $test['ReportSection'][2]['SubSection']['IssueListing']['Chart']['GroupingSection'] ?? [];

        $list = isset($list['Issue']) ? [$list] : $list;

        $data = [];
        foreach ($list as &$value) {
            unset($value['MajorAttributeSummary']);
            $value = isset($value['Issue'][0]) ? $value['Issue'] : [$value['Issue']];
            foreach ($value as &$val) {
                unset($val['@attributes']);
                foreach ($val as &$v) {
                    $v = is_string($v) ? $v : json_encode($v);
                }
                $data[] = $val;
            }
        }

        foreach ($data as &$value) {
            $Primary = empty($value['Primary']) ? [] : json_decode($value['Primary'], true);
            $Source = empty($value['Source']) ? [] : json_decode($value['Source'], true);

            $value['Source_filename'] = $Source['FilePath'] ?? '';
            $value['Primary_filename'] = $Primary['FilePath'];
        }

        var_dump($data);

        return $data;
    }

    /**
     * @param int $id
     * @param string $url
     * @param string $callUrl
     * @throws Exception
     */
    public static function sendTask(int $id, string $url)
    {
        $rabbitConf = getRabbitMq();
        $connection = new AMQPStreamConnection($rabbitConf['host'], $rabbitConf['port'], $rabbitConf['user'], $rabbitConf['password'], $rabbitConf['vhost']);
        $channel = $connection->channel();

        $queueName = "rad";
        $channel->queue_declare($queueName, false, false, false, false);

        //发送任务到节点
        $data = [
            'id' => $id,
            'url' => $url
        ];

        $sendData = json_encode($data);

        $msg = new AMQPMessage($sendData);
        $result = $channel->basic_publish($msg, '', $queueName);

        addlog(['发送爬虫任务', $id, $url, $data]);


        $channel->close();
        $connection->close();

    }


    public static function getCrawlerInfo($crawlerId)
    {

        //查询具体数据,并刷新缓存
        $result = self::getList(['id' => $crawlerId]);


        return $result[0] ?? false;

    }

    /**
     * 获取APP的URL地址
     *
     * @param int $appId
     * @return mixed
     */
    public static function getCrawlerList(int $appId)
    {

        //查询具体数据,并刷新缓存
        $result = self::getList(['app_id' => $appId]);


        return $result;

    }

    /**
     * @param  $where
     * @param int $limit
     * @param array $otherParam
     * @return mixed
     */
    private static function getList($where, int $limit = 50, int $page = 1, array $otherParam = [])
    {

        //$where['author'] = [''];
        $result = Db::table(self::$tableName)->where($where)->order('id', 'desc')->limit($limit)->page($page)->select()->toArray();

        return $result;
    }

    private static function getCount($where, array $otherParam = [])
    {
        $db = new MysqlLib(getMysql());
        $group = $otherParam['group'] ?? '';

        $db = $db->table(self::$tableName);

        if ($group) {
            $db->group($group);
        }

        $result = $db->where($where)->count();


        return $result[0]['num'] ?? 0;
    }


    public static function getListByWherePage($where, $page, $pageSize = 15)
    {

        $list = self::getList($where, $pageSize, $page);

        $count = self::getCount($where);

        return ['list' => $list, 'count' => $count, 'pageSize' => $pageSize];
    }

    public static function getListByWhere($where)
    {

        $list = self::getList($where);

        return $list;
    }

    /**
     * 获取单条记录
     *
     * @param int $id
     * @return array
     */
    public static function getInfo(int $id)
    {
        $where = ['id' => $id];

        $list = self::getList($where);

        return $list[0] ?? [];
    }

    /**
     * 内部方法，更新数据
     *
     * @param array $where
     * @param array $data
     * @return mixed
     */
    private static function updateByWhere(array $where, array $data)
    {
        $crawlerApi = new MysqlLib();

        //更新条件
        $crawlerApi = $crawlerApi->table(self::$tableName)->where($where);

        //执行更新并返回数据
        $crawlerApi->update($data);
    }

    /**
     * 更新生成任务状态
     *
     * @param string $crawlerNum
     * @param int $status
     */
    public static function updateStatus(int $id, int $status)
    {
        $where = ['id' => $id];
        $data = ['status' => $status];
        self::updateByWhere($where, $data);
    }


    public static function updateScanStatus(int $id, int $status, string $cmdResult)
    {
        $where = ['id' => $id];
        $data = ['scan_status' => $status, 'cmd_result' => $cmdResult];
        self::updateByWhere($where, $data);
    }

    public static function updateCrawlStatus(int $id, int $status)
    {
        $where = ['id' => $id];
        $data = ['crawl_status' => $status];
        self::updateByWhere($where, $data);
    }

    /**
     * @param array $data
     */
    public static function addDataAll(int $id, array $data, $user_id = 0)
    {
        foreach ($data as $key => $value) {
            $value['project_id'] = $id;
            $value['user_id'] = $user_id;
            $value['hash'] = md5($value['project_id'] . $value['Category'] . $value['Abstract'] . $value['Primary']);
            self::add($value);
        }
    }

    public static function getProjectCount($projectId)
    {
        $where = ['project_id' => $projectId];

        $data = DB::table(self::tableName)->where($where)->count();

        return $data;
    }

    public static function startScan($codePath, $outPath)
    {
        //如果已经存在XML文件直接返回
        if (file_exists("{$outPath}.xml")) {
            return true;
        }
        $buildId = md5($codePath);

        if (file_exists($outPath)) {
            chmod($outPath, 0777);
        }

        $fortifyPath = self::$fortifyPath;
        $base = "cd {$fortifyPath}/bin && ";
        if (file_exists("{$outPath}.fpr") == false) {
            $cmd = $base . "./sourceanalyzer -b {$buildId} -clean";
            systemLog($cmd);
            $cmd = $base . "./sourceanalyzer -b {$buildId} -Xmx4096M -Xms2048M -Xss48M     -source 1.8 -machine-output   {$codePath}";
            systemLog($cmd);
            $cmd = $base . "./sourceanalyzer -b {$buildId} -scan -format fpr    -f {$outPath}.fpr -machine-output ";
//        $cmd .= " -no-default-rules  -rules  {$fortifyPath}/Core/config/rules/core_php.bin";
            systemLog($cmd);
        }
        if (file_exists("{$outPath}.xml") == false) {
            $cmd = $base . "./ReportGenerator  -format xml -f {$outPath}.xml -source {$outPath}.fpr -template DeveloperWorkbook.xml";
            systemLog($cmd);
        }
        //删除日志
        $cmd = "echo '' > /root/.fortify/sca20.2/log/sca.log";
        systemLog($cmd);
        $cmd = "echo '' > /root/.fortify/sca20.2/log/sca_FortifySupport.log";
        systemLog($cmd);
    }


    public static function addData(array $data)
    {
        return self::add($data);
    }

    private static function add($data)
    {
        Db::table(self::$tableName)->extra("IGNORE")->insert($data);
    }
}
