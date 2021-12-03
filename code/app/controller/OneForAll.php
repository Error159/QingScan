<?php


namespace app\controller;


use think\facade\Db;
use think\facade\View;

class OneForAll extends Common
{
    public function index(){
        $pageSize = 20;
        $where = [];
        $list = Db::table('one_for_all')->where($where)->order("id", 'desc')->paginate($pageSize);
        $data['list'] = $list->items();
        foreach ($data['list'] as &$v) {
            $v['app_name'] = Db::name('app')->where('id',$v['app_id'])->value('name');
        }
        $data['page'] = $list->render();
        return View::fetch('index', $data);
    }
}