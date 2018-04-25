<?php
    include_once ("db/DbManage.php");
    $db = new DbManage();
header("Content-Type: text/html; charset=UTF-8");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>影片</title>
    <link rel="stylesheet" href="css/film.css">
    <script type="text/javascript" src="js/SearchCinema.js"></script>
    <script type="text/javascript" src="js/SearchPlan.js"></script>
    <script type="text/javascript" src="js/SearchTime.js"></script>

</head>
<body>
<div class="head-wrap">
    <div class="head-content center-wrap">
        <h1 class="logo">
            <a target="_top" href="#"></a>
        </h1>
        <div class="cityWrap">
            <a id="cityName" class="cityName" href="javascript:">
                <span class="name">杭州</span>
                <s class="tri"></s>
            </a>
        </div>
        <div class="nav-wrap">
            <ul class="nav">
                <li class="J_NavItem ">
                    <a href="#" target="_top">首页</a>
                </li>
                <li class="J_NavItem  current ">
                    <a href="#" target="_top">影片</a>
                </li>
                <li class="J_NavItem ">
                    <a href="#" target="_top">影院</a>
                </li>

            </ul>
        </div>
        <div class="entrance-wrap">
            <ul class="entrance">
                <li class="entrance-item">
                    <a class="phone  " href="#">手机购买</a>
                </li>
                <li class="entrance-item">
                    <a class="service" >客服咨询</a>
                </li>
            </ul>
        </div>
    </div>
</div>





<div class="detail-wrap J_detailWrap">
    <?php
    $film_id=1;
    $data="select * from movie_information where Film_id= $film_id";
    $result = $db->executeSqlTxt($data);
    $result = $db->executeSqlTxt($data);
    while($row=mysqli_fetch_array($result)){
        $film_name=$row["Film_name"];
        $director=$row["Director"];
        $actors = $row["Actors"];
        $type = $row["Type"];
        $country = $row["Country"];
        $language = $row["Language"];
        $long = $row["Long"];
        $date = $row["Date"];
        $story = $row["Story"];
        $src = $row["Image_path"];
}
?>
    <div class="detail-cont">
        <div class="center-wrap">
            <h3 class="cont-title"><?php echo $film_name?> <em class="score">9.0</em></h3>
            <div class="cont-pic">
               <?php echo" <img with=\"230\" heigh=\"300\" src= $src alt=\"\">"?>
            </div>
            <ul class="cont-info">
                <li>导演：<?php echo $director?></li>
                <li>主演：<?php echo $actors?></li>
                <li>类型：<?php echo $type?></li>
                <li>制片国家：<?php echo  $country?></li>
                <li>语言：<?php echo $language?></li>
                <li>片长：<?php echo $long?>分钟</li>
                <li>上映时间：<?php echo $date?></li>
                <li class="J_shrink shrink">剧情介绍：<?php echo $story?><a class="shrink-btn" href="javascript:;">展开&gt;&gt;</a></li>
            </ul>
        </div>
    </div>
</div>


<div class="title-wrap">
    <div class="center-wrap">
        <h3>选座购票</h3>
    </div>
</div>






