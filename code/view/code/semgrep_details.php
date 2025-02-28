{include file='public/head' /}
<style>
    .bug-msg {
        background-color: #fff;
    }

    .vul-basic-info {
        background-color: #fff;
        padding: 20px;
        margin-bottom: 10px;
        font-size: 12px;
    }

    .vul-detail-section {
        padding: 20px;
        line-height: 2;
        color: #444;
        margin-bottom: 10px;
        background-color: #fff;
        word-wrap: break-word;
    }

    .page-vul-detail-wrapper {
        padding-bottom: 90px;
    }

    .vul-title-wrapper {
        width: 100%;
        padding: 41px 0 33px;
    }

    .vul-title-wrapper h1 {
        margin: 0;
        font-size: 24px;
        font-weight: 400;
        width: 80%;
        min-width: 80%;
        line-height: 1.5;
        word-wrap: break-word;
        word-break: break-all;
        text-align: center;
        position: relative;
    }

    .vul-basic-info dl {
        color: #aaa;
        overflow: hidden;
        margin-bottom: 11px;
    }

    dl {
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }

    .vul-basic-info dd, .vul-basic-info dt {
        line-height: 20px;
        float: left;
    }

    a ,dd{
        color: #333;
        text-decoration: none;
    }
</style>
<div class="page-vul-detail-wrapper" style="margin-top: -50px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="vul-title-wrapper clearfix">
                    <h1 class="pull-left" id="j-vul-title" data-vul-id="99367">
                       <span class="pull-titile">
                          <?php echo $info['check_id'];?>
                       </span>
                    </h1>
                </div>
            </div>
            <div class="row" style="margin-bottom: 20px;">
                <div class="col-md-12">
                    <div class="pull-right" style="line-height: 36px;">
                        <input type="hidden" id="to_examine_url" value="<?php echo url('to_examine/semgrep')?>">

                        <?php if($info['check_status'] == 0){?>
                            <span class="follow-vul j-follow-vul ">
                                <a href="javascript:;" class="btn btn-warning" onclick="to_examine(<?php echo $info['id']?>)">审核</a>
                            </span>
                        <?php }?>
                        <span class="follow-vul j-follow-vul ">
                          <a href="<?php echo url('code/semgrep_list') ?>" class="btn btn-primary">返回列表页</a>
                        </span>
                        <span class="follow-vul j-follow-vul ">
                            <a href="<?php echo url('code/semgrep_details', ['id' => $info['upper_id']]) ?>"
                               class="btn btn-warning">上一页</a>
                        </span>
                        <span class="follow-vul j-follow-vul ">
                            <a href="<?php echo url('code/semgrep_details', ['id' => $info['lower_id']]) ?>"
                               class="btn btn-success">下一页</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row a-ts">
            <div class="a-st">
                <!--漏洞基本信息 begin-->
                <div class="bug-msg">
                    <section class="vul-basic-info" id="j-vul-basic-info">
                        <div class="row">
                            <div class="col-md-4">
                                <dl>
                                    <dt>CVI ID：</dt>
                                    <dd class="text-gray"><?php echo $info['path']?></dd>
                                </dl>
                                <dl>
                                    <dt>所属文件：</dt>
                                    <dd><?php echo $info['path']?></dd>
                                </dl>
                                <dl>
                                    <dt>发现时间：</dt>
                                    <dd><?php echo $info['create_time']?></dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl>
                                    <dt>所属项目：</dt>
                                    <dd><?php echo $info['project_name']?></dd>
                                </dl>

                                <dl>
                                    <dt>文件路径：</dt>
                                    <dd class="hover-scroll">
                                        <?php echo $info['path']?>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>审核状态：</dt>
                                    <dd class="hover-scroll">
                                        <select  class="changCheckStatus form-control" style="padding: 0px 12px;height:22px;" data-id="<?php echo $info['id'] ?>">
                                            <option value="0" <?php echo $info['check_status'] == 0 ? 'selected' : ''; ?> >未审核</option>
                                            <option value="1" <?php echo $info['check_status'] == 1 ? 'selected' : ''; ?> >有效漏洞</option>
                                            <option value="2" <?php echo $info['check_status'] == 2 ? 'selected' : ''; ?> >无效漏洞</option>
                                        </select>
                                    </dd>
                                </dl>
                            </div>
                            <div class="col-md-4">
                                <dl data-type="CVE-ID">
                                    <dt>危险等级：</dt>
                                    <dd>
                                        <?php echo $info['extra_severity']?>
                                    </dd>
                                </dl>
                                <dl data-type="CNNVD-ID">
                                    <dt>缺陷位置：</dt>
                                    <dd>
                                        第<?php echo $info['start_offset']?>行
                                    </dd>
                                </dl>

                            </div>
                        </div>
                    </section>
                </div>
                <!--漏洞基本信息 end-->

                <!--漏洞 PoC begin-->
                <section class="vul-detail-section vul-poc">
                    <div class="clearfix">
                        <h3 class="pull-left">漏洞描述</h3>

                    </div>
                    <div class="padding-md">
                        <!--状态：等待贡献-->
                        <section class="vul-need-contribute">
                            <div class="circle"><?php echo $info['extra_message']?></div>
                        </section>
                        <br>
                    </div>

                </section>
                <!--漏洞 PoC end-->
                <section class="vul-detail-section vul-detail-content">
                    <div class="clearfix">
                        <h3 class="pull-left">
                            错误代码
                        </h3>
                    </div>
                    <div class="content-holder padding-md">
                        <?php echo $info['extra_lines']?>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
{include file='public/to_examine' /}
{include file='public/footer' /}