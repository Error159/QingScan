{include file='public/head' /}

            <div class="col-md-3"></div>
            <div class="col-md-6 tuchu">
                <h1>修改用户组</h1>
                <form method="post" action="<?php echo url('auth/authGroupEdit')?>">
                    <input type="hidden" name="auth_group_id" value="<?php echo $info['auth_group_id']?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">用户组名</label>
                        <input type="text" name="title" class="form-control" value="<?php echo $info['title']?>" placeholder="请输入用户组名">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">状态</label>
                        <select name="status" class="form-control">
                            <option value="1" <?php if($info['status'] == 1 ) echo 'selected'?>>正常</option>
                            <option value="0" <?php if($info['status'] == 0 ) echo 'selected'?>>禁用</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">提交</button>
                    <a href="<?php echo url('auth/auth_group_list')?>" class="btn btn-info">返回</a>
                </form>
            </div>
            <div class="col-md-3"></div>

{include file='public/footer' /}