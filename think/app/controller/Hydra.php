<?php


namespace app\controller;


use think\facade\Db;
use think\facade\View;

class Hydra extends Common
{
    public function index(){
        $pageSize = 20;
        $where = [];
        $list = Db::table('host_hydra_scan_details')->where($where)->order("id", 'desc')->paginate($pageSize);
        $data['list'] = $list->items();
        foreach ($data['list'] as &$v) {
            $v['host'] = Db::name('host')->where('id',$v['host_id'])->value('hsot');
        }
        $data['page'] = $list->render();
        return View::fetch('index', $data);
    }
}