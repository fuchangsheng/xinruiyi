<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
<html>

<head>
<meta charset="utf-8" />
<title>成功案例 - <?php echo (C("webname")); ?></title>
<meta name="description" content="成功案例" />
<meta name="keywords" content="成功案例" />
<meta name="generator" content="MetInfo 5.2.6" />
<link href="favicon.ico" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="http://xinruiyi.bendi.com/Themes/Home/lanse/static/css/metinfo_ui.css" id="metuimodule" data-module="10001" />
<link rel="stylesheet" type="text/css" href="http://xinruiyi.bendi.com/Themes/Home/lanse/static/css/metinfo.css" />
<script src="http://xinruiyi.bendi.com/Themes/Home/lanse/static/js/jquery1.7.2.js" type="text/javascript"></script>
<script src="http://xinruiyi.bendi.com/Themes/Home/lanse/static/js/metinfo_ui.js" type="text/javascript"></script>
<script src="http://xinruiyi.bendi.com/Themes/Home/lanse/static/js/ch.js" type="text/javascript"></script>
<!--[if IE]>
<script src="http://xinruiyi.bendi.com/Themes/Home/lanse/static/js/html5.js" type="text/javascript"></script>
<![endif]-->
</head>
<script src="http://xinruiyi.bendi.com/Themes/Home/lanse/static/js/slide.js" type="text/javascript"></script>
<script type="text/javascript" src="http://xinruiyi.bendi.com/Themes/Home/lanse/static/js/picshow.js"></script>

<script type="text/javascript">
    $(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() >= 165) {
                if (!$("nav").hasClass("navfix")) {
                    $("nav").addClass("navfix");
                }
            }
            if ($(window).scrollTop() < 165) {
                $("nav").removeClass("navfix");
            }
        })
    });
</script>

</head>
<body>
    <div class="hm_top">
        <div class="hm_top_content">
            <div class="hm_content_top">
                <div class="top_left"><?php echo (C("welcomes")); ?> </div>
                <div class="top_right"><a href='' onclick='SetHome(this,window.location,"设置成功");' style='cursor:pointer;' title='设为首页'>设为首页</a> | <a href='' onclick='addFavorite("你是否收藏网站");' style='cursor:pointer;' title='收藏本站'>加为收藏</a> | <a href="/contact/">联系我们</a>
                </div>
            </div>
            <div class="hm_content_bottom">
                <div class="bottom_left">
                    <img src="http://xinruiyi.bendi.com/Themes/Home/lanse/static/picture/1461044213.png" alt="佛山市南海瑞亿金属建材有限公司" title="佛山市南海瑞亿金属建材有限公司" style="margin:0px 0px 0px 0px;" />
                </div>
                <div class="bottom_right">
                    <P class="phone fr">服务热线：
                        <SPAN><?php echo (C("phone")); ?></SPAN>
                        <SPAN><?php echo (C("tel")); ?></SPAN>
                    </P>
                </div>
            </div>
        </div>
    </div>
    <nav class="mynav">
        <div class="inner">
            <ul class="list-none">
                <li id="nav_10001" style='width:108px;' class='navdown'><a href='http://www.hnxryi.com/' title='网站首页' class='nav'><span>网站首页</span></a>
                </li>
                <li class="line"></li>
                <li id='nav_1' style='width:105px;'><a href='ldbmq/' 0 title='铝单板幕墙' class='hover-none nav'><span>铝单板幕墙</span></a>
                </li>
                <li class="line"></li>
                <li id='nav_2' style='width:105px;'><a href='ldbdd/' title='铝单板吊顶' class='hover-none nav'><span>铝单板吊顶</span></a>
                </li>
                <li class="line"></li>
                <li id='nav_4' style='width:105px;'><a href='/product/' title='瑞亿产品' class='hover-none nav'><span>瑞亿产品</span></a>
                </li>
                <li class="line"></li>
                <li id='nav_46' style='width:105px;'><a href='/ldbdza/' title='铝单板定制' class='hover-none nav'><span>铝单板定制</span></a>
                </li>
                <li class="line"></li>
                <li id='nav_5' style='width:105px;'><a href='/case/' title='成功案例' class='hover-none nav'><span>成功案例</span></a>
                </li>
                <li class="line"></li>
                <li id='nav_8' style='width:105px;'><a href='/news/' 0 title='瑞亿资讯' class='hover-none nav'><span>瑞亿资讯</span></a>
                </li>
                <li class="line"></li>
                <li id='nav_7' style='width:105px;'><a href='/about/' title='关于瑞亿' class='hover-none nav'><span>关于瑞亿</span></a>
                </li>
                <li class="line"></li>
                <li id='nav_9' style='width:105px;'><a href='/about/contact/' title='联系瑞亿' class='hover-none nav'><span>联系瑞亿</span></a>
                </li>
            </ul>
        </div>
        <div class="hm_ss">
            <div class="hm_ss_content">
                <div class='myS'>
                    <div style="float:left; height:30px; width:700px; margin-top:2px; line-height:30px;">&nbsp;&nbsp;
                        <stong>热门搜索关键词：</stong>
                        <?php if(is_array($hotKeywordsArr)): $i = 0; $__LIST__ = $hotKeywordsArr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="/" style="color:red;"><?php echo ($vo); ?></a> |<?php endforeach; endif; else: echo "" ;endif; ?>

                    </div>
                    <div style="float:right; margin-top:2px;">
                        <form method="POST" name="myform1" action="http://www.hnxryi.com/search/search.php?lang=cn" target="_self">
                            <input type="hidden" name="lang" value='cn' />&nbsp;
                            <input type="hidden" name="searchtype" value='0' />&nbsp;<span class='navsearch_input'><input type="text" name="searchword" size='20'/></span>&nbsp;
                            <input class='searchimage' type='image' src='http://xinruiyi.bendi.com/Themes/Home/lanse/static/images/search.png' />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="hm_banner">
        <div class="met_flash1">
            <div class="flash">
                <img src='picture/1457836657.jpg' width='980' alt='' height='250'>
            </div>
        </div>
    </div>
    <div class="hm_news">
        <!-- 代码 开始 -->
        <div class="box">
