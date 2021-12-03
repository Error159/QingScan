{include file='public/head' /}
<?php
$typeArr = [
        'whatweb'=>'whatweb',
        'oneforall'=>'oneforall',
        'hydra'=>'hydra',
        'dirmap'=>'dirmap',
        'sqlmap'=>'sqlmap',
    ];
?>
<div class="col-md-12 ">
    <div class="row tuchu">
        <div class="col-md-10">
            <h3 style="align-content: center">id: <?php echo $info['id']?></h3>
            <h5 >状态: <?php echo $info['status']?></h5>
            <h5 >名称: <?php echo $info['name']?></h5>
            <h5 >URL: <?php echo $info['url']?></h5>
            <h5 >创建: <?php echo $info['create_time']?></h5>
            <h5 >爬虫: <?php echo $info['crawler_time']?></h5>
            <h5 >awvs扫描时间: <?php echo $info['awvs_scan_time']?></h5>
            <h5 >子域名扫描时间: <?php echo $info['subdomain_time']?></h5>
            <h5 >是否删除: <?php echo $info['is_delete']?></h5>
            <h5 >用户名称: <?php echo $info['username']?></h5>
            <h5 >密码: <?php echo $info['password']?></h5>
            <h5 >指纹扫描时间: <?php echo $info['whatweb_scan_time']?></h5>
            <h5 >V2子域名扫描时间: <?php echo $info['subdomain_scan_time']?></h5>
            <h5 >截图: <?php echo $info['screenshot_time']?></h5>
            <h5 >xray扫描时间<?php echo $info['xray_scan_time']?></h5>
            <h5 >dirmap扫描时间: <?php echo $info['dirmap_scan_time']?></h5>
            <!--<form class="form-inline" method="get" action="">
                <div class="form-group">
                    <label class="sr-only">类型</label>
                    <select class="form-control" name="type">
                        <option value="">请选择类型</option>
                        <?php /*foreach ($typeArr as $value) { */?>
                            <option value="<?php /*echo $value */?>" <?php /*echo ($GET['type'] ?? '' == $value) ? 'selected' : '' */?>><?php /*echo $value */?></option>
                        <?php /*} */?>
                    </select>
                </div>
                <input type="submit" class="btn btn-default">
            </form>-->
        </div>
    </div>
    <div class="row tuchu">
        <!--            <div class="col-md-1"></div>-->
        <div class="col-md-12 ">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>target</th>
                    <th>http_status</th>
                    <th>request_config</th>
                    <th>plugins</th>
                    <th>发布时间</th>
                </tr>
                </thead>
                <?php foreach ($whatweb as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['target'] ?></td>
                        <td><?php echo $value['http_status'] ?></td>
                        <td><?php echo $value['request_config'] ?></td>
                        <td><?php echo $value['plugins'] ?></td>
                        <td><?php echo $value['create_time'] ?></td>
                    </tr>
                <?php } ?>
            </table>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>域名</th>
                    <th>端口</th>
                    <th>ip</th>
                    <th>状态</th>
                </tr>
                </thead>
                <?php foreach ($oneforall as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['subdomain'] ?></td>
                        <td><?php echo $value['port'] ?></td>
                        <td><?php echo $value['ip'] ?></td>
                        <td><?php echo $value['status'] ?></td>
                    </tr>
                <?php } ?>
            </table>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>host</th>
                    <th>type</th>
                    <th>username</th>
                    <th>状态</th>
                </tr>
                </thead>
                <?php foreach ($hydra as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['host'] ?></td>
                        <td><?php echo $value['type'] ?></td>
                        <td><?php echo $value['username'] ?></td>
                        <td><?php echo date('Y-m-d H:i:s', substr($value['create_time'],0,10)) ?></td>
                    </tr>
                <?php } ?>
            </table>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>code</th>
                    <th>size</th>
                    <th>type</th>
                    <th>url</th>
                    <th>时间</th>
                    <th style="width: 200px">操作</th>
                </tr>
                </thead>
                <?php foreach ($dirmap as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['code'] ?></td>
                        <td><?php echo $value['size'] ?></td>
                        <td><?php echo $value['type'] ?></td>
                        <td><?php echo $value['url'] ?></td>
                        <td><?php echo date('Y-m-d H:i:s', substr($value['create_time'],0,10)) ?></td>
                    </tr>
                <?php } ?>
            </table>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>urls</th>
                    <th>param</th>
                    <th>type</th>
                    <th>title</th>
                    <th>payload</th>
                    <th>时间</th>
                </tr>
                </thead>
                <?php foreach ($sqlmap as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['urls'] ?></td>
                        <td><?php echo $value['type'] ?></td>
                        <td><?php echo $value['title'] ?></td>
                        <td><?php echo $value['payload'] ?></td>
                        <td><?php echo $value['create_time'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
{include file='public/footer' /}
