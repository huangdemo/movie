<?php
use yii\helpers\Url;
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta name="applicable-device" content="pc,mobile">
<title>秋霞电影网</title>
<meta name="keywords" content="秋霞影院_秋霞电影院_秋霞电影网" />
<meta name="description" content="提供最新最快的影视资讯和在线播放" />
<link href="/css/style.css" rel="stylesheet">
<script src="/js/jquery-1.4.4.min.js"></script>
<script src="/js/common.js"></script>
<script src="/js/function.js"></script>
<script src="/js/jquery.lazyload.js"></script>
<script>var SitePath='/',SiteAid='10',SiteTid='',SiteId='';</script>
<script src="/js/home.js"></script>
<!--[if lt IE 9]>
<script src="/js/html5shiv.min.js"></script>
<script src="/js/respond.min.js"></script>
<![endif]-->
<script src="/js/jquery.superslide.js" type="text/javascript"></script>
</head>
<body>
<!--/头部-->
﻿<div class="header-all">
  <div class="top clearfix">
    <ul class="logo"><a href="/"><img src="/picture/logo.png" title="秋霞电影网"></a></ul>
    <ul class="top-nav">
      <li><a class="now" href="/"  class="on">首页</a></li>
      <!--导航-->
	<?php foreach ($column as $key => $v): ?>
      <li class="" _t_nav="topnav-<?=$key+1?>">
          <a href="<?=$v['url']?>?id=<?=$v['id']?>" >
            <?=$v['name']?>
          <?php if(!empty($v['subcat'])):?>
            <i class="sjbgs"></i>
          <?php endif?>
      	<i class="sjbgx"></i></a>
      </li>
	<?php endforeach; ?>
	
</ul>
    </ul>
	    <ul class="search so">
			<form action="/index.php?m=vod-search" method="post">
        <input type="text" id="wd" name="wd" class="input" onblur="if(this.value==''){ this.value='请输入影片或演员名';this.style.color='#cfcdcd';}" onfocus="if(this.value=='请输入影片或演员名'){this.value='';this.style.color='';}" value="请输入影片或演员名" />
		  <div class="so-key">

		  <a href='/?m=vod-detail-id-13523.html'>新万家灯火</a>

		  <a href='/?m=vod-detail-id-13307.html'>养母的花样年</a>

		  <a href='/?m=vod-detail-id-13252.html'>神契幻奇谭</a>

		  <a href='/?m=vod-detail-id-13204.html'>梦想合伙人</a>

		  <a href='/?m=vod-detail-id-13203.html'>突击再突击</a>

		  <a href='/?m=vod-detail-id-13139.html'>后妈的春天</a>

		  </div>
        <input type="submit" name="submit" class="imgbt" value="" />
      </form>
    </ul>
    <ul class="nav-qt aa">
      <li class="bb"><strong class="ma"><i class="mabg"></i>手机观看</strong>
      <div class="cc maw"><i class="ewmbg"></i><p>扫描二维码用手机观看</p></div>
	<li class="bb member"><strong class="ma"><i class="mbbg"></i></strong><div class="cc mbp"></div> </li>
	</ul>
<ul class="sj-search"><li class="sbtn2"><i class="sjbg-search"></i></li></ul>
<ul class="sj-nav"><li class="sbtn1"><i class="sjbg-nav"></i></li></ul>
<ul class="sj-navhome"><li><a href="/"><i class="sjbg-home"></i></a></li></ul>
</div>
<div class="nav-down clearfix">
<div id="topnav-1" class="nav-down-1" style="display:none;" _t_nav="topnav-1">
<div class="nav-down-2 clearfix">
	<ul>
	<?php if (!empty($column[0]['subcat'])) :?>
		<?php foreach ($column[0]['subcat'] as $key => $va): ?>	
      		<li><a href="<?=Url::to(['video/index','id'=>$va['id']])?>"><?=$va['name']?></a></li>
		<?php endforeach; ?>
	<?php endif;?>	
