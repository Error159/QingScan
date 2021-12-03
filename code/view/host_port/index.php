{include file='public/head' /}

<div class="row tuchu">
    <div class="col-md-12">
        <form class="form-inline" method="get" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
            <input type="text" name="search" class="form-control" placeholder="输入搜索的内容" value="<?php echo htmlentities($_GET['search']??'') ?>">
            <!--<div class="form-group">
                <select class="form-control" name="project_id">
                    <option value="">项目列表</option>
                    <?php /*foreach ($projectList as $value) { */?>
                        <option value="<?php /*echo $value */?>" <?php /*echo ($_GET['project_id'] ?? '' == $value) ? 'selected' : '' */?>><?php /*echo $projectArr[$value]['name'] */?></option>
                    <?php /*} */?>
                </select>
            </div>-->
            <div class="form-group">
                <select class="form-control" name="host">
                    <option value="">主机名称</option>
                    <?php foreach ($host as $value) { ?>
                        <option value="<?php echo $value ?>" <?php echo ($_GET['host'] ?? '' == $value) ? 'selected' : '' ?>><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="port">
                    <option value="">端口号</option>
                    <?php foreach ($port as $value) { ?>
                        <option value="<?php echo $value ?>" <?php echo ($_GET['port'] ?? '' == $value) ? 'selected' : '' ?>><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="service">
                    <option value="">组件名称</option>
                    <?php foreach ($service as $value) { ?>
                        <option value="<?php echo $value ?>" <?php echo ($_GET['service'] ?? '' == $value) ? 'selected' : '' ?>><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="check_status">
                    <option value="-1">审计状态</option>
                    <?php foreach ($check_status_list as $key=>$value) { ?>
                        <option value="<?php echo $key ?>" <?php if(isset($_GET['check_status']) && $_GET['check_status'] == $key) echo 'selected' ?>><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">搜索</button>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-2">
        <div class="row tuchu">
            <?php foreach ($classify as $value) { ?>
                <table class="table">
                    <tr>
                        <th colspan="2"><?php echo $value[0] ?></th>
                    </tr>
                    <?php foreach ($value[1] as $val) { ?>
                        <tr>
                            <td>
                                <a href=" {$_SERVER['REQUEST_URI']}&{$value[2]}={$val['name']} ?>"><?php echo $val['name'] ?></a>
                            </td>
                            <td><?php echo $val['num'] ?></td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } ?>
        </div>
    </div>
    <div class="col-md-10 ">
        <div class=" tuchu">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>HostName</th>
                    <th>Port</th>
                    <th>端口类型</th>
                    <th>服务名称</th>
                    <th>创建时间</th>
                    <th style="width: 200px">操作</th>
                </tr>
                </thead>
                <?php foreach ($list as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><a href=""><?php echo $value['host'] ?></a></td>
                        <td><?php echo $value['port'] ?></td>
                        <td><?php echo $value['type'] ?></td>
                        <td><?php echo $value['service'] ?></td>
                        <td><?php echo $value['create_time'] ?></td>
                        <td>
                            <a href="<?php echo url('host_port/details',['id'=>$value['id']])?>"
                               class="btn btn-sm btn-primary">查看详情</a>
                            <a href="<?php echo url('host_port/del',['id'=>$value['id']])?>" class="btn btn-sm btn-warning">删除</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        {include file='public/fenye' /}
    </div>
</div>
<script>
    /*$("#starScan").click(function () {
        id = 100;
        $.get("/index.php?s=host/_start_scan&url_id=" + id, function (result) {
            alert("操作成功")
            location.reload();
        });
    });*/
</script>
{include file='public/footer' /}