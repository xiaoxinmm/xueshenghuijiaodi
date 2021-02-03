<?php
    include("./admin/mysql.php");//引入变量
    header("Content-Type: text/html;charset=utf-8");
    // 根据ip获得sql的连接
    //数据库地址如下请自行更改
    
    
    //以下是本地变量这里调用Mysql.php里面的变量做到一个隐形
    /*
    $servername = "sh-cynosdbmysql-grp-ps5qhet6.sql.tencentcdb.com:27790";      
    $username = "root";
    $password = "chenyuluoyan1.";
    */
    $con = new mysqli($servername, $username, $password);
    $con->query("SET NAMES utf8");
    if ($con->connect_error) {
        echo "连接失败: " . $con->connect_error . "<br>";
    } else {
        echo "连接成功<br>";
        }
    // 创建数据库 db1
    $sql = "CREATE DATABASE db1";
    if($con->query($sql) == true) {
        echo "数据库 db1 创建成功！<br>";
    } else {
        echo "创建失败   库！<br>";
        echo "建议删除install目录<br>";
    }
    $con->close();  //关闭连接数据库
?>