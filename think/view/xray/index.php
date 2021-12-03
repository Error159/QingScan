{include file='public/head' /}
<?php
$dengjiArr = ['Low', 'Medium', 'High', 'Critical'];
?>
<div class="col-md-12 ">
    <div class="row tuchu">
        <div class="col-md-9">
            <form class="form-inline" method="get" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
                <input type="text" name="search" class="form-control" placeholder="search" value="<?php echo htmlentities($_GET['search']??'') ?>">
                <div class="form-group">
                    <label class="sr-only">漏洞等级</label>
                    <select class="form-control" name="level">
                        <option value="-1">危险等级</option>
                        <?php foreach ($dengjiArr as $key=>$value) { ?>
                            <option value="<?php echo $key ?>" <?php if(isset($_GET['level']) && $_GET['level'] == $key) echo 'selected' ?>><?php echo $value ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="Category">
                        <option value="">类别</option>
                        <?php foreach ($CategoryList as $value) { ?>
                            <option value="<?php echo $value ?>" <?php echo ($_GET['Category'] ?? '' == $value) ? 'selected' : '' ?>><?php echo $value ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="project_id">
                        <option value="">项目列表</option>
                        <?php foreach ($projectList as $key=>$value) { ?>
                            <option value="<?php echo $value ?>" <?php echo ($_GET['project_id'] ?? '' == $value) ? 'selected' : '' ?>><?php echo isset($projectArr[$value])?$projectArr[$value]['name']:'' ?></option>
                        <?php } ?>
                    </select>
                </div>
                <!--<div class="form-group">
                    <select class="form-control" name="filename">
                        <option value="">url筛选</option>
                        <?php /*foreach ($fileList as $value) { */?>
                            <option value="<?php /*echo $value */?>" <?php /*echo ($_GET['filename'] ?? '' == $value) ? 'selected' : '' */?>><?php /*echo $value */?></option>
                        <?php /*} */?>
                    </select>
                </div>-->
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
        <div class="col-md-2">
            <a href="/index.php?s=urls/add" class="btn btn-success">添加URL</a>
        </div>
    </div>
    <div class="row tuchu">
        <!--            <div class="col-md-1"></div>-->
        <div class="col-md-12 ">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>APP</th>
                    <th>漏洞类型</th>
                    <th>URL地址</th>
                    <th>创建时间</th>
                    <th>状态</th>
                    <th style="width: 200px">操作</th>
                </tr>
                </thead>
                <?php foreach ($list as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['app_id'] ?></td>
                        <td><?php echo $value['plugin'] ?></td>
                        <td><?php echo json_decode($value['target'], true)['url'] ?></td>
                        <td><?php echo date('Y-m-d H:i:s', substr($value['create_time'],0,10)) ?></td>
                        <td><select  class="changCheckStatus form-control" data-id="<?php echo $value['id'] ?>">
                            <option value="0" <?php echo $value['check_status'] == 0 ? 'selected' : ''; ?> >未审核</option>
                            <option value="1" <?php echo $value['check_status'] == 1 ? 'selected' : ''; ?> >有效漏洞</option>
                            <option value="2" <?php echo $value['check_status'] == 2 ? 'selected' : ''; ?> >无效漏洞</option>
                        </select></td>
                        <td>
                            <a href="<?php echo url('xray/details',['id'=>$value['id']])?>"
                               class="btn btn-sm btn-primary">查看漏洞</a>
                            <a href="<?php echo url('xray/del',['id'=>$value['id']])?>" class="btn btn-sm btn-danger">删除</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <input type="hidden" id="to_examine_url" value="<?php echo url('to_examine/xray')?>">

    {include file='public/to_examine' /}
    {include file='public/fenye' /}
</div>
{include file='public/footer' /}