</ul>
</div>
</div>
<div id="topnav-2" class="nav-down-1" style="display:none;" _t_nav="topnav-2">
<div class="nav-down-2 clearfix">
<ul>
	<?php if (!empty($column[1]['subcat'])) :?>
		<?php foreach ($column[1]['subcat'] as $key => $value): ?>	
      		<li><a href="<?=Url::to(['video/index','id'=>$value['id']])?>"><?=$value['name']?></a></li>
		<?php endforeach; ?>
	<?php endif;?>	
</ul>
</div>
</div>
<div id="topnav-3" class="nav-down-1" style="display:none;" _t_nav="topnav-3">
<div class="nav-down-2 clearfix">
	<ul>
		<?php if (!empty($column[2]['subcat'])) :?>
			<?php foreach ($column[2]['subcat'] as $key => $value): ?>	
	      		<li><a href="<?=Url::to(['video/index','id'=>$value['id']])?>"><?=$value['name']?></a></li>
			<?php endforeach; ?>
		<?php endif;?>	
	</ul>
</div>
</div>
<div id="topnav-4" class="nav-down-1" style="display:none;" _t_nav="topnav-4">
<div class="nav-down-2 clearfix">
	<ul>
		<?php if (!empty($column[3]['subcat'])) :?>
			<?php foreach ($column[3]['subcat'] as $key => $value): ?>	
	      		<li><a href="<?=Url::to(['video/index','id'=>$value['id']])?>"><?=$value['name']?></a></li>
			<?php endforeach; ?>
		<?php endif;?>	
	</ul>
</div>
</div>
<div id="topnav-5" class="nav-down-1" style="display:none;" _t_nav="topnav-5">
<div class="nav-down-2 clearfix"><ul>
	<?php if (!empty($column[4]['subcat'])) :?>
		<?php foreach ($column[4]['subcat'] as $key => $value): ?>	
      		<li><a href="/?m=vod-type-id-5.html"><?=$value['name']?></a></li>
		<?php endforeach; ?>
	<?php endif;?>	
</ul></div></div>
 <div id="topnav-6" class="nav-down-1" style="display:none;" _t_nav="topnav-6">
	<div class="nav-down-2 clearfix">
		<ul>
			<?php if (!empty($column[5]['subcat'])) :?>
				<?php foreach ($column[5]['subcat'] as $key => $value): ?>	
		      		<li><a href="/?m=vod-type-id-5.html" ><?=$value['name']?></a></li>
				<?php endforeach; ?>
			<?php endif;?>
        </ul>
      </div>
    </div>
   <!--美女图结束-->
    <!--美女图片-->
      <div id="topnav-news" class="nav-down-1" style="display:none;" _t_nav="topnav-news">
      <div class="nav-down-2 clearfix">
        <ul>
		
          <li> <a href="/?m=art-type-id-1.html">性感美女 </a> </li>

          <li> <a href="/?m=art-type-id-4.html">性感车模 </a> </li>

        </ul>
      </div>
    </div>
   <!--美女图结束-->
