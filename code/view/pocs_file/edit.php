{include file='public/head' /}

<div class="col-md-3"></div>
<div class="col-md-6 tuchu">
    <h1>编辑</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="exampleInputEmail1">cve_num</label>
            <input type="text" name="cve_num" class="form-control" disabled value="<?php echo $info['cve_num']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">文件名</label>
            <input type="text" name="filename" class="form-control" disabled value="<?php echo $info['filename']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">内容</label>
            <textarea class="form-control" rows="8" name="content"><?php echo $info['content']?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">状态</label>
            <select name="status" class="form-control">
                <option value="1" <?php echo $info['status'] == 1 ?'selected':'';?>>正常</option>
                <option value="0" <?php echo $info['status'] == 0 ?'selected':'';?>>禁用</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">提交</button>
        <a href="<?php echo url('index')?>" class="btn btn-info">返回</a>
    </form>
</div>
<div class="col-md-3"></div>

{include file='public/footer' /}