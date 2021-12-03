{include file='public/head' /}

            <div class="col-md-3"></div>
            <div class="col-md-6 tuchu">
                <h1>添加扫描任务</h1>
                <form method="post" action="<?php echo url('urls/_add')?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">所属项目</label>
                        <select name="app_id" class="form-control">
                            <?php foreach ($app_list as $item){ ?>
                            <option value="<?php echo $item['id']?>"><?php echo $item['name']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">URL地址</label>
                        <input type="url" name="url" class="form-control" placeholder="URL">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">启用爬虫</label>
                        <select name="is_crawl" class="form-control">
                            <option value="1">启用</option>
                            <option value="0">不启用</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">自定义header</label>
                        <textarea class="form-control" rows="3" placeholder="填写header消息"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">自定义Cookie</label>
                        <textarea class="form-control" rows="3" placeholder="自定义cookie"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">提交</button>
                    <a href="/index.php?s=urls/index" class="btn btn-info">返回</a>
                </form>
            </div>
            <div class="col-md-3"></div>

{include file='public/footer' /}