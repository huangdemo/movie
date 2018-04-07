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
        <!--[if IE 6]>
        <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
        <script>DD_belatedPNG.fix('*');</script>
        <![endif]-->
        <title>新增视频</title>
        <link href="/lib/webuploader/0.1.5/webuploader.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="page-container">
            <form class="form form-horizontal" id="form-article-add">
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属栏目：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <span class="select-box">
                        <select name="c_ids" class="select" id="status">
                             <option>请选择栏目</option>
                            <?php foreach ($column as $key => $v) :?>
                                    <option value="<?=$v['id']?>"><?=$v['name']?></option>
                            <?php endforeach; ?>
                            
                        </select>
                        </span>
                    </div>
                </div>
                 <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属子栏目：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <span class="select-box">
                        <select name="c_id" class="select" id="c_id">
                            
                           
                            
                        </select>
                        </span>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>电影标题：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="" placeholder=""  name="topic">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">简略标题：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="" placeholder=""  name="renewal">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">导演：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="" placeholder=""  name="director">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">主演：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="" placeholder=""  name="protagonist">
                    </div>
                </div>
                 <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">语言：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="" placeholder=""  name="language">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>年代：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <span class="select-box">
                        <select name="time_id" class="select" id="status">
                            <?php  foreach ($videoTime as $key => $value) :?>                                                         
                                   <option value="<?=$value['time_id']?>"><?=$value['time_name']?></option>
                            <?php endforeach;?>
                        </select>
                        </span>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>地区：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <span class="select-box">
                        <select name="region_id" class="select" id="status">
                        <?php  foreach ($videoRegion as $key => $value) :?>                                                         
                                <option value="<?=$value['region_id']?>"><?=$value['region_name']?></option>
                        <?php endforeach;?>   
                        </select>
                        </span>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">排序值：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <input type="text" class="input-text" value="0" placeholder=""  name="sort">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">允许评论：</label>
                    <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                        <div class="check-box">
                            <input type="checkbox" id="checkbox-1" name="allow" value="1">
                            <label for="checkbox-1">&nbsp;</label>
                        </div>
                    </div>
                </div>
               <!--  <div class="row cl" id="content">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>描述：</label>
                    <div class="formControls col-xs-8 col-sm-4">
                        <input type="text"  id="datemin" class="input-text Wdate" name="content[]">
                    </div>
                    <div class="formControls col-xs-8 col-sm-4">
                        <input type="text"  id="datemin" class="input-text Wdate" name="contents[]">
                    </div>
                    <div class="btn btn-default btn-uploadstar radius ml-10" id="add">添加描述</div>
                </div> -->

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">剧情：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <textarea name="introduce" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" ></textarea>
                        <p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">缩略图：</label>
                    <div class="formControls col-xs-8 col-sm-9">
                        <div class="uploader-thum-container">
                            <div id="fileList" class="uploader-list"></div>
                            <div id="filePicker">选择图片</div>
                            <button id="btn-star" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
                        </div>
                    </div>
                </div>
                <div class="row cl">
                    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                        <button onClick="article_save_submit();" class="btn btn-primary radius" type="button"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
                    </div>
                </div>
            </form>
        </div>


        <!--_footer 作为公共模版分离出去-->
        <script type="text/javascript" src="/lib/jquery/1.9.1/jquery.min.js"></script>
        <script type="text/javascript" src="/lib/layer/2.4/layer.js"></script>
        <script type="text/javascript" src="/static/h-ui/js/H-ui.min.js"></script>
        <script type="text/javascript" src="/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->

        <!--请在下方写此页面业务相关的脚本-->
        <script type="text/javascript" src="/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
        <script type="text/javascript" src="/lib/jquery.validation/1.14.0/validate-methods.js"></script>
        <script type="text/javascript" src="/lib/jquery.validation/1.14.0/messages_zh.js"></script>
        <script type="text/javascript" src="/lib/webuploader/0.1.5/webuploader.min.js"></script>
        <script type="text/javascript">

                        $('#add').click(function(event) {
                                $('#content').append('<div class="row cl" id="content"><label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>描述：</label><div class="formControls col-xs-8 col-sm-4"><input type="text"  id="datemin" class="input-text Wdate" name="content[]"></div><div class="formControls col-xs-8 col-sm-4"><input type="text"  id="datemin" class="input-text Wdate" name="contents[]"></div></div>');
                        });

                            function article_save() {
                                alert("刷新父级的时候会自动关闭弹层。")
                                window.parent.location.reload();
                            }
                            $("select#status").change(function () {
                                var id = $(this).val();
                                $.ajax({
                                    url: "<?=Url::to(['video/inquire'])?>",
                                    type: 'POST',
                                    dataType: 'json',
                                    data: {'id': id},
                                    success: function (res) {
                                        $('#c_id').html(res)
                                        console.log(res)
                                    }
                                })


                            });
                            $(function () {
                                $('.skin-minimal input').iCheck({
                                    checkboxClass: 'icheckbox-blue',
                                    radioClass: 'iradio-blue',
                                    increaseArea: '20%'
                                });
                                $list = $("#fileList"),
                                        $btn = $("#btn-star"),
                                        state = "pending",
                                        uploader;
                                var uploader = WebUploader.create({
                                    auto: true,
                                    swf: '/lib/webuploader/0.1.5/Uploader.swf',
                                    // 文件接收服务端。
                                    server: '/fileupload.php',
                                    // 选择文件的按钮。可选。
                                    // 内部根据当前运行是创建，可能是input元素，也可能是flash.
                                    pick: '#filePicker',
                                    // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
                                    resize: false,
                                    // 只允许选择图片文件。
                                    accept: {
                                        title: 'Images',
                                        extensions: 'gif,jpg,jpeg,bmp,png',
                                        mimeTypes: 'image/*'
                                    }
                                });
                                uploader.on('fileQueued', function (file) {
                                    var $li = $(
                                            '<div id="' + file.id + '" class="item">' +
                                            '<div class="pic-box"><img></div>' +
                                            '<div class="info">' + file.name + '</div>' +
                                            '<p class="state">等待上传...</p>' +
                                            '</div>'
                                            ),
                                            $img = $li.find('img');
                                    $list.append($li);
                                    // 创建缩略图
                                    // 如果为非图片文件，可以不用调用此方法。
                                    // thumbnailWidth x thumbnailHeight 为 100 x 100

                                });
                                // 文件上传过程中创建进度条实时显示。
                                uploader.on('uploadProgress', function (file, percentage) {
                                    var $li = $('#' + file.id),
                                            $percent = $li.find('.progress-box .sr-only');
                                    // 避免重复创建
                                    if (!$percent.length) {
                                        $percent = $('<div class="progress-box"><span class="progress-bar radius"><span class="sr-only" style="width:0%"></span></span></div>').appendTo($li).find('.sr-only');
                                    }
                                    $li.find(".state").text("上传中");
                                    $percent.css('width', percentage * 100 + '%');
                                });
                                // 文件上传成功，给item添加成功class, 用样式标记上传成功。
                                uploader.on('uploadSuccess', function (file, response) {
                                    $('#filePicker').html("<input type=hidden name='pic' value='<?=Url::toRoute('/',true)?>"+ response.filePaht + "'>")
                                    console.log(response)

                                    $('#' + file.id).addClass('upload-state-success').find(".state").text("已上传");
                                });
                                // 文件上传失败，显示上传出错。
                                uploader.on('uploadError', function (file) {
                                    $('#' + file.id).addClass('upload-state-error').find(".state").text("上传出错");
                                });


                            });

                            function article_save_submit() {

                                $.ajax({
                                    url: "<?=Url::to(['video/add'])?>",
                                    type: 'POST',
                                    dataType: 'json',
                                    data: $("#form-article-add").serialize(),
                                    success: function (res) {
                                        if (res.status == '200') {
                                            layer.msg(res.msg);
                                        } else {
                                            layer.alert(res.msg);
                                        }
                                    }
                                })


                            }
        </script>
    </body>
</html>