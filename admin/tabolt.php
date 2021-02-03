<?php

$page_title="学校违纪公示系统";
echo"<title>$page_title</title>";

$abtime = date('Y-m-d-s');
$abtimey = date('Y-m-d');
//echo "系统当前时间戳为：";
//echo "";
//echo "$abtime";
//echo "（20秒一刷新）可自行刷新。";
//echo "<br>";
//<!--JS 页面自动刷新 -->
echo ("<script type=\"text/javascript\">");
echo ("function fresh_page()"); 
echo ("{");
echo ("window.location.reload();");
echo ("}"); 
echo ("setTimeout('fresh_page()',20000);"); //20秒刷新一下
echo ("</script>");

//引入变量
include("./mysql.php");

/*
$dbhost = 'localhost';  // mysql服务器主机地址
$dbuser = 'root';            // mysql用户名
$dbpass = '123456';          // mysql用户名密码
*/




$conn = mysqli_connect($servername, $username, $password);
if(! $conn )
{
    die('连接失败: ' . mysqli_error($conn));
}
// 设置编码，防止中文乱码
mysqli_query($conn , "set names utf8");
 
$a = date('Ymd');

$sql = "SELECT id, gettime, 
        sushe, xingming, banji, shijian,txt1, bu,txt2, img1
        FROM `{$a}` ";
 
mysqli_select_db( $conn, 'db1' );
$retval = mysqli_query( $conn, $sql );
if(! $retval )
{
    die('无法读取数据: ' . mysqli_error($conn));
}

echo 
    "<table width='100%' border='0' cellspacing='0' cellpadding='0'align='center'>
    <tr>
    <td align='center' class='biaoti' height='60' style = 'font-family: 微软雅黑;font-size: 26px;font-weight: bold;border-bottom:1px dashed #CCCCCC;color: #026ccf;margin-top: 13px;'>今日违纪一览表</td>
    </tr>
    <tr>
    <td align='center'> 各位老师同学如果有争议可以联系学生科，真实结果以学生科通告为准</td>
    </tr>
    <tr>
    <td align='right' height='25'>当前时间：{$abtimey}</td>
    </tr>
    </table>";


echo '<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#c1c1c1"  class="tabtop13" align="center">  
<tr>
<td style = "background-color:#ffffff;height:25px;line-height:150%;">ID</td>
<td style = "background-color:#8bc2f5;height:25px;line-height:150%;">发送时间</td>
<td style = "background-color:#ffffff;height:25px;line-height:150%;">宿舍号</td>
<td style = "background-color:#8bc2f5;height:25px;line-height:150%;">姓名</td>
<td style = "background-color:#ffffff;height:25px;line-height:150%;">班级</td>
<td style = "background-color:#8bc2f5;height:25px;line-height:150%;">时间</td>
<td style = "background-color:#ffffff;height:25px;line-height:150%;">违纪原因</td>
<td style = "background-color:#8bc2f5;height:25px;line-height:150%;">部门</td>
<!--<td style = "background-color:#ffffff;height:25px;line-height:150%;">执勤人</td>-->
<!--<td style = "background-color:#8bc2f5;height:25px;line-height:150%;">图片源地址（后面带格式的是有照片不带则否！）</td>-->
<td style = "background-color:#ffffff;height:25px;line-height:150%;">学生科审核</td>
</tr>';

while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
{   

    echo 
         "<tr><td style = 'background-color:#ffffff;'> {$row['id']}</td> ".
         "<td style = 'background-color:#ffffff;'>{$row['gettime']} </td> ".
         "<td style = 'background-color:#ffffff;'>{$row['sushe']} </td> ".
         "<td style = 'background-color:#ffffff;'>{$row['xingming']} </td> ".
         "<td style = 'background-color:#ffffff;'>{$row['banji']} </td> ".
         "<td style = 'background-color:#ffffff;'>{$row['shijian']} </td> ".
         "<td style = 'background-color:#ffffff;'>{$row['txt1']} </td> ".
         "<td style = 'background-color:#ffffff;'>{$row['bu']} </td> ".
         //"<td style = 'background-color:#ffffff;'>{$row['txt2']} </td> ".
         //"<td style = 'background-color:#ffffff;'>{$row['img1']} </td> ".
         "</tr>";
}
echo '</table>';
mysqli_close($conn);

?>