<!--手机版导航-->
  <div id="sj-nav-1" class="nav-down-1 sy1 sj-noover" style="display:none;" _s_nav="sj-nav-1">
    <div class="nav-down-2 sj-nav-down-2 clearfix">
    <ul>
      <li><a href="/" class="on">首页</a></li>

      <li><a href="/?m=vod-type-id-1.html">电影</a></li>

      <li><a href="/?m=vod-type-id-2.html">连续剧</a></li>

      <li><a href="/?m=vod-type-id-3.html">综艺</a></li>

      <li><a href="/?m=vod-type-id-4.html">动漫</a></li>


      <li><a href="/?m=vod-type-id-5.html">动作片</a></li>

      <li><a href="/?m=vod-type-id-6.html">喜剧片</a></li>

      <li><a href="/?m=vod-type-id-7.html">爱情片</a></li>

      <li><a href="/?m=vod-type-id-8.html">科幻片</a></li>

      <li><a href="/?m=vod-type-id-9.html">恐怖片</a></li>

      <li><a href="/?m=vod-type-id-10.html">剧情片</a></li>

      <li><a href="/?m=vod-type-id-11.html">战争片</a></li>

      <li><a href="/?m=vod-type-id-16.html">伦理片</a></li>

      <li><a href="/?m=vod-type-id-17.html">微电影</a></li>

      <li><a href="/?m=vod-type-id-12.html">国产剧</a></li>

      <li><a href="/?m=vod-type-id-13.html">港台剧</a></li>

      <li><a href="/?m=vod-type-id-14.html">日韩剧</a></li>

      <li><a href="/?m=vod-type-id-15.html">欧美剧</a></li>

      <li><a href="/?m=art-index.html">美女图片</a></li>
    </ul>
    </div>
  </div>
  <div id="sj-nav-search" class="nav-down-1 sy2 sj-noover" style="display:none;" _t_nav1="sj-nav-search">
    <div class="nav-down-2 sj-nav-down-search clearfix">
<form action="/index.php?m=vod-search" method="post">
        <input type="text" id="wd" name="wd" class="input" onblur="if(this.value==''){ this.value='输入关键词';this.style.color='#cfcdcd';}" onfocus="if(this.value=='输入关键词'){this.value='';this.style.color='';}" value="输入关键词" />
        <input type="submit" name="submit" class="imgbt" value="搜 索" />
      </form>
</form></div></div></div></div>
<div class="topone clearfix"></div>
<!-- <div class="leaveNavInfo">
<h3><span id="adminleaveword"></span>小俊工作室www.xiaog.cc致力于模板仿制、插件服务等，请记住本站网址：edc1.com</h3></div> -->


<div class="channel-focus">
  <div class="channel-silder layout">
    <ul class="channel-silder-cnt">
    <?php foreach ($video as $key => $v) :?>
      <?php if ($v['recommend'] == 1):?>
     
        <li class="channel-silder-panel"><a class="channel-silder-img" target="_blank" href=""><img src="<?=$v['pic']?>"  title="<?=$v['topic']?>" /></a>
        <div class="channel-silder-intro">
          <div class="channel-silder-title">
            <h2><a target="_blank" href="/?m=vod-detail-id-5053.html" title="<?=$v['topic']?>"><?=$v['topic']?></a></h2>
            <span><?=$v['renewal']?></span></div>
          <ul class="channel-silder-info">
            <li class="long">
              <label>主演：</label>
              <span><?=$v['protagonist']?></span></li>
            <li>类型：<span><?php echo $v->column->name;?></span></li>
            <li>导演：<span><?=$v['director']?></span></li>
            <li>年份：<span><?php echo $v->videoTime->time_name?></span></li>
            <li>时间：<span><?php echo date('Y-m-d H:i:s',$v['add_time']);?></span></li>
          </ul>
          <p class="channel-silder-desc"> 剧情：<span><?=$v['introduce']?></span></p>
          <a class="channel-silder-play" target="_blank" href="/?m=vod-detail-id-5053.html" title="观看《<?=$v['topic']?>》">马上观看</a></div>
      </li>
     <?php  endif ?>
    
    <?php endforeach;?>
     

    
      
      
      
      
      
     

    </ul>
    <ul class="channel-silder-nav">
    <?php foreach ($video as $key => $v):?>
      <?php if ($v['recommend'] == 1):?>
      <li><a target="_blank" href="" ><img class="lazy" data-original="" src="<?=$v['pic']?>" alt="<?=$v['topic']?>"></a></li>

     
      <?php endif;?>
    <?php endforeach;?>

    </ul>
  </div>
