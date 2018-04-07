<?php

use yii\helpers\Url;
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <!--[if lt IE 9]>
        <script type="text/javascript" src="lib/html5shiv.js"></script>
        <script type="text/javascript" src="lib/respond.min.js"></script>
        
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
        <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
        <link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.8/iconfont.css" />
        <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />
        <!--[if IE 6]>
        <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
        <script>DD_belatedPNG.fix('*');</script>
        <![endif]-->
        <title>添加产品分类</title>
    </head>
    <body>
        <div class="page-container">
            <form action="<?= Url::to(['column/add']) ?>" method="post" class="form form-horizontal" id="form-user-add">
                <!--<input type="hidden" name="_csrf" value="/*<?= \Yii::$app->request->csrfToken ?>*/">-->  
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">
                        <span class="c-red">*</span>
                        分类名称：</label>
                    <div class="formControls col-xs-6 col-sm-6">
                        <input type="text" class="input-text" value="" placeholder="" id="user-name" name="name">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">
                        <span class="c-red">*</span>
                        链接地址：</label>
                    <div class="formControls col-xs-6 col-sm-6">
                        <input type="text" class="input-text" value="" placeholder="" id="user-name" name="url">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分类栏目：</label>
                    <div class="formControls col-xs-8 col-sm-6">
                        <span class="select-box">
                            <select name="pid" class="select">
                                <option value="0">全部栏目</option>
                                <?php foreach ($treeList as $key => $v): ?>
                                    <option value="<?= $v['id'] ?>"><?= str_repeat(' | -  ', $v['lev']) ?><?= $v['name'] ?></option>
                                <?php endforeach; ?>

                            </select>
                        </span>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">排序：</label>
                    <div class="formControls col-xs-6 col-sm-6">
                        <input type="text" class="input-text" value="0" placeholder="" id="user-name" name="sort">

                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
                    </div>
                </div>
                <div class="row cl">
                    <div class="col-9 col-offset-2">
                        <input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
                    </div>
                </div>
            </form>
        </div>
        <!--_footer 作为公共模版分离出去-->
        <script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script> 
        <script type="text/javascript" src="/lib/layer/2.4/layer.js"></script>
        <script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script> 
        <script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

        <!--请在下方写此页面业务相关的脚本-->
        <script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
        <script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script>
        <script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.js"></script>
        <script type="text/javascript">



        </script>
    </body>
</html>