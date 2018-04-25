<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2018/4/15
 * Time: 19:58
 */

include_once("db/DbManage.php");
$db = new DbManage();
$key = trim($_POST["key"]);
$key_arr = explode("#",$key);

$date = date("Y-m-d");
if($key_arr[0]==2){

    $d=strtotime("tomorrow");
    $date = date("Y-m-d",$d);
}else if($key_arr[0]==3){
    $d=strtotime("+2 Days");
    $date = date("Y-m-d",$d);
}
//echo $date;

$sqlTxt = "select * from cinema WHERE Cinema_name = '".$key_arr[1]."'";

/*echo $sqlTxt;*/
$result = $db->executeSqlTxt($sqlTxt);
$row1 = mysqli_fetch_array($result);

//echo $row[0];

echo " <thead>
            <tr>
                <th class=\"hall-time\">放映时间</th>
                <th class=\"hall-type\">语言版本</th>
                <th class=\"hall-name\">放映厅</th>
                <th class=\"hall-flow\">座位情况</th>
                <th class=\"hall-price\">现价/影院价（元）</th>
                <th class=\"hall-buy\">选座购票</th>
            </tr>
            </thead>
            <tbody>";

$sqlTxt = "select * from plan WHERE Cinema_id = '".$row1[0]."'and Plan_day = '".$date."'";
//
//echo $sqlTxt;
$result = $db->executeSqlTxt($sqlTxt);
$color = 0;
if(!$row3 = mysqli_fetch_array($result)){
    echo "<tr>

                <td class=\"hall-type\" colspan=\"6\">
                    <div class=\"error-wrap\">
                        囧 ~没有找到你需要的排期，你可以查看
                        <a>其他影院</a>
                        或者
                        <a>其他影片</a>
                    </div>

                </td>

            </tr>";
}else{
    do{
        echo "<tr ";
        if($color%2==0){
            echo "class=\"even\"";
            $color += 1;
        }else{
            $color += 1;
        }
        echo ">
                <td class=\"hall-time\">
                    <em class=\"bold\">".$row3[2]."</em>
                    预计17:50散场
                </td>
                <td class=\"hall-type\">"
            .$row3[6]."
                </td>
                <td class=\"hall-name\">
                    1号厅（4D）
                </td>
                <td class=\"hall-flow\">
                    <div class=\"flowing-wrap flowing-loose\">
                        <label> 宽松  </label>
                        <span class=\"flowing-vol\"><i style=\"width:0.0%\"></i></span>
                        <span class=\"flowing-view J_flowingView\"><i class=\"icon-zoom\"></i></span>
                    </div>
                </td>
                <td class=\"hall-price\" data-partcode=\"dingxinnew\">
                    <em class=\"now\">".$row3[7]."</em>
                    <del class=\"old\">80.00</del>
                </td>
                <td class=\"hall-seat\">
                    <a class=\"seat-btn\" href=\"#\">选座购票</a>
                </td>
            </tr>";
    }while($row3 = mysqli_fetch_array($result));
}





//echo "aaaaa".$row3[0];