</div>
<script type="text/javascript">
	jQuery(".channel-silder").slide({
		titCell:".channel-silder-nav li",
		mainCell:".channel-silder-cnt",
		delayTime:800,
		triggerTime:0,
		interTime:5000,
		pnLoop:false,
		autoPage:false,
		autoPlay:true
	});
</script>
<div class="channel-hide">
<div class="Tag_item" id="tv-directory">
<ul class="Tag_item_list">
<div class="main">
<!--首页推荐-->
<div class="index-tj clearfix">
<div class="index-tj-l">
<h1 class="title index-color clearfix">
<span class="hitkey">

<a  target="_blank" href='/?m=vod-detail-id-13523.html'>新万家灯火</a>

<a  target="_blank" href='/?m=vod-detail-id-13307.html'>养母的花样年华</a>

<a  target="_blank" href='/?m=vod-detail-id-13252.html'>神契幻奇谭</a>

<a  target="_blank" href='/?m=vod-detail-id-13204.html'>梦想合伙人</a>

<a  target="_blank" href='/?m=vod-detail-id-13203.html'>突击再突击</a>

 </span>推荐影视</h1><ul>


    <li class="p2 m1  "><a class="link-hover" target="_blank" href="/?m=vod-detail-id-5053.html" title="大话西游之爱你一万年"><img class="lazy" data-original="http://pic.pic-img.com/pic/upload/vod/2017-09-30/15067438279.jpg" src="/picture/load.gif" alt="大话西游之爱你一万年"><span class="video-bg"></span><span class="lzbz"><p class="name">大话西游之爱你一万年</p><p class="actor">黄子韬  尹正  赵艺  刘天佐</p><p class="actor">国产剧</p><p class="actor">2017/大陆</p></span><p class="other"><i>更新至53集</i></p></a>
    </li>

    

</ul>
 </div>

 <div class="index-tj-r">
 <h1 class="title index-color">随机推荐</h1><ul>

 <li><a target="_blank" href="/?m=vod-detail-id-13520.html" title="古墓丽影：源起之战"><span class="bz">TS抢先</span><gm  class="gs"  > 01</gm><span class="az">古墓丽影：源起之战</span></a></li>

 


 </ul></div></div>

 <!--获取电影-->

	<div class="index-area clearfix">
    <h1 class="title index-color">
       <span class="hitkey kp">


      <li><a href="/?m=vod-type-id-5.html">动作片</a></li>

      <li><a href="/?m=vod-type-id-6.html">喜剧片</a></li>

      <li><a href="/?m=vod-type-id-7.html">爱情片</a></li>

      <li><a href="/?m=vod-type-id-8.html">科幻片</a></li>

      <li><a href="/?m=vod-type-id-9.html">恐怖片</a></li>

      <li><a href="/?m=vod-type-id-10.html">剧情片</a></li>

      <li><a href="/?m=vod-type-id-11.html">战争片</a></li>

      <li><a href="/?m=vod-type-id-16.html">伦理片</a></li>

      <li><a href="/?m=vod-type-id-17.html">微电影</a></li>



      <a href="/?m=vod-type-id-1.html">更多»</a>
      </span>
      <a href="/?m=vod-type-id-1.html">电影</a>
	  </h1>
    <ul>
  <?php  foreach ($video as $key => $value):?>
  

    <li class="p1 m1">
      <a target="_blank" class="link-hover" href="" title="<?=$value['topic']?>">
      <img class="lazy" data-original="" src="<?=$value['pic']?>" alt="<?=$value['topic']?>">
      <span class="video-bg"></span>
      <span class="lzbz">
        <p class="name"><?=$value['topic']?></p>
        <p class="actor"><?=$value['protagonist']?></p>
        <p class="actor"><?php echo isset($value->column->name)?$value->column->name:'';?></p>
        <p class="actor"><?=$value->videoTime->time_name;?>/<?=$value->videoRegion->region_name;?></p>
      </span>
        <p class="other">
          <i><?=$value['renewal']?></i>
        </p>
      </a>
    </li>

  <?php endforeach;?>
   

    </ul>
    </div>



