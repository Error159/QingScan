{include file='public/head' /}

<div class="col-md-3"></div>
<div class="col-md-6 tuchu">
    <h1>编辑</h1>
    <form method="post" action="">
        <input type="hidden" name="id" value="<?php echo $info['id']?>">
        <div class="form-group">
            <label for="exampleInputEmail1">关键字</label>
            <input type="text" name="title" class="form-control" value="<?php echo $info['title']?>">
        </div>
        <button type="submit" class="btn btn-success">提交</button>
        <a href="<?php echo url('index')?>" class="btn btn-info">返回</a>
    </form>
</div>
<div class="col-md-3"></div>

{include file='public/footer' /}