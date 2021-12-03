{include file='public/head' /}
<?php
$dengjiArr = ['Low', 'Medium', 'High', 'Critical'];
?>
<div class="col-md-12 ">
    <div class="row tuchu">
        <div class="col-md-9">
            <form class="form-inline" method="get" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                <input type="text" name="search" class="form-control" placeholder="search"
                       value="<?php echo htmlentities($_GET['search'] ?? '') ?>">
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
        </div>
    </div>
    <div class="row tuchu">
        <div class="col-md-12 ">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>名称</th>
                    <th>状态</th>
                    <th>添加时间</th>
                </tr>
                </thead>
                <?php foreach ($list as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['hostname'] ?></td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input changCheckBoxStatus" data-id="<?php echo $value['id'] ?>"
                                       type="checkbox" <?php echo $value['status'] == 0 ? '' : 'checked'; ?>>
                            </div>
                        </td>
                        <td><?php echo $value['create_time'] ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <input type="hidden" id="to_examine_url" value="<?php echo url('to_examine/node') ?>">
    {include file='public/to_examine' /}
    {include file='public/fenye' /}
</div>
{include file='public/footer' /}