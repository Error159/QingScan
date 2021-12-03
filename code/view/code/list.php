{include file='public/head' /}
<div class="row tuchu">
    <div class="col-md-10">
        <form class="row g-3" method="get" action="/index.php">

            <input type="hidden" name="s" value="app/index">
            <div class="col-auto">
                <input type="text" class="form-control" placeholder="" name="s">
            </div>
            <div class="col-auto">
                <input type="submit" value="搜索" class="btn btn-primary">
            </div>
        </form>
    </div>
    <div class="col-md-2">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">添加</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12 ">
        <div class="row ">
            <div class="col-md-12 ">
                <div class=" row tuchu">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>项目名称</th>
                            <th>项目地址</th>
                            <th>拉去方式</th>
                            <th>缺陷数量</th>
                            <th>Fortify扫描时间</th>
                            <th>Semgrep扫描时间</th>
                            <th>Kunlun扫描时间</th>
                            <th style="width: 200px">操作</th>
                        </tr>
                        </thead>
                        <?php foreach ($list as $value) { ?>
                            <tr>
                                <td><?php echo $value['id'] ?></td>
                                <td><?php echo $value['name'] ?></td>
                                <td> <?php echo $value['ssh_url'] ?> </td>
                                <td><?php echo $value['pulling_mode'] ?></td>
                                <td><?php echo $num_arr[$value['id']] ?? 0 ?></td>
                                <td><?php echo $value['scan_time'] ?></td>
                                <td><?php echo $value['semgrep_scan_time'] ?></td>
                                <td><?php echo $value['kunlun_scan_time'] ?></td>
                                <td>
                                    <a href="<?php echo url('code/bug_list', ['project_id' => $value['id']]) ?>"
                                       class="btn btn-sm btn-success">查看漏洞</a>
                                    <a href="<?php echo url('code/edit_modal', ['id' => $value['id']]) ?>"
                                       class="btn btn-sm btn-success">编辑</a>
                                    <a href="<?php echo url('code/code_del', ['id' => $value['id']]) ?>"
                                       class="btn btn-sm btn-warning">删除</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{include file='public/fenye' /}
{include file='code/add_modal' /}
{include file='public/footer' /}