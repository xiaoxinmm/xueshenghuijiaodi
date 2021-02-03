<?php 
	header('Content-type:text/html; charset=utf-8');
	// 开启Session
    session_start();
    
    // 下面是数据库处理方案
    $usernameu = trim($_POST['username']);
	$passwordu = md5(trim($_POST['password']),FALSE);
    include("./admin/mysql.php");//引入变量
    
    $con = new mysqli($servername, $username, $password,$dbname);
    $con->query("SET NAMES utf8");
    $sqll = "select * from user where name='{$usernameu}' and password='{$passwordu}';";
    $retval = mysqli_query($con, $sqll);
	
	// 处理用户登录信息
	if (isset($_POST['login'])) {
		# 接收用户的登录信息
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		// 判断提交的登录信息
		if (($username == '') || ($password == '')) {
			// 若为空,视为未填写,提示错误,并3秒后返回登录界面
			header('refresh:3; url=login.php');
			echo "用户名或密码不能为空,系统将在3秒后跳转到登录界面,请重新填写登录信息!";
			
			exit;
		} elseif (mysqli_num_rows($retval)==1) {
			# 用户名和密码都正确,将用户信息存到Session中
			$_SESSION['username'] = $username;
            $_SESSION['islogin'] = 1;   //这里没有许可哦
			$con->close();//取消连接
			// 处理完附加项后跳转到登录成功的首页
			header('location:indexs.php');
		}else{
            # 用户名或密码错误,同空的处理方式
			header('refresh:4; url=login.php');
            echo "用户名或密码错误,系统将在4秒后跳转到登录界面,请重新填写登录信息!";
            echo "<br>";
            echo "或者不存在这个账户,请联系管理员添加！1925950172 二楼值班室!";
			exit;
        }
		
	}else{
		echo"<h2>其他错误</2>";
		echo"<h2>联系管理员1925950172</2>";
	}
 ?>