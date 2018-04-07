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
        <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
        <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />
        <link rel="stylesheet" href="/lib/zTree/v3/css/zTreeStyle/zTreeStyle.css" type="text/css">
        <!--[if IE 6]>
        <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
        <script>DD_belatedPNG.fix('*');</script>
        <![endif]-->
        <title>产品分类</title>
    </head>
    <body>
        <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 产品管理 <span class="c-gray en">&gt;</span> 产品分类 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
        <table class="table">
            <tr>
                <td width="200" class="va-t"><ul id="treeDemo" class="ztree"></ul></td>
                <td class="va-t">        <div class="page-container">
            <form action="<?=Url::to(['column/add'])?>" method="post" class="form form-horizontal" id="form-user-add">
                <!--<input type="hidden" name="_csrf" value="/*<?=\Yii::$app->request->csrfToken?>*/">-->
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
                                    <option value="<?=$v['id']?>"><?=str_repeat(' | -  ', $v['lev'])?><?=$v['name']?></option>
                                <?php endforeach;?>

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
        </div></td>
            </tr>
        </table>
        <!--_footer 作为公共模版分离出去-->
        <script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="/lib/layer/2.4/layer.js"></script>
        <script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
        <script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

        <!--请在下方写此页面业务相关的脚本-->
        <script type="text/javascript" src="/lib/zTree/v3/js/jquery.ztree.all-3.5.min.js"></script>
        <script type="text/javascript">

            $(function () {
                $.ajax({
                    url: "<?=Url::to(['column/manage'])?>",
                    type: 'POST',
                    dataType: 'json',
                    success: function (data) {
                        var setting = {
                            async: {
                                enable: true, //开启异步加载处理
                                dataFilter: filter//用于对 Ajax 返回数据进行预处理的函数
                            },
                            view: {
                                expandSpeed: "", //zTree 节点展开、折叠时的动画速度，设置方法同 JQuery 动画效果中 speed 参数。
//                     addHoverDom: addHoverDom,//用于当鼠标移动到节点上时，显示用户自定义控件，显示隐藏状态同 zTree 内部的编辑、删除按钮
                                removeHoverDom: removeHoverDom, //设置鼠标移到节点上，在后面显示一个按钮
                                selectedMulti: false// 禁止多点同时选中的功能
                            },
                            edit: {
                                enable: true//设置 zTree 进入编辑状态
                            },
                            data: {
                                simpleData: {
                                    enable: true//使用简单 Array 格式的数据
                                }
                            },
                                                key: {
                                title: "sort"
                            },
                            callback: {
                                // addHoverDom: addHoverDom,
                                beforeRemove: beforeRemove, //用于捕获节点被删除之前的事件回调函数，并且根据返回值确定是否允许删除操作
                                beforeRename: beforeRename//用于捕获节点编辑名称结束（Input 失去焦点 或 按下 Enter 键）之后，更新节点名称数据之前的事件回调函数，并且根据返回值确定是否允许更改名称的操作
                            }
                        };
                        var zNodes = data.data;
                        $.fn.zTree.init($("#treeDemo"), setting, zNodes);

                    }
                });

            });



            function filter(treeId, parentNode, childNodes) {
                if (!childNodes)
                    return null;
                for (var i = 0, l = childNodes.length; i < l; i++) {
                    childNodes[i].name = childNodes[i].name.replace(/\.n/g, '.');
                }
                return childNodes;
            }
            //删除节点信息
            function beforeRemove(treeId, treeNode) {


                if (confirm("确认删除 节点 -- " + treeNode.name + " 吗？")) {
                    var zTree = $.fn.zTree.getZTreeObj("treeDemo");
                    zTree.selectNode(treeNode);
                    var treeInfo = treeNode.id;
                    $.ajax({
                        url: "<?=Url::to(['column/delete'])?>",
                        type: "POST",
                        async: false,
                        dataType: 'json',
                        data: {'id': treeInfo},
                        success: function (res) {
                            layer.msg(res.msg);
                            window.location.reload();
                        }
                    });
                } else {
                    window.location.reload();
                }
            }

            //修改节点信息
            function beforeRename(treeId, treeNode, newName) {
                if (newName.length == 0) {
                    layer.msg("节点名称不能为空.");
                    return false;
                }
                var treeInfo = treeNode.id;


                $.ajax({
                    // url: "update?_tid=" + treeInfo + "&_newname=" + newName + "&action=ReName",
                    url: "<?=Url::to(['column/update'])?>",
                    type: "POST",
                    async: false,
                    dataType: 'json',
                    data: {'id': treeInfo, 'name': newName},
                    success: function (res) {
                        if (res.status == 200) {
                            layer.msg(res.msg);
                        } else {
                            layer.msg(res.msg);
                        }

                    }
                });
            }

            //设置鼠标移到节点上，在后面显示一个按钮
            function removeHoverDom(treeId, treeNode) {
                $("#addBtn_" + treeNode.tId).unbind().remove();
            }
            ;

        </script>
    </body>
</html>