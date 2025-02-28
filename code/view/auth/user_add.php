{include file='public/head' /}

            <div class="col-md-3"></div>
            <div class="col-md-6 tuchu">
                <h1>添加用户</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">所属用户组</label>
                        <select name="auth_group_id" class="form-control">
                            <option value="0">请选择所属用户组</option>
                            <?php foreach ($authGroup as $item){ ?>
                            <option value="<?php echo $item['auth_group_id']?>"><?php echo $item['title']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">用户名</label>
                        <input type="text" name="username"  class="form-control" placeholder="请输入用户名" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">密码</label>
                        <input type="password" name="password" class="form-control" placeholder="请输入密码">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">昵称</label>
                        <input type="text" name="nickname" class="form-control" placeholder="请输入昵称" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">性别</label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" id="inlineRadio1" value="1"> 男
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="sex" id="inlineRadio2" value="0"> 女
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">手机号码</label>
                        <input type="text" name="phone" class="form-control" placeholder="请输入手机号码" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">邮箱</label>
                        <input type="text" name="email" class="form-control" placeholder="请输入邮箱" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">钉钉token</label>
                        <input type="text" name="dd_token" class="form-control" placeholder="请输入钉钉token" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">状态</label>
                        <select name="status" class="form-control">
                            <option value="1">正常</option>
                            <option value="0">禁用</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">提交</button>
                    <a href="<?php echo url('auth/user_list')?>" class="btn btn-info">返回</a>
                </form>
            </div>
            <div class="col-md-3"></div>

{include file='public/footer' /}