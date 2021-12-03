{include file='public/head' /}
<div class="col-md-12 ">
    <div class="row tuchu">
        <div class="col-md-9">
            <form class="form-inline" method="get" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                <input type="text" name="url" class="form-control" placeholder="URL">
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
        </div>
        <div class="col-md-2">
            <a href="<?php echo url('urls/add')?>" class="btn btn-success">添加URL</a>
        </div>
    </div>
    <div class="row tuchu">
        <!--            <div class="col-md-1"></div>-->
        <div class="col-md-12 ">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>URL</th>
                    <th>APP</th>
                    <th>ICP</th>
                    <th>邮箱</th>
                    <th>身份证号码</th>
                    <th>手机号码</th>
                    <th>扫描时间</th>
                    <th>创建时间</th>
                    <th>sqlmap</th>
                    <!--                    <td style="width: 70px">状态</td>-->
                    <th style="width: 200px">操作</th>
                </tr>
                </thead>
                <?php foreach ($list as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td class="ellipsis-type"><a href="<?php echo $value['url'] ?>"
                                                     target="_blank"><?php echo $value['url'] ?></a></td>
                        <td>
                            <a href="<?php echo U('urls/index', ['app_id' => $value['app_id']]) ?>"><?php echo isset($appArr[$value['app_id']])?$appArr[$value['app_id']]:'' ?></a>
                        </td>
                        <td><?php echo $value['icp'] ?></td>
                        <td><?php echo $value['email'] ?></td>
                        <td><?php echo $value['id_card'] ?></td>
                        <td><?php echo $value['phone'] ?></td>
                        <td><?php
                            echo ($value['scan_time'] == "2000-01-01 00:00:00") ? "未扫描" : ((strtotime($value['scan_time']) > time()) ? '扫描失败' : $value['scan_time'])
                            ?></td>
                        <td><?php echo $value['create_time'] ?></td>
                        <td><?php echo date('m-d H:i',strtotime($value['sqlmap_scan_time'] ))?></td>
                        <!--                        <td>--><? //= $statusArr[$value['scan_status']] ?><!--</td>-->
                        <td>
                            <a href="<?php echo url('xray/details',['id'=>$value['id']])?>"
                               class="btn btn-sm btn-primary">查看漏洞</a>
                            <a href="<?php echo url('urls/del',['id'=>$value['id']])?>" class="btn btn-sm btn-warning">删除</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    {include file='public/fenye' /}
</div>
{include file='public/footer' /}