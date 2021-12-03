{include file='public/head' /}

<?php
$dengjiArr = ['Low', 'Medium', 'High', 'Critical'];
?>
<div class="row tuchu">
    <div class="col-md-10 ">
        <form class="form-inline" method="get" action="">
            <div class="form-group">
                <label class="sr-only">搜索</label>
                <input type="text" name="search" class="form-control" value="<?php echo htmlentities($_GET['search']??'') ?>" placeholder="搜索的内容">
            </div>
            <div class="form-group">
                <label class="sr-only">漏洞等级</label>
                <select class="form-control" name="level">
                    <option value="">危险等级</option>
                    <?php foreach ($vul_level as $value) { ?>
                        <option value="<?php echo $value ?>" <?php echo ($_GET['vul_level'] ?? '' == $value) ? 'selected' : '' ?>><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label class="sr-only">行业</label>
                <select class="form-control" name="product_field">
                    <option value="">行业</option>
                    <?php foreach ($product_field as $value) { ?>
                        <option value="<?php echo $value ?>" <?php echo ($_GET['product_field'] ?? '' == $value) ? 'selected' : '' ?>><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="product_type">
                    <option value="">项目类型</option>
                    <?php foreach ($product_type as $value) { ?>
                        <option value="<?php echo $value ?>" <?php echo ($_GET['product_type'] ?? '' == $value) ? 'selected' : '' ?>><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="product_cate">
                    <option value="">平台分类</option>
                    <?php foreach ($product_cate as $value) { ?>
                        <option value="<?php echo $value ?>" <?php echo ($_GET['product_cate'] ?? '' == $value) ? 'selected' : '' ?>><?php echo $value ?></option>
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
            <input type="submit" class="btn btn-default">
        </form>
    </div>

    <div class="col-md-2">
        <a href="<?php echo url('add')?>" class="btn btn-success">添加</a>
    </div>
</div>
<div class="row tuchu">
    <div class="col-md-12 ">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>名称</th>
                <th>CVE编号</th>
                <th>CNVD编号</th>
                <th>漏洞等级</th>
                <th>行业</th>
                <th>项目类型</th>
                <th>平台分类</th>
                <th>fofa数量</th>
                <th style="width: 200px">操作</th>
            </tr>
            </thead>
            <?php foreach ($list as $value) { ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['cve_num'] ?></td>
                    <td><?php echo $value['cnvd_num'] ?></td>
                    <td><?php echo $value['vul_level'] ?></td>
                    <td><?php echo $value['product_field'] ?></td>
                    <td><?php echo $value['product_type'] ?></td>
                    <td><?php echo $value['product_cate'] ?></td>
                    <td><?php echo $value['fofa_max'] ?></td>

                    <td>
                        <a href="<?php echo url('vulnerable/details',['id'=>$value['id']])?>"
                           class="btn btn-sm btn-success">查看漏洞</a>
                        <a href="<?php echo url('vulnerable/edit',['id'=>$value['id']])?>"
                           class="btn btn-sm btn-success">编辑</a>
                        <a href="<?php echo url('vulnerable/vulnerable_del',['id'=>$value['id']])?>" class="btn btn-sm btn-warning" >删除</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
{include file='public/fenye' /}
{include file='public/footer' /}