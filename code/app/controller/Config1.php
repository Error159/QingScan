<?php

namespace app\controller;

use app\model\AppModel;
use app\model\ConfigModel;


class Config1 extends Common
{

    public $statusArr = ["未启用", "已启用", "已删除"];
    public $typeArr = ["未知", "爬虫配置", "扫描配置"];

    public function index()
    {
        $where[] = ['status','<',2];
        $scanList = ConfigModel::getListByWhere($where);
        $data = ['list' => $scanList, 'statusArr' => $this->statusArr, 'typeArr' => $this->typeArr];
        return view('config/index', $data);
    }

    public function add()
    {

        $defaultConfig = file_get_contents("tools/rad/rad_config.yml");
        $configArr = yaml_parse($defaultConfig);
        $configJson = json_encode($configArr);
        //yaml_emit     数组转yaml
        //yaml_parse    yaml转数组


        $this->show('config/add', ['defaultConfig' => $defaultConfig]);
    }

    public function _add()
    {

        $param = $_POST;
        $data = [
            'name' => $param['name'],
            'data' => json_encode($param),
            'status' => 1
        ];
        ConfigModel::addData($data);

        $this->Location("/index.php?s=config/index");
    }

    public function _edit_rad()
    {
        $param = $_POST;
        $id = getParam('id');
        $data = [
            'name' => $param['name'],
            'data' => json_encode($param),
            'status' => 1
        ];

        ConfigModel::updateConfig($id, $data);
    }

    public function edit()
    {
        $id = getParam('id');


        $configInfo = ConfigModel::getInfo($id);
        //判断配置是爬虫还是扫描
        $tpl = ($configInfo['type'] == 1) ? 'config/edit_rad' : 'config/edit_xray';

        //        var_dump($configInfo);
        $this->show($tpl, ['config' => $configInfo]);
    }

}
