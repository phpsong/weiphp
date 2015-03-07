<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="/weiphp/Public/Home/css/font-awesome.css?v=<?php echo SITE_VERSION;?>" media="all">
	<link rel="stylesheet" type="text/css" href="/weiphp/Public/Home/css/mobile_module.css?v=<?php echo SITE_VERSION;?>" media="all">
    <script type="text/javascript" src="/weiphp/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/weiphp/Public/Home/js/prefixfree.min.js"></script>
    <script type="text/javascript" src="/weiphp/Public/Home/js/m/dialog.js?v=<?php echo SITE_VERSION;?>"></script>
    <script type="text/javascript" src="/weiphp/Public/Home/js/m/flipsnap.min.js"></script>
    <script type="text/javascript" src="/weiphp/Public/Home/js/m/mobile_module.js?v=<?php echo SITE_VERSION;?>"></script>
    <script type="text/javascript" src="/weiphp/Public/Home/js/admin_common.js?v=<?php echo SITE_VERSION;?>"></script>
	<title><?php echo empty($page_title) ? C('WEB_SITE_TITLE') : $page_title; ?></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta content="application/xhtml+xml;charset=UTF-8" http-equiv="Content-Type">
    <meta content="no-cache,must-revalidate" http-equiv="Cache-Control">
    <meta content="no-cache" http-equiv="pragma">
    <meta content="0" http-equiv="expires">
    <meta content="telephone=no, address=no" name="format-detection">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <link rel="shortcut icon" href="<?php echo SITE_URL;?>/favicon.ico">
</head>	
<style type="text/css">
.banner{ width:100%; overflow:hidden; position:relative;}
.banner ul{ position:absolute; left:0; top:0; z-index:10; -webkit-animation:}
.banner ul li{ float:left; display:table-cell; position:relative}
.banner li a{ width:100%; height:100%; display:block;}
.banner li .title{background-color:RGBA(0,0,0,.5); height:30px; color:#fff; line-height:30px; padding-left:10px; position:absolute; left:0; bottom:0; width:100%; z-index:1000;}
.identify{text-align:right; position:absolute; bottom:0; right:0; z-index:100; height:30px;}
.identify em{ display:inline-block; margin:10px 5px;-webkit-border-radius: 6px;-moz-border-radius: 6px;
border-radius: 6px;margin-left: 5px;width: 12px;height: 12px;background: #fff;}
.identify em.cur{ background-color:#090}
.identify .fl{ float:left}
.identify .fr{ float:right}
.small_pic_list li{ border-top:1px solid #fff; border-bottom:1px solid #ccc; height:80px; overflow:hidden}
.small_pic_list li a{ display:block; padding:10px 10px 10px 80px; position:relative; min-height:60px; color:#333}
.small_pic_list li a:active{ background-color:#CCC}
.small_pic_list li a img{ position:absolute; left:10px; top:10px; width:60px; height:60px;}
.small_pic_list li a h6{ font-size:18px; font-weight:bold; overflow:hidden; text-overflow:ellipsis; white-space:nowrap}
.small_pic_list li a p{ color:#999; font-size:13px; line-height:22px;}
</style>
<body id="weisite">
<div class="container">
    <section class="banner">
    	<ul>
        <?php foreach($list_data as $k=>$vo){ if($k>2) continue; ?>
        	<li>
            	<a href="<?php echo U('detail', 'id='.$vo[id]);?>"><img src="<?php echo (get_cover_url($vo["cover"])); ?>"/></a>
            	<span class="title"><?php echo ($vo["title"]); ?></span>
            </li>
         <?php $img_count += 1 ;unset($list_data[$k]); } ?>
        </ul>
        <div class="identify">
        	<?php for($i=0; $i<$img_count; $i++){ ?>
                <em></em>
             <?php } ?>
        </div>
    </section>
    <ul class="small_pic_list">
    <?php if(is_array($list_data)): $i = 0; $__LIST__ = $list_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
        	<a href="<?php echo U('detail', 'id='.$vo[id]);?>">
            	<?php if(!empty($vo["cover"])): ?><img src="<?php echo (get_cover_url($vo["cover"])); ?>"/><?php endif; ?>
                <h6><?php echo ($vo["title"]); ?></h6>
                <p><?php echo ($vo["intro"]); ?></p>
                <span class="colorless"><?php echo (time_format($vo["cTime"])); ?></span>
            </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
    <!-- 分页 -->
    <div class="page"> <?php echo ((isset($_page) && ($_page !== ""))?($_page):''); ?> </div>
</div>
<!-- 底部导航 -->
<?php echo ($footer_html); ?>
<!-- 统计代码 -->
<?php if(!empty($config["code"])): ?><p class="hide bdtongji">
<?php echo ($config["code"]); ?>
</p><?php endif; ?>
</body>
<script type="text/javascript">
$(function(){
	$.WeiPHP.initBanner(true,5000);
})

</script>
</html>