{include file='public/head' /}
<div class="row tuchu">
    <div class="col-md-9">
        <form class="row g-3" method="get" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
            <div class="col-auto">
                <input type="text" name="name" class="form-control" placeholder="名称">
            </div>
            <div class="col-auto">
                <input type="text" name="url" class="form-control" placeholder="URL">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">搜索</button>
            </div>
        </form>
    </div>
    <div class="col-md-2">
        <a href="/index.php?s=host/add" class="btn btn-success">添加主机</a>
    </div>
</div>

<div class="row tuchu">
    <!--            <div class="col-md-1"></div>-->
    <div class="col-md-12 ">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>域名</th>
                <th>HostName</th>
                <th>所属项目</th>
                <th>国家</th>
                <th>省份</th>
                <th>城市</th>
                <th>ISP</th>
                <!--<th>Nmap扫描时间</th>-->
                <th>创建时间</th>
                <!--                    <td style="width: 70px">状态</td>-->
                <th style="width: 200px">操作</th>
            </tr>
            </thead>
            <?php foreach ($list as $value) { ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['domain'] ?></td>
                    <td><?php echo $value['host'] ?></td>
                    <td><?php echo $appArr[$value['app_id']] ?></td>
                    <td><?php echo $value['country'] ?></td>
                    <td><?php echo $value['region'] ?></td>
                    <td><?php echo $value['city'] ?></td>
                    <td><?php echo $value['isp'] ?></td>
                    <td><?php echo $value['create_time'] ?></td>
                    <!--                        <td>--><? //= $statusArr[$value['scan_status']] ?><!--</td>-->
                    <td>
                        <a href="/index.php?s=host/bug_list&task_id=<?php echo $value['id'] ?>"
                           class="btn btn-sm btn-primary">查看详情</a>
                        <a href="#" class="btn btn-sm btn-warning">删除</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

</div>

{include file='public/fenye' /}
<script>
    $("#starScan").click(function () {
        $.get("/index.php?s=host/_start_scan&url_id=<?php echo $value['id'] ?>", function (result) {
            alert("操作成功")
            location.reload();
        });
    });
</script>
{include file='public/footer' /}