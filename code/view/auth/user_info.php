{include file='public/head' /}

            <div class="col-md-3"></div>
            <div class="col-md-6 tuchu">
                <h1>个人资料</h1>
                <form method="post" action="">
                    <!--<div class="form-group">
                        <label for="exampleInputEmail1">密码</label>
                        <input type="password" name="password" class="form-control" placeholder="请输入密码">
                    </div>-->
                    <div class="form-group">
                        <label for="exampleInputEmail1">昵称</label>
                        <input type="text" name="nickname" class="form-control" placeholder="请输入昵称" value="<?php echo $info['nickname']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">性别</label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" id="inlineRadio1" value="1" <?php if($info['status'] == 1 ) echo 'checked'?>> 男
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" id="inlineRadio2" value="0" <?php if($info['status'] == 1 ) echo 'checked'?>> 女
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">手机号码</label>
                        <input type="text" name="phone" class="form-control" placeholder="请输入手机号码" value="<?php echo $info['phone']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">邮箱</label>
                        <input type="text" name="email" class="form-control" placeholder="请输入邮箱" value="<?php echo $info['email']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">钉钉token</label>
                        <input type="text" name="dd_token" class="form-control" placeholder="请输入钉钉token" value="<?php echo $info['dd_token']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">token</label><a href="javascript:;" id="getToken">刷新token</a>
                        <input type="text" name="token" class="form-control" readonly value="<?php echo $info['token']?>">
                    </div>
                    <button type="submit" class="btn btn-success">提交</button>
                    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>
                </form>
            </div>
            <div class="col-md-3"></div>

{include file='public/footer' /}
<script>
    $('#getToken').click(function () {
        $.ajax({
            type: "get",
            url: "<?php echo url('getToken')?>",
            dataType: "json",
            success: function (res) {
                $('input[name=token]').val(res.data.token)
            }
        });
    });
</script>