<span style="float:left; margin-right:10px; height:15px; line-height:15px; font-size:14px;"></span>
        </div>
        <!-- 代码 结束 -->
    </div>
</body>
<div class="sidebar inner">
    <div class="sb_nav">
        <h3 class='title myCorner' data-corner='top 5px'>瑞亿产品</h3>
        <div class="active" id="sidebar" data-csnow="10" data-class3="0" data-jsok="1">
            <dl class="list-none navnow"><dt id='part2_10'><a href='../product/product.php?lang=cn&class2=10'  title='铝单板系列' ><span>铝单板系列</span></a></dt>
                <dd class="sub">
                    <h4 id='part3_16'><a href='../product/product.php?lang=cn&class3=16'  title='标准铝单板' class='nav'><span>标准铝单板</span></a></h4>
                    <h4 id='part3_17'><a href='../product/product.php?lang=cn&class3=17'  title='冲孔铝单板' class='nav'><span>冲孔铝单板</span></a></h4>
                    <h4 id='part3_18'><a href='../product/product.php?lang=cn&class3=18'  title='异形铝单板' class='nav'><span>异形铝单板</span></a></h4>
                    <h4 id='part3_19'><a href='../product/product.php?lang=cn&class3=19'  title='木纹铝单板' class='nav'><span>木纹铝单板</span></a></h4>
                    <h4 id='part3_21'><a href='../product/product.php?lang=cn&class3=21'  title='氟碳铝单板' class='nav'><span>氟碳铝单板</span></a></h4>
                    <h4 id='part3_34'><a href='../product/product.php?lang=cn&class3=34'  title='石纹铝单板' class='nav'><span>石纹铝单板</span></a></h4>
                </dd>
            </dl>
            <dl class="list-none navnow"><dt id='part2_24'><a href='../product/product.php?lang=cn&class2=24'  title='铝方通系列' ><span>铝方通系列</span></a></dt>
                <dd class="sub">
                    <h4 id='part3_26'><a href='../product/product.php?lang=cn&class3=26'  title='铝合金四方管' class='nav'><span>铝合金四方管</span></a></h4>
                    <h4 id='part3_27'><a href='../product/product.php?lang=cn&class3=27'  title='V型铝方通' class='nav'><span>V型铝方通</span></a></h4>
                    <h4 id='part3_28'><a href='../product/product.php?lang=cn&class3=28'  title='U型铝方通' class='nav'><span>U型铝方通</span></a></h4>
                    <h4 id='part3_29'><a href='../product/product.php?lang=cn&class3=29'  title='木纹铝方通' class='nav'><span>木纹铝方通</span></a></h4>
                </dd>
            </dl>
            <dl class="list-none navnow"><dt id='part2_12'><a href='../product/product.php?lang=cn&class2=12'  title='铝天花系列' class="zm"><span>铝天花系列</span></a></dt>
            </dl>
            <dl class="list-none navnow"><dt id='part2_13'><a href='../product/product.php?lang=cn&class2=13'  title='铝格栅系列' class="zm"><span>铝格栅系列</span></a></dt>
            </dl>
            <dl class="list-none navnow"><dt id='part2_14'><a href='../product/product.php?lang=cn&class2=14'  title='铝条扣系列' class="zm"><span>铝条扣系列</span></a></dt>
            </dl>
            <dl class="list-none navnow"><dt id='part2_15'><a href='../product/product.php?lang=cn&class2=15'  title='铝圆管系列' class="zm"><span>铝圆管系列</span></a></dt>
            </dl>
            <dl class="list-none navnow"><dt id='part2_22'><a href='../product/product.php?lang=cn&class2=22'  title='铝蜂窝板系列' class="zm"><span>铝蜂窝板系列</span></a></dt>
            </dl>
            <dl class="list-none navnow"><dt id='part2_23'><a href='../product/product.php?lang=cn&class2=23'  title='铝挂片系列 ' class="zm"><span>铝挂片系列 </span></a></dt>
            </dl>
            <dl class="list-none navnow"><dt id='part2_25'><a href='../product/product.php?lang=cn&class2=25'  title='铝屏风雕花系列' class="zm"><span>铝屏风雕花系列</span></a></dt>
            </dl>
            <dl class="list-none navnow"><dt id='part2_11'><a href='../product/product.php?lang=cn&class2=11'  title='铝塑板系列' class="zm"><span>铝塑板系列</span></a></dt>
            </dl>
            <div class="clear"></div>
        </div>
        <h3 class="rxcp_bj">工程应用</h3>
        <div style="height:580px;margin-bottom:15px;overflow:hidden; border: solid #CCCCCC 1px; padding-left:3px; padding-bottom:0px;">
            <ol style='padding:0px;margin:0px;'>
                <li class='lista'>
                    <a href='../case/showimg.php?lang=cn&id=57' title='海航集团办公楼' target='_self' class='img'>
                        <img src='picture/1463744159.jpg' alt='海航集团办公楼' title='海航集团办公楼' width='170' height='125' />
                    </a>
                    <div style='width:170px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../case/showimg.php?lang=cn&id=57' title='海航集团办公楼' target='_self'>海航集团办公楼</a>
                    </div>
                </li>
                <li class='lista'>
                    <a href='../case/showimg.php?lang=cn&id=58' title='常德湘雅医院' target='_self' class='img'>
                        <img src='picture/1463659659.jpg' alt='常德湘雅医院' title='常德湘雅医院' width='170' height='125' />
                    </a>
                    <div style='width:170px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../case/showimg.php?lang=cn&id=58' title='常德湘雅医院' target='_self'>常德湘雅医院</a>
                    </div>
                </li>
                <li class='lista'>
                    <a href='../case/showimg.php?lang=cn&id=36' title='怀化体育馆' target='_self' class='img'>
                        <img src='picture/1464311942.jpg' alt='怀化体育馆' title='怀化体育馆' width='170' height='125' />
                    </a>
                    <div style='width:170px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../case/showimg.php?lang=cn&id=36' title='怀化体育馆' target='_self'>怀化体育馆</a>
                    </div>
                </li>
                <li class='lista'>
                    <a href='../case/showimg.php?lang=cn&id=56' title='娄底中心医院' target='_self' class='img'>
                        <img src='picture/1463105294.jpg' alt='娄底中心医院' title='娄底中心医院' width='170' height='125' />
                    </a>
                    <div style='width:170px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../case/showimg.php?lang=cn&id=56' title='娄底中心医院' target='_self'>娄底中心医院</a>
                    </div>
                </li>
                <li class='lista'>
                    <a href='../case/showimg.php?lang=cn&id=51' title='湖南卫视' target='_self' class='img'>
                        <img src='picture/1461842959.jpg' alt='湖南卫视' title='湖南卫视' width='170' height='125' />
                    </a>
                    <div style='width:170px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../case/showimg.php?lang=cn&id=51' title='湖南卫视' target='_self'>湖南卫视</a>
                    </div>
                </li>
                <li class='lista'>
                    <a href='../case/showimg.php?lang=cn&id=52' title='贵阳交通技术学院' target='_self' class='img'>
                        <img src='picture/1461832893.jpg' alt='贵阳交通技术学院' title='贵阳交通技术学院' width='170' height='125' />
                    </a>
                    <div style='width:170px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../case/showimg.php?lang=cn&id=52' title='贵阳交通技术学院' target='_self'>贵阳交通技术学院</a>
                    </div>
                </li>
                <li class='lista'>
                    <a href='../case/showimg.php?lang=cn&id=48' title='岳阳万富隆商业中心' target='_self' class='img'>
                        <img src='picture/1460884903.jpg' alt='岳阳万富隆商业中心' title='岳阳万富隆商业中心' width='170' height='125' />
                    </a>
                    <div style='width:170px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../case/showimg.php?lang=cn&id=48' title='岳阳万富隆商业中心' target='_self'>岳阳万富隆商业中心</a>
                    </div>
                </li>
                <li class='lista'>
                    <a href='../case/showimg.php?lang=cn&id=46' title='甘肃黄河三峡客服中心' target='_self' class='img'>
                        <img src='picture/1460885442.jpg' alt='甘肃黄河三峡客服中心' title='甘肃黄河三峡客服中心' width='170' height='125' />
                    </a>
                    <div style='width:170px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../case/showimg.php?lang=cn&id=46' title='甘肃黄河三峡客服中心' target='_self'>甘肃黄河三峡客服中心</a>
                    </div>
                </li>
                <li class='lista'>
                    <a href='../case/showimg.php?lang=cn&id=49' title='益阳顺德城' target='_self' class='img'>
                        <img src='picture/1460886378.jpg' alt='益阳顺德城' title='益阳顺德城' width='170' height='125' />
                    </a>
                    <div style='width:170px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../case/showimg.php?lang=cn&id=49' title='益阳顺德城' target='_self'>益阳顺德城</a>
                    </div>
                </li>
                <li class='lista'>
                    <a href='../case/showimg.php?lang=cn&id=50' title='长沙县法院' target='_self' class='img'>
                        <img src='picture/1460885389.jpg' alt='长沙县法院' title='长沙县法院' width='170' height='125' />
                    </a>
                    <div style='width:170px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../case/showimg.php?lang=cn&id=50' title='长沙县法院' target='_self'>长沙县法院</a>
                    </div>
                </li>
            </ol>
        </div>
        <h3 class="rxcp_bj">联系方式</h3>
        <div style="margin-bottom:15px;overflow:hidden; border: solid #CCCCCC 1px; padding-left:3px; padding-bottom:0px;">  <span style="color: #808080"><img alt="" src="picture/20160306_190745.jpg" style="height: 58px; width: 192px" /><br />
