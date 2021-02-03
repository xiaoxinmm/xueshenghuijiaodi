<?php
header('Content-type:text/html; charset=utf-8');
// 开启Session
session_start();
//判断是否有管理员用户登录
if (isset($_SESSION['xsk']) == 1){
    include("../admin/mysql.php");//引入变量
    $a = date('Ymd');//获取今天的时间
    //排空错误
    if(empty($_GET['id'])){
        die('id is empty');
    }
    //连接数据库
    $con = new mysqli($servername, $username, $password, $dbname);
     
    $id=intval($_GET['id']);
     
    //删除指定数据
    mysqli_query($con,"DELETE FROM `{$a}` WHERE id=$id");
    //排错并返回页面
    if(mysqli_error($con)){
        echo mysqli_error($con);
    }else{
        header("Location:audittablol.php");
    }
}else{
    echo "<h1>非法请求<h1>";
}
// 优化建议可以弄成一个函数 以后再说吧
?>


