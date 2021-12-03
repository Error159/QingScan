<?php

namespace app\controller;

use think\facade\Db;
use think\facade\View;

class Node extends Common
{

    public function index()
    {
        /*
        echo '<pre>';
        // 设置代理
        $filename = '/data/tools/xray/config.yaml';
        $arr = yaml_parse_file($filename);
        $arr['http']['proxy_rule'][0]['match'] = '*';
        $proxyArr = Db::name('proxy')->where('status', 1)->limit(8)->orderRand()->select();
        foreach ($proxyArr as $v) {
            $result = testAgent($v['host'], $v['port']);
            if ($result == 200) {
                $proxy[] = 'http://' . $v['host'] . ":{$v['port']}";
            }
        }
        $arr['http']['proxy_rule'][0]['servers'] = [];
        $weight = random_split(10,count($proxy));
        foreach ($proxy as $k=>$v) {
            $arr['http']['proxy_rule'][0]['servers'][] = [
                'addr' => $v,
                'weight' => $weight[$k],
            ];
        }
        yaml_emit_file($filename, $arr);

        exit;*/
        $pageSize = 20;
        $where = [];
        $list = Db::table('node')->where($where)->order("id", 'desc')->paginate($pageSize);
        $data['list'] = $list->items();
        $data['page'] = $list->render();
        return View::fetch('index', $data);
    }
}
