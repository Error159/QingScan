<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?php echo url('app/_add')?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">添加应用</h4>
                </div>
                <div class="modal-body">
                    <h3>基本信息</h3>
                    <div class="form-group">
                        <label for="exampleInputEmail1">应用名称</label>
                        <input type="text" name="name" class="form-control" placeholder="应用名称" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">URL地址</label>
                        <input type="url" name="url" class="form-control" placeholder="URL" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">账号</label>
                        <input type="text" name="username" class="form-control" placeholder="账号">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">密码</label>
                        <input type="text" name="password" class="form-control" placeholder="URL">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">是否xary扫描</label>
                        <select name="is_xray" class="form-control">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">是否awvs扫描</label>
                        <select name="is_awvs" class="form-control">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">是否wappalyzer扫描</label>
                        <select name="is_wappalyzer" class="form-control">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">是否OneForAll扫描</label>
                        <select name="is_one_for_all" class="form-control">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                    <!--<div class="form-group">
                        <label for="exampleInputEmail1">是否hydra扫描</label>
                        <select name="is_hydra" class="form-control">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>-->
                    <div class="form-group">
                        <label for="exampleInputEmail1">是否dirmap扫描</label>
                        <select name="is_dirmap" class="form-control">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-info">提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
