{include file='public/head' /}

<?php
$dengjiArr = ['Low', 'Medium', 'High', 'Critical'];
?>
<div class="row tuchu">
    <div class="col-md-12 ">
        <form class="form-inline" method="get" action="">
            <div class="form-group">
                <label class="sr-only">搜索</label>
                <input type="text" name="search" class="form-control"
                       value="<?php echo htmlentities($_GET['search'] ?? '') ?>"
                       placeholder="搜索的内容">
            </div>
            <div class="form-group">
                <label class="sr-only">漏洞等级</label>
                <select class="form-control" name="level">
                    <option value="">危险等级</option>
                    <?php foreach ($dengjiArr as $value) { ?>
                        <option value="<?php echo $value ?>" <?php echo ($_GET['level'] ?? '' == $value) ? 'selected' : '' ?>><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="Category">
                    <option value="">漏洞类别</option>
                    <?php foreach ($CategoryList as $value) { ?>
                        <option value="<?php echo $value ?>" <?php echo ($_GET['Category'] ?? '' == $value) ? 'selected' : '' ?>><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="project_id">
                    <option value="">项目列表</option>
                    <?php foreach ($projectList as $value) { ?>
                        <option value="<?php echo $value ?>" <?php echo ($_GET['project_id'] ?? '' == $value) ? 'selected' : '' ?>><?php echo isset($projectArr[$value])?$projectArr[$value]['name']:'' ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="filename">
                    <option value="">文件筛选</option>
                    <?php foreach ($fileList as $value) { ?>
                        <option value="<?php echo $value ?>" <?php echo ($_GET['filename'] ?? '' == $value) ? 'selected' : '' ?>><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control" name="check_status">
                    <option value="-1">审计状态</option>
                    <?php foreach ($check_status_list as $key => $value) { ?>
                        <option value="<?php echo $key ?>" <?php if (isset($_GET['check_status']) && $_GET['check_status'] == $key) echo 'selected' ?>><?php echo $value ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-default">
        </form>
    </div>
</div>
<div class="row tuchu">
    <div class="col-md-12 ">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>漏洞类型</th>
                <th>危险等级</th>
                <th>污染来源</th>
                <th>执行位置</th>
                <th>所属项目</th>
                <th>创建时间</th>
                <th>状态</th>
                <th style="width: 200px">操作</th>
            </tr>
            </thead>
            <?php foreach ($list as $value) { ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo str_replace('data.tools.semgrep.', "", $value['check_id']) ?></td>
                    <td><?php echo $value['extra_severity'] ?></td>
                    <td><?php echo str_replace('/data/codeCheck', "", $value['path']) ?></td>
                    <td></td>
                    <td><?php echo isset($projectArr[$value['code_id']])?$projectArr[$value['code_id']]['name']:'' ?></td>
                    <td><?php echo $value['create_time'] ?></td>
                    <td><select class="changCheckStatus form-control" data-id="<?php echo $value['id'] ?>">
                            <option value="0" <?php echo $value['check_status'] == 0 ? 'selected' : ''; ?> >未审核</option>
                            <option value="1" <?php echo $value['check_status'] == 1 ? 'selected' : ''; ?> >有效漏洞
                            </option>
                            <option value="2" <?php echo $value['check_status'] == 2 ? 'selected' : ''; ?> >无效漏洞
                            </option>
                        </select></td>
                    <td>
                        <a href="<?php echo url('code/semgrep_details', ['id' => $value['id']]) ?>"
                           class="btn btn-sm btn-success">查看漏洞</a>

                        <a href="<?php echo url('code/semgrep_del', ['id' => $value['id']]) ?>" class="btn btn-sm btn-danger">删除</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
<input type="hidden" id="to_examine_url" value="<?php echo url('to_examine/semgrep') ?>">

{include file='public/to_examine' /}
{include file='public/fenye' /}
{include file='public/footer' /}