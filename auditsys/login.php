<?php
header('Content-type:text/html; charset=utf-8');
// 开启Session
session_start();
if (isset($_COOKIE['username'])) {
  # 若记住了用户信息,则直接传给Session
  $_SESSION['username'] = $_COOKIE['username'];
  $_SESSION['xsk'] = 1;
}
if (isset($_SESSION['xsk']) ==1){
  header('location:./audittablol.php');
}else{
  $html = '
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <link rel="stylesheet" href="../css/stylei.css" />
    <title>学生科审查登录~！</title>
  </head>
  <body>
    <div class="container">
        <form action="loginw.php" method="post" class="login-form">
            <h2>学生科审查登录</h2>
            <input type="text" name="username" placeholder="用户名">
            <input type="password" name="password" placeholder="密码">
            <button type="submit" name="login">登录</button>
        </div>
        </form>
      </div>
    </div>
  </body>
</html>';
echo $html;
}

?>