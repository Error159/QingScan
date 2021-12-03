<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form method="post" action="<?= url("code/_add_code") ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">添加项目</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">项目名称</label>
                        <input type="text" name="name" class="form-control" placeholder="应用名称" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">拉取方式</label>
                        <select name="pulling_mode" class="form-control">
                            <option value="SSH">SSH</option>
                            <option value="HTTPS">HTTPS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">地址</label>
                        <input type="text" name="ssh_url" class="form-control" placeholder="URL" required>
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
                        <label for="exampleInputEmail1">是否fortify扫描</label>
                        <select name="is_fortify_scan" class="form-control">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">是否semgrep扫描</label>
                        <select name="is_semgrep_scan" class="form-control">
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">是否kunlun扫描</label>
                        <select name="is_kunlun_scan" class="form-control">
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
