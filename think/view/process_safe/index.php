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
                <!--<div class="form-group">
                    <label class="sr-only">漏洞等级</label>
                    <select class="form-control" name="level">
                        <option value="-1">危险等级</option>
                        <?php /*foreach ($dengjiArr as $key=>$value) { */ ?>
                            <option value="<?php /*echo $key */ ?>" <?php /*if(isset($_GET['level']) && $_GET['level'] == $key) echo 'selected' */ ?>><?php /*echo $value */ ?></option>
                        <?php /*} */ ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="Category">
                        <option value="">类别</option>
                        <?php /*foreach ($CategoryList as $value) { */ ?>
                            <option value="<?php /*echo $value */ ?>" <?php /*echo ($_GET['Category'] ?? '' == $value) ? 'selected' : '' */ ?>><?php /*echo $value */ ?></option>
                        <?php /*} */ ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="project_id">
                        <option value="">项目列表</option>
                        <?php /*foreach ($projectList as $key=>$value) { */ ?>
                            <option value="<?php /*echo $value */ ?>" <?php /*echo ($_GET['project_id'] ?? '' == $value) ? 'selected' : '' */ ?>><?php /*echo $projectArr[$value]['name'] */ ?></option>
                        <?php /*} */ ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="filename">
                        <option value="">url筛选</option>
                        <?php /*foreach ($fileList as $value) { */ ?>
                            <option value="<?php /*echo $value */ ?>" <?php /*echo ($_GET['filename'] ?? '' == $value) ? 'selected' : '' */ ?>><?php /*echo $value */ ?></option>
                        <?php /*} */ ?>
                    </select>
                </div>
                <div class="form-group">
                    <select class="form-control" name="status">
                        <option value="-1">审计状态</option>
                        <?php /*foreach ($status_list as $key=>$value) { */ ?>
                            <option value="<?php /*echo $key */ ?>" <?php /*if(isset($_GET['status']) && $_GET['status'] == $key) echo 'selected' */ ?>><?php /*echo $value */ ?></option>
                        <?php /*} */ ?>
                    </select>
                </div>-->
                <button type="submit" class="btn btn-primary">搜索</button>
            </form>
        </div>
        <div class="col-md-2">
            <a href="<?php echo url('add') ?>" class="btn btn-success">添加守护进程</a>
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
                    <th>value</th>
                    <th>备注</th>
                    <th>状态</th>
                    <th style="width: 200px">操作</th>
                </tr>
                </thead>
                <?php foreach ($list as $value) { ?>
                    <tr>
                        <td><?php echo $value['id'] ?></td>
                        <td><?php echo $value['key'] ?></td>
                        <td><?php echo $value['value'] ?></td>
                        <td><?php echo $value['note'] ?></td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input changCheckBoxStatus" data-id="<?php echo $value['id'] ?>"
                                       type="checkbox" <?php echo $value['status'] == 0 ? '' : 'checked'; ?>>
                            </div>
                        </td>
                        <td>
                            <a href="<?php echo url('edit', ['id' => $value['id']]) ?>"
                               class="btn btn-sm btn-primary">编辑</a>
                            <a href="<?php echo url('del', ['id' => $value['id']]) ?>"
                               class="btn btn-sm btn-danger">删除</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <input type="hidden" id="to_examine_url" value="<?php echo url('to_examine/process_safe') ?>">
    {include file='public/to_examine' /}
    {include file='public/fenye' /}
</div>
{include file='public/footer' /}