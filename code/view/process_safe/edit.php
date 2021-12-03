{include file='public/head' /}

            <div class="col-md-3"></div>
            <div class="col-md-6 tuchu">
                <h1>编辑守护进程</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">key</label>
                        <input type="text" name="key" class="form-control" value="<?php echo $info['key']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">value</label>
                        <input type="text" name="value" class="form-control" value="<?php echo $info['value']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">note</label>
                        <input type="text" name="note" class="form-control" value="<?php echo $info['note']?>">
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