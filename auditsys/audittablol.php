<?php
header('Content-type:text/html; charset=utf-8');
// 开启Session
session_start();


if (isset($_SESSION['xsk']) == 1) {


$page_title="查底监控系统";
echo"<title>$page_title</title>";

//$abtime = date('Y-m-d-s');
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
include("../admin/mysql.php");

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
echo'
<head>
<title>Bootstrap 实例</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
    ';
echo 
    "<table width='100%' border='0' cellspacing='0' cellpadding='0'align='center'>
    <tr>
    <td align='center' class='biaoti' height='60' style = 'font-family: 微软雅黑;font-size: 26px;font-weight: bold;border-bottom:1px dashed #CCCCCC;color: #026ccf;margin-top: 13px;'>学生科审查表</td>
    </tr>
    <tr>
    </tr>
    <tr>
    <td align='right' height='25'>当前时间：{$abtimey}</td>
    </tr>
    </table>";


echo '<table align="center" width="100%" border="1" cellpadding="3" cellspacing="1" bgcolor="#c1c1c1"  class="tabtop13" align="center">  
<tr>
<td style = "background-color:#ffffff;height:25px;line-height:150%;">ID</td>
<td style = "background-color:#8bc2f5;height:25px;line-height:150%;">发送时间</td>
<td style = "background-color:#ffffff;height:25px;line-height:150%;">宿舍号</td>
<td style = "background-color:#8bc2f5;height:25px;line-height:150%;">姓名</td>
<td style = "background-color:#ffffff;height:25px;line-height:150%;">班级</td>
<td style = "background-color:#8bc2f5;height:25px;line-height:150%;">时间</td>
<td style = "background-color:#ffffff;height:25px;line-height:150%;">违纪原因</td>
<td style = "background-color:#8bc2f5;height:25px;line-height:150%;">部门</td>
<td style = "background-color:#ffffff;height:25px;line-height:150%;">执勤人</td>
<td style = "background-color:#8bc2f5;height:25px;line-height:150%;">图片源地址（后面带格式的是有照片不带则否！）</td>
<td style = "background-color:#ffffff;height:25px;line-height:150%;">操作</td>
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
         "<td style = 'background-color:#ffffff;'>{$row['txt2']} </td> ".
         "<td style = 'background-color:#ffffff;'>{$row['img1']} </td> ".
         "<td><a align='center' href='deleteuser.php?id={$row['id']}'>删除</a></td>".
         "<td><a align='center' href='ftp://192.168.0.7:2121/admin/{$row['img1']}'>查看图片</a></td>";
         "</tr>";
}
echo '</table>';
mysqli_close($conn);
}else{
    echo"<h1>你没有权限进入审查系统<h1>";
}
?>