<span style="font-size: 13px">电话：0757-85620677<br />
手机：</span></span><span style="color: #ff0000"><span style="font-size: 13px"><strong>18942452888</strong></span></span>
            <br />
<span style="color: #808080"><span style="font-size: 13px">邮箱：616517982@QQ.com<br />
网址：www.hnxryi.com<br />
地址：广东省佛山市南海区里水镇志高工业园</span></span>
            <div class="clear"></div>
        </div>
    </div>
    <div class="sb_box">
        <h3 class="title">
            <div class="position">当前位置：<a href="http://www.hnxryi.com/" title="网站首页">网站首页</a> &gt; <a href=../product/ >瑞亿产品</a> > <a href=../product/product.php?lang=cn&class2=10 >铝单板系列</a></div>

        </h3>
        <div class="clear"></div>
        <style type="text/css">
            #photo-list {
             /* 3张图片的宽度（包含宽度、padding、border、图片间的留白）
                 计算：3*(100+2*2+1*2+9) - 9
                 之所以减去9是第三张图片的右边留白
             */
    width: 740px;
            /* 图片的宽度（包含高度、padding、border）
                计算：100+2*2+1*2
            */
    height: 250px;
    margin: 0px auto;
    overflow: hidden;
}

#photo-list ul {
    list-style: none;
    margin: 0px;
    padding: 0px;
}

