{include file='public/head' /}

            <div class="col-md-3"></div>
            <div class="col-md-6 tuchu">
                <h1>添加</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">ip</label>
                        <input type="text" name="host" class="form-control" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">端口</label>
                        <input type="text" name="port" class="form-control" placeholder="">
                    </div>
                    <button type="submit" class="btn btn-success">提交</button>
                    <a href="<?php echo url('index')?>" class="btn btn-info">返回</a>
                </form>
            </div>
            <div class="col-md-3"></div>

{include file='public/footer' /}