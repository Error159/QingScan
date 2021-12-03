{include file='public/head' /}
<div class="col-md-12 ">
    <div class="row tuchu">
        <div class="col-md-9">
            <form class="form-inline" method="get" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                <input type="text" name="search" class="form-control" placeholder="search" value="<?php echo htmlentities($_GET['search']??'') ?>">
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
        </div>
        <div class="col-md-2">
            <a href="<?php echo url('config/add')?>" class="btn btn-success">添加</a>
        </div>
    </div>
    <div class="row tuchu">
        <!--            <div class="col-md-1"></div>-->
        <div class="col-md-12 ">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>key</th>
                    <th>name</th>
                    <th>value</th>
                    <th style="width: 200px">操作</th>
                </tr>
                </thead>
                <?php foreach ($list as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['key'] ?></td>
                        <td><?php echo $value['name'] ?></td>
                        <td><?php echo $value['value'] ?></td>
                        <td>
                            <a href="<?php echo url('config/edit',['id'=>$value['id']])?>"
                               class="btn btn-sm btn-primary">编辑</a>
                            <a href="<?php echo url('config/del',['id'=>$value['id']])?>" class="btn btn-sm btn-danger">删除</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    {include file='public/fenye' /}
</div>
{include file='public/footer' /}