<!--结束-->



<!--获取所以顶级目录加内容-->

	<div class="index-area clearfix">
    <h1 class="title index-color">
       <span class="hitkey kp">


      <li><a href="/?m=vod-type-id-12.html">国产剧</a></li>

      <li><a href="/?m=vod-type-id-13.html">港台剧</a></li>

      <li><a href="/?m=vod-type-id-14.html">日韩剧</a></li>

      <li><a href="/?m=vod-type-id-15.html">欧美剧</a></li>



      <a href="/?m=vod-type-id-2.html">更多»</a>
      </span>
      <a href="/?m=vod-type-id-2.html">连续剧</a>
	  </h1>
    <ul>


    <li class="p1 m1"><a target="_blank" class="link-hover" href="/?m=vod-detail-id-5053.html" title="大话西游之爱你一万年"><img class="lazy" data-original="http://pic.pic-img.com/pic/upload/vod/2017-09-30/15067438279.jpg" src="/picture/load.gif" alt="大话西游之爱你一万年"><span class="video-bg"></span><span class="lzbz"><p class="name">大话西游之爱你一万年</p><p class="actor">黄子韬  尹正  赵艺  刘天佐</p><p class="actor">国产剧</p><p class="actor">2017/大陆</p></span><p class="other"><i>更新至53集</i></p></a>
    </li>

   


    </ul>
    </div>


	<div class="index-area clearfix">
    <h1 class="title index-color">
       <span class="hitkey kp">




      <a href="/?m=vod-type-id-3.html">更多»</a>
      </span>
      <a href="/?m=vod-type-id-3.html">综艺</a>
	  </h1>
    <ul>


    <li class="p1 m1"><a target="_blank" class="link-hover" href="/?m=vod-detail-id-13377.html" title="德云社-戊戌年开箱庆典整场"><img class="lazy" data-original="http://pic.pic-img.com/pic/upload/vod/2018-03/201803161521133126.jpg" src="/picture/load.gif" alt="德云社-戊戌年开箱庆典整场"><span class="video-bg"></span><span class="lzbz"><p class="name">德云社-戊戌年开箱庆典整场</p><p class="actor">德云社-戊戌年开箱庆典整场</p><p class="actor">综艺</p><p class="actor">2018/大陆</p></span><p class="other"><i>HD高清</i></p></a>
    </li>

   

    </ul>
    </div>


	<div class="index-area clearfix">
    <h1 class="title index-color">
       <span class="hitkey kp">




      <a href="/?m=vod-type-id-4.html">更多»</a>
      </span>
      <a href="/?m=vod-type-id-4.html">动漫</a>
	  </h1>
    <ul>


    <li class="p1 m1"><a target="_blank" class="link-hover" href="/?m=vod-detail-id-13375.html" title="早期人类"><img class="lazy" data-original="http://pic.pic-img.com/pic/upload/vod/2018-03/152112475712.jpg" src="/picture/load.gif" alt="早期人类"><span class="video-bg"></span><span class="lzbz"><p class="name">早期人类</p><p class="actor">汤姆·希德勒斯顿,埃迪·雷德梅恩,麦茜·威廉姆斯,蒂莫西·斯波</p><p class="actor">动漫</p><p class="actor">2018/英国</p></span><p class="other"><i>TS无字</i></p></a>
    </li>

    

    </ul>
    </div>



<!--结束-->



<!--/底部-->
<div class="footer clearfix">
免责声明:本站所有视频均来自互联网收集而来，版权归原创者所有，如果侵犯了你的权益，请通知我们，我们会及时删除侵权内容，谢谢合作。</p>

 </p>

Copyright © 2012-2016 《<a target="_blank" href="http://edc1.com">秋霞电影网</a>》

</div>
<div class="gotop"><a class="gotopbg" href="javascript:;" title="返回顶部"></a></div>

<!--百度自动提交连接-->


</body>
</html>