<div class="schedule-wrap J_scheduleWrap schedule-loaded">


    <!-- Filter -->
    <div class="filter-wrap">
        <div class="center-wrap">
            <ul class="filter-select">
                <li>
                    <label>选择区域</label>
                    <div class="select-tags" >
                        <a class="current" id="arealist" href="javascript:;" onclick="ChooseArea(this)" >全部区域</a>
                        <?php

                        $sqlTxt = "select * from area";
                        $result = $db->executeSqlTxt($sqlTxt);
                        $i = 1;
                        while($row = mysqli_fetch_array($result)){

                         ?>

                        <a href="javascript:;"  name="arealist2" onclick="ChooseArea(this)"><?php echo $row[1] ?></a>
                            <!--javascript:searchCinema(arealist.innerText)-->
                        <?php } ?>
                        <!--<a class="J_show select-show" href="javascript:;">更多&gt;</a>-->
                    </div>

                </li>

                <li>
                    <label>选择影城</label>
                    <div id="CinemaShow">
                        <div class="select-tags">
                            <?php
                            $sqlTxt = "select * from cinema";
                            $result = $db->executeSqlTxt($sqlTxt);
                            $row = mysqli_fetch_array($result);
                            ?>
                            <a class="current" id="cinemalist" href="javascript:;" onclick="ChooseCinema(this)"><?php echo $row[2] ?></a>
                            <?php
                            while($row = mysqli_fetch_array($result)){

                                ?>
                                <a href="javascript:;"  name="cinemalist2" onclick="ChooseCinema(this)"><?php echo $row[2] ?></a>
                                <?php
                            }
                            ?>

                        </div>
                        <!--<a class="J_show select-show" href="javascript:;">更多&gt;</a>-->
                        <!--<a class="J_show select-show ">该地区暂无影城</a>-->
                    </div>

                </li>


                <li>
                    <label>选择时间</label>
                    <div class="select-tags">
                        <a class="current" id="timelist" href="javascript:;" onclick="ChooseTime(this,1)"><?php echo  date("m")."月".date("d")."日"; ?>（今天）</a>
                        <a href="javascript:;" name="timelist2" onclick="ChooseTime(this,2)"><?php $d=strtotime("tomorrow");echo  date("m",$d)."月".date("d",$d)."日";?></a>
                        <a href="javascript:;" name="timelist2" onclick="ChooseTime(this,3)"><?php $d=strtotime("+2 Days");echo  date("m",$d)."月".date("d",$d)."日";?></a>
                    </div>
                </li>
            </ul>
        </div>
    </div>


    <!-- Cinema bar -->
    <div class="center-wrap cinemabar-wrap" id="CinemaInfoShow">
        <?php
        $sqlTxt = "select * from cinema";
        $result = $db->executeSqlTxt($sqlTxt);
        $row = mysqli_fetch_array($result);
        ?>

        <h4 id="CinemaName"><?php echo $row[2] ?></h4>
        <?php echo $row[3] ?>
        <a href="#">[地图]</a>
        <?php echo $row[4] ?>
        <a class="more" href="#">查看影院详情&nbsp;&gt;</a>
    </div>


    <!-- Hall Tabel -->
    <div class="center-wrap">
        <table class="hall-table"  id="PlanShow">
            <thead>
            <tr>
                <th class="hall-time">放映时间</th>
                <th class="hall-type">语言版本</th>
                <th class="hall-name">放映厅</th>
                <th class="hall-flow">座位情况</th>
                <th class="hall-price">现价/影院价（元）</th>
                <th class="hall-buy">选座购票</th>
            </tr>
            </thead>
            <tbody>

           <!-- <tr>
                <td class="hall-time">
                    <em class="bold">15:30</em>
                    预计17:50散场
                </td>
                <td class="hall-type">
                    原版 3D
                </td>
                <td class="hall-name">
                    1号厅（4D）
                </td>
                <td class="hall-flow">
                    <div class="flowing-wrap flowing-loose">
                        <label> 宽松  </label>
                        <span class="flowing-vol"><i style="width:0.0%"></i></span>
                        <span class="flowing-view J_flowingView"><i class="icon-zoom"></i></span>
                    </div>
                </td>
                <td class="hall-price" data-partcode="dingxinnew">
                    <em class="now">33.00</em>
                    <del class="old">80.00</del>
                </td>
                <td class="hall-seat">
                    <a class="seat-btn" href="#">选座购票</a>
                </td>
            </tr>

            <tr class="even">
                <td class="hall-time">
                    <em class="bold">16:20</em>
                    预计18:40散场
                </td>
                <td class="hall-type">
                    原版 3D
                </td>
                <td class="hall-name">
                    7号厅（全景声）
                </td>

                <td class="hall-flow">
                    <div class="flowing-wrap flowing-loose">
                        <label> 宽松  </label>
                        <span class="flowing-vol"><i style="width:0.0%"></i></span>
                        <span class="flowing-view J_flowingView"><i class="icon-zoom"></i></span>
                    </div>
                </td>

                <td class="hall-price" data-partcode="dingxinnew">
                    <em class="now">35.00</em>
                    <del class="old">70.00</del>
                </td>
                <td class="hall-seat">
                    <a class="seat-btn" href="#">选座购票</a>
                </td>
            </tr>
