{include file='public/head' /}

            <div class="col-md-3"></div>
            <div class="col-md-6 tuchu">
                <h1>添加菜单</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">父类</label>
                        <select name="pid" class="form-control">
                            <option value="0">默认顶级</option>
                            <?php foreach ($auth_rule as $item){ ?>
                            <option value="<?php echo $item['auth_rule_id']?>"><?php echo $item['title']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">权限名称</label>
                        <input type="text" name="title" class="form-control" placeholder="请输入权限名称" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">控制器/方法</label>
                        <input type="text" name="href" class="form-control" placeholder="请输入控制器/方法">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">是否验证权限</label>
                        <select name="is_open_auth" class="form-control">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">是否显示</label>
                        <select name="menu_status" class="form-control">
                            <option value="1">显示</option>
                            <option value="0">隐藏</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">排序</label>
                        <input type="text" name="sort" class="form-control" placeholder="请输入排序">
                    </div>
                    <button type="submit" class="btn btn-success">提交</button>
                    <a href="<?php echo url('auth/userList')?>" class="btn btn-info">返回</a>
                </form>
            </div>
            <div class="col-md-3"></div>

{include file='public/footer' /}