{include file='public/head' /}

<div class="col-md-3"></div>
<div class="col-md-6 tuchu">
    <h1>修改</h1>
    <form method="post" action="<?php echo url('config/edit')?>">
        <input type="hidden" name="id" value="<?php echo $info['id']?>">
        <div class="form-group">
            <label for="exampleInputEmail1">key</label>
            <input type="text" name="key" class="form-control" placeholder="请输入key" value="<?php echo $info['key']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">name</label>
            <input type="text" name="name" class="form-control" placeholder="请输入name" value="<?php echo $info['name']?>">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">value</label>
            <input type="text" name="value" class="form-control" placeholder="请输入value" value="<?php echo $info['value']?>">
        </div>
        <button type="submit" class="btn btn-success">提交</button>
        <a href="<?php echo url('config/index')?>" class="btn btn-info">返回</a>
    </form>
</div>
<div class="col-md-3"></div>

{include file='public/footer' /}