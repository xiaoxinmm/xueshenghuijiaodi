
<!DOCTYPE html>
<html lang="zh-CN">
<head>
		<meta charset="utf-8">
		<title> 威海机械工程高级技工学校交底系统</title>
		<style>
		
        input[type=button] {
        border-radius: 9px;
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        }
</style>
	</head>
<body>
	<h2>感谢你对学校的贡献</h2>
    <?php
        $a = date('Ymd');//获取今天的时间
        $tomorrow  = date('Y-m-d',strtotime("-1 day"));//获取前天的时间
        if($a==$tomorrow){ 
        
            echo '时间错误保留违纪信息并上报学生科'; 
        
        }else{ 
        
            echo '判定成功进行下一步<br>'; 
        
            include("mysql.php");//引入变量
            header("Content-Type: text/html;charset=utf-8");//设置编码
            
            // 此时需要连接到数据库db1下，第四个参数是数据库名
            
            $con = new mysqli($servername, $username, $password, $dbname);
            $con->query("SET NAMES utf8");
            // 创建数据表 $a
            $sql = "CREATE TABLE `{$a}` ( 
                id INT UNSIGNED AUTO_INCREMENT,
                gettime varchar(255),
                sushe varchar(255),
                xingming varchar(255),
                banji varchar(255),
                shijian varchar(255),
                txt1 varchar(255),
                bu varchar(255),
                txt2 varchar(255),
                img1 varchar(255),
                PRIMARY KEY (id) 
            )ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";
            
            if ($con->query($sql) == true) {
                    echo "数据表 $a 创建成功！<br>";
                } else {
                    echo "创建失败 $a  表！或者已存在<br>";
                }
            
            $con->close();
            #预先截取后缀
            //$type2 = strrchr($image['name'], ".");
            //获取表单提交的数据
            ///$null1 = "|";
            $contents1 = $_POST['getTime'];
            $contents7 = $_POST['sushe'];
            $contents2 = $_POST['name'];
            $contents3 = strip_tags($_POST['banji']);
            $contents4 = $_POST['time'];
            $contents5 = strip_tags($_POST['txt1']); //这里过滤条件 过滤标签
            $contents8 = $_POST['bu'];
            $contents6 = strip_tags($_POST['txt2']); //这里过滤条件 过滤标签
            $image = $_FILES['xiongka'];
            //打印表单内容
            echo "$contents1 <br>"; //自动获取的时间
            echo "宿舍：$contents7 <br>"; //宿舍号
            echo "姓名：$contents2 <br>"; //姓名
            echo "班级：$contents3 <br>"; //班级
            echo "时间：$contents4 <br>"; //时间
            echo "违纪原因：$contents5 <br>" ; //违纪原因
            echo "部门：$contents8 <br>"; //部门
            echo "执勤人：$contents6 <br>"; //执勤人
            
            
            //下面是过滤系统 白名单 变量在数据库mysql.php哪里 1 和 2 已经设置为空了
            if(strstr($contents2,$bai1)){
                
            }
            elseif (strstr($contents2,$bai2)) {
            // code...
            }
            /*
            elseif (strstr($contents2,"$bai3")) {
                // code..
            }
            elseif (strstr($contents2,"$bai4")) {
                // code..
            }
            elseif (strstr($contents2,"$bai5")) {
                // code..
            }
            
            elseif (strstr($contents2,"$bai6")) {
                // code..
            }
            elseif (strstr($contents2,"$bai7")) {
                // code..
            }
            elseif (strstr($contents2,"$bai8")) {
                // code..
            }
            elseif (strstr($contents2,"$bai9")) {
                // code..
            }
            elseif (strstr($contents2,"$bai10")) {
                // code..
            }
            */
            else {
            // code...
            // code...
                //自己获取还是用交底时刻的时间
                //$up_name=date("Ymdhis").$ext;   //Ymdhis年月日时分秒
                $type = strrchr($image['name'], ".");//截取后缀名称
                //echo $type
                $up_name=$contents1.$type;   //定义时间 和后缀
                
                $path_in_folder = 'images/'.$up_name;  //注意这里的变量 这是设置目录注意
                
                move_uploaded_file($image['tmp_name'],$path_in_folder); // 移动目录
                //$type = strrchr($image['name'], ".") //判断后缀格式
                //$_FILES[字段名][tmp_name]保存的是文件上传到服务器临时文件夹之后的文件名
                //move_uploaded_file(规定要移动的文件，规定文件的新位置)函数将上传的文件移动到新的位置
                
                
                //if (strtolower($type) == '.png' || strtolower($type) == '.jpg' || strtolower($type) == '.bmp' || strtolower($type) == '.gif') {
                //将图片文件移到该目录下
                //    move_uploaded_file($image['tmp_name'],$path_in_folder);
                //}
                
                // 获得sql的连接
                
                
                
                
                
                //这里采用本地还是引入其他页面变量
                
                
                /*
                $servername = "sh-cynosdbmysql-grp-ps5qhet6.sql.tencentcdb.com:27790";
                $username = "root";
                $password = "chenyuluoyan1.";
                */
                
                
                
                
                
                
                
                $con = new mysqli($servername, $username, $password);
                $con->query("SET NAMES utf8");// 采用utf-8编码方式连接
                if ($con->connect_error) {
                    echo "\r连接失败: " . $con->connect_error . "<br>";
                } else {
                    echo "<br>";
                    echo "<br>";
                    echo "<br>";
                    echo "\r连接成功<br>";
                }
                // 此时需要连接到数据库db1下，第四个参数是数据库名
                $dbname = "db1";
                
                $con = new mysqli($servername, $username, $password, $dbname);
                $con->query("SET NAMES utf8");//定义用utf8作为连接编码
                // 因为已经连接到db1下，可以复用这个con对象，这里添加数据字段
                
                    
                //$sql = "INSERT INTO table1 (number, name) VALUES ('114515', 'XiaoXinMaZiLi')";
                //$sql = "INSERT INTO table0 (id, gettime, sushe, xingming, banji, shijian, txt1, txt2) VALUES (null,'$contents1', '$conten,'$contents2', '$contents3', '$contents4', '$contents5', '$contents6');";
                $sql = "INSERT INTO `{$a}` VALUES (NULL,'$contents1', '$contents7','$contents2', '$contents3', '$contents4', '$contents5', '$contents8', '$contents6', '$path_in_folder');";
                //$sql = "INSERT INTO table2 (gettime, xingming, banji, shijian, txt1, txt2) VALUES ('text', 'text', 'text', 'text', 'text','text')";
                
                if($con->query($sql) == true) {
                    echo "数据发送成功！<br>";
                    
                } else {
                    echo "插入数据失败！<br>" ;
                }
                $con->close();  //取消连接
            }
        }
    ?>
<input type = "button" name = "button1" value = "返回" onclick = "javascript:history.back(-1);">
</body>
</html>