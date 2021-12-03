<?php


namespace app\controller;


use think\facade\Db;
use think\facade\View;

class GithubNotice extends Common
{
    public function index(){
        $pageSize = 20;
        $where = [];
        $list = Db::table('github_notice')->where($where)->order("id", 'desc')->paginate($pageSize);
        $data['list'] = $list->items();
        $data['page'] = $list->render();
        return View::fetch('index', $data);
    }
}