#photo-list li {
    float: left;
    padding-right: 9px;
}

#photo-list img {
    background: #fff;
    padding: 2px;
}
        </style>
        <div class="active" id="productlist" style="border:1px solid #ddd; border-radius:3px; margin-top:20px;">
            <ul class='list-none metlist'>
                <li class='list' style='width:215px; margin-left:15px; margin-right:15px;'>
                    <a href='showproduct.php?lang=cn&id=32' title='氟碳铝单板' target='_self' class='img'>
                        <img src='picture/1459941304.jpg' alt='氟碳铝单板' title='氟碳铝单板' width='213' height='160' />
                    </a>
                    <h3><a href='showproduct.php?lang=cn&id=32' title='氟碳铝单板' target='_self'>氟碳铝单板</a></h3>
                </li>

            </ul>
            <div class="clear"></div>
        </div>
        <div style="height:15px;"></div>
        <div id="flip">
            <div class='digg4 metpager_8'><span class='disabled disabledfy'><b>«</b></span><span class='disabled disabledfy'>‹</span><span class='current'>1</span>  <a href=product.php?lang=cn&class1=4&class2=10&page=2>2</a>  <span class='disabled disabledfy'>›</span><a class='disabledfy'
                href=product.php?lang=cn&class1=4&class2=10&page=2><b>»</b></a>
            </div>
        </div>
        <div style="height:30px; line-height:30px; font-size:14px; padding-left:10px; font-weight:bold; color:#333333；; background-color:#CCCCCC">新品推荐</div>
        <div style=" height:250px;overflow:hidden; border:solid #CCCCCC 1px; margin-bottom:15px;">
            <div id="photo-list">
                <ul id="scroll">
                    <li>
                        <div id="active">
                            <ol style='padding:0px;margin:0px;'>
                                <li class='lista'>
                                    <a href='../product/showproduct.php?lang=cn&id=32' title='氟碳铝单板' target='_self' class='img'>
                                        <img src='picture/1459941304.jpg' alt='氟碳铝单板' title='氟碳铝单板' width='220' height='165' />
                                    </a>
                                    <div style='width:225px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../product/showproduct.php?lang=cn&id=32' title='氟碳铝单板' target='_self'>氟碳铝单板</a>
                                    </div>
                                </li>
                                <li class='lista'>
                                    <a href='../product/showproduct.php?lang=cn&id=20' title='幕墙铝单板' target='_self' class='img'>
                                        <img src='picture/1459940933.jpg' alt='幕墙铝单板' title='幕墙铝单板' width='220' height='165' />
                                    </a>
                                    <div style='width:225px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../product/showproduct.php?lang=cn&id=20' title='幕墙铝单板' target='_self'>幕墙铝单板</a>
                                    </div>
                                </li>
                                <li class='lista'>
                                    <a href='../product/showproduct.php?lang=cn&id=4' title='冲孔铝单板' target='_self' class='img'>
                                        <img src='picture/1456892602.jpg' alt='冲孔铝单板' title='冲孔铝单板' width='220' height='165' />
                                    </a>
                                    <div style='width:225px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../product/showproduct.php?lang=cn&id=4' title='冲孔铝单板' target='_self'>冲孔铝单板</a>
                                    </div>
                                </li>
                                <li class='lista'>
                                    <a href='../product/showproduct.php?lang=cn&id=25' title='异形铝单板' target='_self' class='img'>
                                        <img src='picture/1459941014.jpg' alt='异形铝单板' title='异形铝单板' width='220' height='165' />
                                    </a>
                                    <div style='width:225px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../product/showproduct.php?lang=cn&id=25' title='异形铝单板' target='_self'>异形铝单板</a>
                                    </div>
                                </li>
                                <li class='lista'>
                                    <a href='../product/showproduct.php?lang=cn&id=28' title='木纹铝单板' target='_self' class='img'>
                                        <img src='picture/1457945018.jpg' alt='木纹铝单板' title='木纹铝单板' width='220' height='165' />
                                    </a>
                                    <div style='width:225px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../product/showproduct.php?lang=cn&id=28' title='木纹铝单板' target='_self'>木纹铝单板</a>
                                    </div>
                                </li>
                                <li class='lista'>
                                    <a href='../product/showproduct.php?lang=cn&id=29' title='石纹铝单板' target='_self' class='img'>
                                        <img src='picture/1457945863.jpg' alt='石纹铝单板' title='石纹铝单板' width='220' height='165' />
                                    </a>
                                    <div style='width:225px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../product/showproduct.php?lang=cn&id=29' title='石纹铝单板' target='_self'>石纹铝单板</a>
                                    </div>
                                </li>
                                <li class='lista'>
                                    <a href='../product/showproduct.php?lang=cn&id=58' title='雕花铝单板' target='_self' class='img'>
                                        <img src='picture/1463101853.png' alt='雕花铝单板' title='雕花铝单板' width='220' height='165' />
                                    </a>
                                    <div style='width:225px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../product/showproduct.php?lang=cn&id=58' title='雕花铝单板' target='_self'>雕花铝单板</a>
                                    </div>
                                </li>
                                <li class='lista'>
                                    <a href='../product/showproduct.php?lang=cn&id=9' title='木纹铝方通' target='_self' class='img'>
                                        <img src='picture/1456893612.png' alt='木纹铝方通' title='木纹铝方通' width='220' height='165' />
                                    </a>
                                    <div style='width:225px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../product/showproduct.php?lang=cn&id=9' title='木纹铝方通' target='_self'>木纹铝方通</a>
                                    </div>
                                </li>
                                <li class='lista'>
                                    <a href='../product/showproduct.php?lang=cn&id=65' title='V型铝方通' target='_self' class='img'>
                                        <img src='picture/1457948798.png' alt='V型铝方通' title='V型铝方通' width='220' height='165' />
                                    </a>
                                    <div style='width:225px; text-align:center; height:30px; line-height:30px; background-color:#ccc; margin-left:0px; font-weight:bold; font-size:14px'><a href='../product/showproduct.php?lang=cn&id=65' title='V型铝方通' target='_self'>V型铝方通</a>
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </li>
                </ul>
            </div>
            <script type="text/javascript">
                var id = function(el) {
                    return document.getElementById(el);
                },
                    c = id('photo-list');
                if (c) {
                    var ul = id('scroll'),
                        lis = ul.getElementsByTagName('li'),
                        itemCount = lis.length,
                        width = lis[0].offsetWidth, //获得每个img容器的宽度
                        marquee = function() {
                            c.scrollLeft += 2;
                            if (c.scrollLeft % width <= 1) { //当 c.scrollLeft 和 width 相等时，把第一个img追加到最后面
                                ul.appendChild(ul.getElementsByTagName('li')[0]);
                                c.scrollLeft = 0;
                            };
                        },
                        speed = 50; //数值越大越慢
                    ul.style.width = width * itemCount + 'px'; //加载完后设置容器长度
                    var timer = setInterval(marquee, speed);
                    c.onmouseover = function() {
                        clearInterval(timer);
                    };
                    c.onmouseout = function() {
                        timer = setInterval(marquee, speed);
                    };
                };
            </script>
        </div>
        <div style="height:30px; line-height:30px; font-size:14px; padding-left:10px; font-weight:bold; color:#333333；; background-color:#CCCCCC">新闻资讯</div>
        <div style=" height:200px; border:solid #CCCCCC 1px;">
            <div style="height:15px;"></div>
            <div style=" height:200px;overflow:hidden; width:350px; float:left">
                <div style="height:180px;margin-bottom:5px; float:left; width:745px;">
                    <div class="editor" style="margin:0px; padding:0px">
                        <ol class='list-none metlist'>
                            <li class='listnews top'><a href='../news/shownews.php?lang=cn&id=150' title='铝单板厂家如何保证产品质量更优' target='_self'>铝单板厂家如何保证产品质量更优</a>
                            </li>
                            <li class='listnews '><a href='../news/shownews.php?lang=cn&id=149' title='铝单板厂家如何保证产品质量更优' target='_self'>铝单板厂家如何保证产品质量更优</a>
                            </li>
                            <li class='listnews '><a href='../news/shownews.php?lang=cn&id=148' title='如何选择合适的铝单板规格尺寸' target='_self'>如何选择合适的铝单板规格尺寸</a>
                            </li>
                            <li class='listnews '><a href='../news/shownews.php?lang=cn&id=147' title='那个铝单板品牌市场占有率更高' target='_self'>那个铝单板品牌市场占有率更高</a>
                            </li>
                            <li class='listnews '><a href='../news/shownews.php?lang=cn&id=146' title='建筑装饰材料铝单板如何选择才好' target='_self'>建筑装饰材料铝单板如何选择才好</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div style=" height:200px;overflow:hidden;width:350px; float:left">
                <div style="height:180px;margin-bottom:5px; float:left; width:745px;">
                    <div class=" editor" style="margin:0px; padding:0px">
                        <ol class='list-none metlist'>
                            <li class='listnews top'><a href='../news/shownews.php?lang=cn&id=150' title='铝单板厂家如何保证产品质量更优' target='_self'>铝单板厂家如何保证产品质量更优</a>
                            </li>
                            <li class='listnews '><a href='../news/shownews.php?lang=cn&id=149' title='铝单板厂家如何保证产品质量更优' target='_self'>铝单板厂家如何保证产品质量更优</a>
                            </li>
                            <li class='listnews '><a href='../news/shownews.php?lang=cn&id=148' title='如何选择合适的铝单板规格尺寸' target='_self'>如何选择合适的铝单板规格尺寸</a>
                            </li>
                            <li class='listnews '><a href='../news/shownews.php?lang=cn&id=147' title='那个铝单板品牌市场占有率更高' target='_self'>那个铝单板品牌市场占有率更高</a>
                            </li>
                            <li class='listnews '><a href='../news/shownews.php?lang=cn&id=146' title='建筑装饰材料铝单板如何选择才好' target='_self'>建筑装饰材料铝单板如何选择才好</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<footer>
    <div class="inner">
        <div style="height:23px;"></div>
        <div class="foot-nav foot_dhl"><a href='../ldbmq/' 0 title='铝单板幕墙'>铝单板幕墙</a><span>|</span><a href='../sitemap/' title='网站地图'>网站地图</a><span>|</span><a href='../ldbdd/' title='铝单板吊顶'>铝单板吊顶</a><span>|</span><a href='../product/' title='瑞亿产品'>瑞亿产品</a><span>|</span><a href='../case/'
            title='成功案例'>成功案例</a><span>|</span><a href='../hzkh/' title='合作客户'>合作客户</a><span>|</span><a href='../news/' 0 title='瑞亿资讯'>瑞亿资讯</a><span>|</span><a href='../about/' title='关于瑞亿'>关于瑞亿</a><span>|</span><a href='../contact/' title='联系瑞亿'>联系瑞亿</a>
        </div>
        <div style="height:30px;"></div>
        <div class="foot_cont">
            <div class="foot_mid">
                <p>版权所有：佛山市南海瑞亿金属建材有限公司 备案号： <a style="color:#fff" href="http://www.miitbeian.gov.cn/" target="_blank">| 粤ICP备15065255号-2</a>地址：广东省佛山市南海区里水镇志高工业园
                    <br/>电话：0757-85620677 手机：18942452888
                    <script type="text/javascript">
                        var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
                        document.write(unescape("%3Cspan id='cnzz_stat_icon_1259026466'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1259026466%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));
                    </script>友情链接：<a href="http://www.ryldb.com/">铝单板品牌</a>|<a href="http://www.591sujiao.com">聚氨酯原料</a>|<a href="http://www.cdfkjf.com">成都减肥训练营</a>|<a href="http://www.beautyfawn.com">纹绣学校</a>|<a href="http://www.tvcfx.com">三维动画制作报价</a>|
                    <a
                    href="http://www.gyjylc.com">柱状活性炭</a>|<a href="http://www.jyfittings.com">不锈钢管件</a>|<a href="http://www.lmlfl.com" title="铝单板">柑橘黄化</a>|<a href="http://www.rxjr.net" title="铝单板价格">封签</a>|<a href="http://www.dlfj999.com" title="铝单板价格">排汽消声器</a>|</a>||<a href="http://www.hdqmh.com"
                        target="_blank">宝宝起名专家</a>|<a href="http://www.shuangsheng88.com">广州双盛废品回收</a>|<a href="http://www.yunhesaitu.com">中国建材市场网</a>|<a href="http://www.shpzzh.cn/">酒店装修</a>|<a href="http://www.htmet.com/ ">厨房设备</a>|<a href="http://www.fshxt.com/  ">恒讯通金属网</a>|
                        <a
                        href="http://www.snowystone.com/">石材</a>|
<a href="http://www.zjhjtx.com" target="_blank">电话光端机</a>|
<a href="http://www.xinlvauto.com/" target="_blank">接近开关</a>
                            |<a href="http://www.hlcmhb.com">新房除甲醛</a>|<a href="http://www.pzdlyx.com" target="_blank">银杏树产地</a>|<a href="http://www.csmjzs.com">长沙家装公司</a>|<a href="http://www.yscaiwu.com">杭州公司注册</a>|<a href="http://www.lygdianmo.com"
                            target="_blank">连云港装饰公司</a>|<a href="http://www.guantaipensha.com" target="_blank">喷砂机</a>|<a href="http://www.qdtysj.cn" target="_blank">热收缩套</a>|<a href="http://www.shuyukj.cn" target="_blank">急救模型</a>|<a href="http://www.lidamenchuangshebei.com"
                            target="_blank">塑钢门窗设备</a>|<a href="http://www.xapycw.cn" target="_blank">西安财务公司</a>|<a href="http://www.frcsb.com" target="_blank">全自动超声波清洗机</a>|<a href="http://www.weiwang.biz" target="_blank">球场围网</a>|<a href="http://www.zyrf.com.cn"
                            target="_blank">舞台音响设备</a>|<a href="http://www.apjingzao.com" target="_blank">镀锌钢格栅</a>|<a href="http://www.weiwang.biz" target="_blank">网球场围网</a>|<a href="http://www.gyjylc.com" target="_blank">柱状活性炭</a>
                            <script>
                                window._bd_share_config = {
                                    "common": {
                                        "bdSnsKey": {},
                                        "bdText": "",
                                        "bdMini": "2",
                                        "bdMiniList": false,
                                        "bdPic": "",
                                        "bdStyle": "0",
                                        "bdSize": "16"
                                    },
                                    "slide": {
                                        "type": "slide",
                                        "bdImg": "3",
                                        "bdPos": "right",
                                        "bdTop": "100"
                                    },
                                    "image": {
                                        "viewList": ["qzone", "tsina", "tqq", "renren", "weixin"],
                                        "viewText": "分享到：",
                                        "viewSize": "16"
                                    },
                                    "selectShare": {
                                        "bdContainerClass": null,
                                        "bdSelectMiniList": ["qzone", "tsina", "tqq", "renren", "weixin"]
                                    }
                                };
                                with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
                            </script>
                </p>
                <p>邮箱：616517982@QQ.com 网址：www.hnxryi.com <a style="color:#fff" href="http://www.fsryi.com" target="_blank">铝单板</a>|</p>
                <p>本公司专业提供：<a href="http://www.hnxryi.com" style="clolr: #fff"><span style="color: #ffffff">铝单板</span></a> 铝单板价格 铝单板厂家 铝单板安装 双曲铝单板 木纹铝单板 石纹铝单板 冲孔铝单板 雕刻铝单板 &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;技术支持：<a href="http://www.w1like.com" style="color: #fff"
                    target="_blank">唯艺互动</a>
                    <script>
                        var _hmt = _hmt || [];
                        (function() {
                            var hm = document.createElement("script");
                            hm.src = "https://hm.baidu.com/hm.js?142fd44f4a4b362b97690f12367441b0";
                            var s = document.getElementsByTagName("script")[0];
                            s.parentNode.insertBefore(hm, s);
                        })();
                    </script>
                </p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    </div>
</footer>
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?c4851fe9a0ce3c5e4f41383422d8eed0";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<script src="js/fun.inc.js" type="text/javascript"></script>
<script src="js/stat.js" type="text/javascript"></script>
<script src='js/online.js' type='text/javascript' id='metonlie_js'></script>
</body>

</html>