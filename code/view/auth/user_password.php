{include file='public/head' /}

            <div class="col-md-3"></div>
            <div class="col-md-6 tuchu">
                <h1>修改个人密码</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">原密码</label>
                        <input type="password" name="password" class="form-control" placeholder="请输入原密码">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">新密码</label>
                        <input type="password" name="news_password" class="form-control" placeholder="请输入新密码">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">确认密码</label>
                        <input type="password" name="news_password1" class="form-control" placeholder="请输入确认密码">
                    </div>
                    <button type="submit" class="btn btn-success">提交</button>
                    <a href="javascript:history.go(-1);" class="btn btn-info">返回</a>
                </form>
            </div>
            <div class="col-md-3"></div>

{include file='public/footer' /}