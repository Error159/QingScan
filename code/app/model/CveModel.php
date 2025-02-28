<?php
/**
 * Created by PhpStorm.
 * User: song
 * Date: 2018/8/15
 * Time: 上午10:54
 */


namespace app\model;


use Requests;
use think\facade\Db;

class CveModel extends BaseModel
{

    public static $user = "78778443@qq.com";
    public static $token = "fofatoken";

    public static function scan()
    {
        while (true) {
            $endTime = date('Y-m-d', time() - 86400 * 15);
            $where = ['is_poc' => 1];
            $hostLit = Db::table('vulnerable')->where($where)->whereNotNull('fofa_con')->whereTime('scan_time', '<=', $endTime)->orderRand()->limit(5)->select()->toArray();
            foreach ($hostLit as $val) {
                self::cve($val);
                Db::table('host')->where(['id' => $val['id']])->save(['scan_time' => date('Y-m-d H:i:s')]);
            }

            print_r("本轮CVE扫描完成，休息10秒...");
            sleep(10);
        }
        $cveList = Db::table('vulnerable')->where($where)->select()->toArray();


    }


    public static function cve($cveInfo)
    {

        $pocInfo = Db::table('pocs_file')->where(['cve_num' => $cveInfo['cve_num']])->find();
        $pocPath = "/mnt/c/mycode/work/qing-scan/";
        $user = self::$user;
        $token = self::$token;
        $cmd = "pocsuite -r {$pocPath}{$pocInfo['poc_file']} --dork-fofa  '{$cveInfo['fofa_con']}'   --fofa-user {$user}  --fofa-token  {$token}";
        systemLog($cmd);
    }

    public static function execute_poc($cveNum)
    {
    }

    public static function fofaSearch()
    {

        while (true) {
            $endTime = date('Y-m-d', time() - 86400 * 15);
            $where = ['is_poc' => 1];
            $cveList = Db::table('vulnerable')->where($where)->whereNotNull('fofa_con')->whereTime('scan_time', '<=', $endTime)->orderRand()->limit(5)->select()->toArray();
            foreach ($cveList as $val) {
                $keywords = $val['fofa_con'];
                $str = urlencode(base64_encode($keywords));
                $list = Requests::get('https://fofa.so/api/v1/search/all?email=xxxxxx@qq.com&key=fofatoken&qbase64=' . $str);
                var_dump($list);
                $list = json_decode($list->body, true)['results'];
                var_dump($list);
                die;
                Db::table('host')->where(['id' => $val['id']])->save(['scan_time' => date('Y-m-d H:i:s')]);
            }

            print_r("本轮CVE扫描完成，休息10秒...");
            sleep(10);
        }


    }

    public static function searchCveFile()
    {

        $path = "/mnt/c/mycode/work/qing-scan/tools/pocs";


        $list = getDirFileName($path);
        foreach ($list as $fileName) {
            if (strstr($fileName, ".py") == false) {
                continue;
            }
            $content = file_get_contents($fileName);
            $regex = "/(cve|CVE)-\d\d\d\d-\d\d\d\d?\d?/";
            $num_matches = preg_match_all($regex, $content, $result);

            if ($num_matches == 0) {
                continue;
            }

            $cveArr = array_unique(array_map('strtoupper', $result[0]));
            $poc_file = str_replace(dirname(dirname(dirname(__DIR__))) . "/", "", $fileName);
            foreach ($cveArr as $cveNum) {
                $data = ['cve_num' => $cveNum, 'poc_file' => $poc_file];
                Db::table('vulnerable')->where(['cve_num' => $cveNum])->save(['is_poc' => 1]);
                Db::table('pocs_file')->extra('IGNORE')->insert($data);
            }
        }
    }
}