-->


            <!-- ----------------------------------------------------------------------------------------------------------------------------------------------- -->

            <tr>

                <td class="hall-type" colspan="6">
                    <div class="error-wrap">
                        囧 ~没有找到你需要的排期，你可以查看
                        <a>其他影院</a>
                        或者
                        <a>其他影片</a>
                    </div>

                </td>

            </tr>

            <!-- ----------------------------------------------------------------------------------------------------------------------------------------------- -->
            </tbody>
        </table>
    </div>

</div>





<div class="footer" style="margin-top:0px">
    <div class="footWrap">
        <div class="footMiddle">
            <div class="footLogo">
                <a href="#"><img src="//gw.alicdn.com/tps/i1/TB1JUFIJVXXXXXUXXXXJxQf.VXX-134-40.png"></a>
                <span>客服热线</span>
                <span>0571-88157838</span>
            </div>
            <dl>
                <dt>选座购票流程</dt>
                <dd><a target="_blank" title="选择影片和场次">选择影片和场次</a></dd>
                <dd><a target="_blank" title="选择中意的座位">选择中意的座位</a></dd>
                <dd><a target="_blank" title="支付并收到取票短信">支付并收到取票短信</a></dd>
            </dl>
            <dl>
                <dt>取票流程</dt>
                <dd><a target="_blank" title="收到取票短信">收到取票短信</a></dd>
                <dd><a target="_blank" title="影院自助取票">影院自助取票</a></dd>
                <dd><a target="_blank" title="短信重发方式">短信重发方式</a></dd>
            </dl>
            <dl>
                <dt>常见问题</dt>
                <dd><a target="_blank" title="是否支持退换票">是否支持退换票</a></dd>
                <dd><a target="_blank" title="填错手机号怎么办">填错手机号怎么办</a></dd>
                <dd><a target="_blank" title="更多问题>>">更多问题&gt;&gt;</a></dd>
            </dl>
            <dl>
                <dt>协议规范</dt>
                <dd><a target="_blank" title="用户服务协议">用户服务协议</a></dd>
                <dd><a target="_blank" title="食品管理规范">食品管理规范</a></dd>
                <dd><a target="_blank" title="隐私权政策">隐私权政策</a></dd>
            </dl>
            <div class="order-code" style="background-image:url(//img.alicdn.com/tps/TB1OxfBKXXXXXbXXpXXXXXXXXXX-76-240.png);"></div>
        </div>
        <div class="footBottom">
            <img class="img" src="//img.alicdn.com/tps/i2/T1Vt8KFiRhXXXOFx6f-39-60.png">
            <div class="footer-ali">
                <a>阿里巴巴集团</a>
                <b>|</b>
                <a>阿里巴巴国际站</a>
                <b>|</b>
                <a>阿里巴巴中国站</a>
                <b>|</b>
                <a>全球速卖通</a>
                <b>|</b>
                <a>淘宝网</a>
                <b>|</b>
                <a>天猫</a>
                <b>|</b>
                <a>聚划算</a>
                <b>|</b>
                <a>一淘</a>
                <b>|</b>
                <a>阿里妈妈</a>
                <b>|</b>
                <a>阿里云计算</a>
                <b>|</b>
                <a>云OS</a>
                <b>|</b>
                <a>万网</a>
                <b>|</b>
                <a>中国雅虎</a>
                <b>|</b>
                <a>支付宝</a>
            </div>
            <div class="foot-nav">
                <a>关于淘宝</a>
                <a>合作伙伴</a>
                <a>营销中心</a>
                <a>联系客服</a>
                <a>开放平台</a>
                <a>诚征英才</a>
                <a>联系我们</a>
                <a>网站地图</a>
                <a>法律声明</a>
                <span>© 2017 Taopiaopiao.com 版权所有</span>
                <br>增值电信业务经营许可证：沪B2-20170117 沪ICP备16050036号-1 <a target="_blank" title="营业执照"> 营业执照</a>
            </div>
        </div>
    </div>
</div>



</body>
</html>