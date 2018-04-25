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

$sqlTxt = "select * from cinema WHERE Cinema_name = '".$key."'";

/*echo $sqlTxt;*/
$result = $db->executeSqlTxt($sqlTxt);
$row = mysqli_fetch_array($result);

echo "<h4 id=\"CinemaName\">$row[2]</h4>";
echo "$row[3]";
echo "<a href=\"#\">[地图]</a>";
echo "$row[4]";
echo "<a class=\"more\" href=\"#\">查看影院详情&nbsp;&gt;</a>";



?>







