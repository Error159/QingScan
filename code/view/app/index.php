{include file='public/head' /}
<div class="col-md-12 ">
    <?php
    $searchArr = [
        'action' => url('app/index'),
        'method' => 'get',
        'inputs' => [
            ['type' => 'select', 'name' => 'statuscode', 'options' => $statuscodeArr, 'frist_option' => '状态码'],
            ['type' => 'select', 'name' => 'cms', 'options' => $cmsArr, 'frist_option' => 'CMS系统'],
            ['type' => 'select', 'name' => 'server', 'options' => $serverArr, 'frist_option' => '服务'],
        ]]; ?>
    {include file='public/search' /}
    <div class="row tuchu">
        <div class="col-md-12 ">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>名称</th>
                    <th>CMS</th>
                    <th>状态码</th>
                    <th>服务组件</th>
                    <th style="width: 70px">状态</th>
                    <th>创建时间</th>
                    <th>awvs</th>
                    <th>whatweb</th>
                    <th>subdomain</th>
                    <th>icon图标</th>
                    <th>截图</th>
                    <th>xray</th>
                    <th>dirmap</th>
                    <th style="width: 200px">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($list as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td class="ellipsis-type">
                            <a href="<?php echo $value['url'] ?>" target="_blank">
                                <?php echo $value['name'] ?>
                            </a>
                        </td>
                        <td><?php
                            if (isset($value['cms']) && is_array(json_decode($value['cms'], true))) {
                                echo implode("|", json_decode($value['cms'], true));
                            }
                            ?></td>
                        <td><?php echo $value['statuscode'] ?? '' ?></td>
                        <td><?php echo $value['server'] ?? '' ?></td>
                        <td><?php echo $statusArr[$value['status']] ?? '' ?></td>
                        <td><?php echo date('Y-m-d H:i', strtotime($value['create_time'])) ?></td>
                        <td><?php echo date('m-d H:i', strtotime($value['awvs_scan_time'])) ?></td>
                        <td><?php echo date('m-d H:i', strtotime($value['whatweb_scan_time'])) ?></td>
                        <td><?php echo date('m-d H:i', strtotime($value['subdomain_scan_time'])) ?></td>
                        <td>
                            <img src="/<?php echo $value['icon']?>" alt="">
                        </td>
                        <td>
                            <img src="/<?php echo $value['url_screenshot']?>" alt="">
                        </td>
                        <td><?php echo date('m-d H:i', strtotime($value['xray_scan_time'])) ?></td>
                        <td><?php echo date('m-d H:i', strtotime($value['dirmap_scan_time'])) ?></td>
                        <td>
                            <!--                                <a href="#" class="btn btn-sm btn-primary" dataid="-->
                            <? //= $value['id'] ?><!--"-->
                            <!--                                   data-toggle="modal" data-target=".setModal">设置</a>-->
                            <a href="<?php echo url('details', ['id' => $value['id']]) ?>"
                               class="btn btn-sm btn-primary">查看详情</a>
                            <a href="<?php echo url('app/del', ['id' => $value['id']]) ?>"
                               class="btn btn-sm btn-warning">删除</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
    {include file='public/fenye' /}
</div>

<style>
    .modal-dialog {
        width: 600px;
    }
</style>
<!-- Modal -->
{include file='app/add_modal' /}
{include file='app/set_modal' /}
{include file='public/footer' /}
<script>
    /*$(".app_delete").click(function () {
        id = $(this).attr('data-id')
        URL = "http://localhost:8880/index.php?s=app/delete&id=" + id
        $.get(URL);
        $(this).parent().parent().remove();

    });*/
</script>
