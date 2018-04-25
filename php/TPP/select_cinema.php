<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/4/15
 * Time: 16:31
 */

include_once("db/DbManage.php");
$db = new DbManage();
$key = trim($_POST["key"]);

if($key == "全部区域"){
    $sqlTxt = "select * from cinema ";
    $result = $db->executeSqlTxt($sqlTxt);
    $row = mysqli_fetch_array($result);
    echo "<div class=\"select-tags\">";

    echo "<a class=\"current\" href=\"javascript:;\" id=\"cinemalist\" onclick=\"ChooseCinema(this)\">". $row[2] ."</a>";
    while($row = mysqli_fetch_array($result)){
        echo " <a href=\"javascript:;\" name=\"cinemalist2\" onclick=\"ChooseCinema(this)\">".$row[2]. "</a>";

    }
    echo "</div>";
}else{
    $sqlTxt = "select * from area WHERE Area_name = '".$key."'";
    /*echo $sqlTxt;*/
    $result = $db->executeSqlTxt($sqlTxt);
    $row = mysqli_fetch_array($result);

    $sqlTxt = "select * from cinema WHERE Area_id = '".$row[0]."'";
    /*echo $sqlTxt;*/
    $result = $db->executeSqlTxt($sqlTxt);
    if($row = mysqli_fetch_array($result)){
        echo "<div class=\"select-tags\">";

        echo "<a class=\"current\" href=\"javascript:;\" id=\"cinemalist\" onclick=\"ChooseCinema(this)\">". $row[2] ."</a>";
        while($row = mysqli_fetch_array($result)){
            echo " <a href=\"javascript:;\" name=\"cinemalist2\" onclick=\"ChooseCinema(this)\">".$row[2]. "</a>";

        }
        echo "</div>";
        /*echo "<a class=\"J_show select-show\" href=\"javascript:;\">更多&gt;</a>";*/
    }else{
        echo "<a class=\"J_show select-show \">该地区暂无影城</a>";
    }
}




?>