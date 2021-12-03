{include file='public/head' /}

<div class="col-md-3"></div>
<div class="col-md-6 tuchu">
    <h1>添加</h1>
    <form method="post" action="<?= url("add") ?>">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputPassword3">名称</label>
                    <input type="text" class="form-control" placeholder="" name="name" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">nature</label>
                    <input name="nature" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">VUL-ID</label>
                    <input name="vul_num" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">CVE-ID</label>
                    <input name="cve_num" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">CNVD-ID</label>
                    <input name="cnvd_num" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">CNVD-ID</label>
                    <input name="cnnvd_num" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">SRC-ID</label>
                    <input name="src_num" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">漏洞等级</label>
                    <select name="vul_level" class="form-control">
                        <option value="严重" >严重</option>
                        <option value="高危" >高危</option>
                        <option value="中危" >高危</option>
                        <option value="低危" >高危</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">漏洞类型</label>
                    <input name="vul_type" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">cwe</label>
                    <input name="cwe" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">vul_cvss</label>
                    <input name="vul_cvss" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">cvss_vector</label>
                    <input name="cvss_vector" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">open_time</label>
                    <input name="open_time" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">vul_repair_time</label>
                    <input name="vul_repair_time" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">vul_source</label>
                    <input name="vul_source" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">临时解决方案</label>
                    <input name="temp_plan" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">temp_plan_s3</label>
                    <input name="temp_plan_s3" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">formal_plan</label>
                    <input name="formal_plan" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">patch_s3</label>
                    <input name="patch_s3" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">参考链接</label>
                    <input name="patch_url" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">官方解决方案</label>
                    <input name="patch_use_func" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">cpe</label>
                    <input name="cpe" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">影响组件</label>
                    <input name="product_name" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">product_open</label>
                    <select name="product_open" class="form-control">
                        <option value="是" >是</option>
                        <option value="否" >否</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">product_store</label>
                    <input name="product_store" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">store_website</label>
                    <input name="store_website" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">assem_name</label>
                    <input name="assem_name" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">影响版本</label>
                    <input name="affect_ver" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">ver_open_date</label>
                    <input name="ver_open_date" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">sub_update_url</label>
                    <input name="sub_update_url" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">git_url</label>
                    <input name="git_url" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">git_commit_id</label>
                    <input name="git_commit_id" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">git_fixed_commit_id</label>
                    <input name="git_fixed_commit_id" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">平台分类</label>
                    <input name="product_cate" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">行业</label>
                    <input name="product_field" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">项目类型</label>
                    <input name="product_type" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">fofa_max</label>
                    <input name="fofa_max" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">fofa_con</label>
                    <input name="fofa_con" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">is_pass</label>
                    <input name="is_pass" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">is_sub_attack</label>
                    <input name="is_sub_attack" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">temp_plan_s3_hash</label>
                    <input name="temp_plan_s3_hash" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">patch_s3_hash</label>
                    <input name="patch_s3_hash" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">is_pass_attack</label>
                    <select name="is_pass_attack" class="form-control">
                        <option value="1" >是</option>
                        <option value="0" >否</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">作者</label>
                    <input name="auditor" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">cause</label>
                    <input name="cause" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail3">scan_time</label>
                    <input name="scan_time" class="form-control" placeholder="" value="">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">是否有POC</label>
                    <select name="is_poc" class="form-control">
                        <option value="1" >是</option>
                        <option value="0" >否</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <a href="<?php echo url('index')?>" class="btn btn-info">返回</a>
                <button type="submit" class="btn btn-info">提交</button>
            </div>
        </div>
    </form>
</div>
<div class="col-md-3"></div>

{include file='public/footer' /}
