<?php
	header('Content-type:text/html; charset=utf-8');
	// 开启Session
	session_start();
	// 首先判断Cookie是否有记住了用户信息
	if (isset($_COOKIE['username'])) {
		# 若记住了用户信息,则直接传给Session
		$_SESSION['username'] = $_COOKIE['username'];
    $_SESSION['islogin'] = 1;
    $cookiename = $_SESSION['username'];
	}
	if (isset($_SESSION['islogin']) == 1) {
		// 若已经登录
    echo "你好! ".$_SESSION['username'].' ,欢迎!';
    //echo "您已累计为学生会贡献"+$jisum+"次违纪记录，感谢你的贡献。";
    //echo "<br>";
    echo "<a href='logout.php'>注销</a>";
    $ser = '
            <html>
              <head>
                <meta charset="utf-8">
                <title> 威海机械工程高级技工学校交底系统</title>
                
                <style>
                * {
                  box-sizing: border-box;
                }
                
                input[type=text], select, textarea {
                  width: 100%;
                  padding: 12px;
                  border: 1px solid #ccc;
                  border-radius: 4px;
                  resize: vertical;
                }
                
                label {
                  padding: 12px 12px 12px 0;
                  display: inline-block;
                }
                
                input[type=submit] {
                  background-color: #4CAF50;
                  color: white;
                  padding: 12px 20px;
                  border: none;
                  border-radius: 4px;
                  cursor: pointer;
                  float: right;
                }
                
                input[type=submit]:hover {
                  background-color: #45a049;
                }
                
                .container {
                  border-radius: 5px;
                  background-color: #f2f2f2;
                  padding: 20px;
                }
                
                .col-25 {
                  float: left;
                  width: 25%;
                  margin-top: 6px;
                }
                
                .col-75 {
                  float: left;
                  width: 75%;
                  margin-top: 6px;
                }
                
                /* 清除浮动 */
                .row:after {
                  content: "";
                  display: table;
                  clear: both;
                }
                
                /* 响应式布局 layout - 在屏幕宽度小于 600px 时， 设置为上下堆叠元素 */
                @media screen and (max-width: 600px) {
                  .col-25, .col-75, input[type=submit] {
                    width: 100%;
                    margin-top: 0;
                  }
                }
                
                </style>
              </head>
              <!-- 页面自适应代码 -->
              <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
              <body>
                <form action="./admin/api.php" method="post" enctype="multipart/form-data"  >
                    <fieldset>
                      <legend>校内违纪通用资料上报</legend>
                      <!-- 以下是自动获取当前时间 -->
                      <script>
                      window.onload = function(){
                      function getDate(){
                      debugger;
                      var today = new Date();
                      var date;
                      date = (today.getFullYear()) +"-" + (today.getMonth() + 1 ) + "-" + today.getDate() + "-" + today.toLocaleTimeString();
                      return date;
                      }
                      window.setInterval(function(){
                      document.getElementById("getBookTime").value=getDate();
                      }, 1000);
                      }
                      </script>
                      
                      <p>抓底时间:<input type="text" readonly="readonly" name="getTime" id="getBookTime" value=""></p>
                      <!-- 以上是自动获取当前时间 -->
                        <p>宿舍: <input type="text" name="sushe" maxlength="4" ></p>
                        <p>姓名: <input type="text" name="name" maxlength="4"></p>
                        <p>班级: <input type="text" name="banji" maxlength="10"></p>
                        <p>胸卡: <input type="file" id="image" name="xiongka"></p>
                        <p><label for="time">时间：</label>
                          <select id="time" name="time">
                              <option value="早操">早操</option>
                              <option value="课间操">课间操</option>
                                <option value="上午">上午</option>
                                <option value="中午">中午</option>
                              <option value="午休">午休</option>
                                <option value="下午">下午</option>
                                <option value="晚休">晚休</option>
                          <option value="晚自习">晚自习</option>
                          </select> 
                        </p>
                        <p>违纪原因:</p>
                        <p><textarea cols="45" rows="10" id="txt1" required="required" placeholder="违纪原因（必填选项）:" name="txt1"></textarea></p>
                        
                        <p><label for="bu">部门：</label>
                          <select id="bu" name="bu">
                              <option value="纪检部">纪检部</option>
                              <option value="体育部">体育部</option>
                                <option value="学习部">学习部</option>
                                <option value="卫生部">卫生部</option>
                                <option value="学生科">学生科</option>
                            </select>
                        <p>执勤人:</p>
                        <p><textarea cols="45" rows="10" id="txt2" placeholder="执勤人（必填选项）:" name="txt2"></textarea></p>
                        <p><input type="submit" value="提交到学生科"></p>
                    </fieldset>
                  </form>
                  <script src="../static/thirdparty/layui-v2.4.5/layui.all.js" charset="utf-8"></script>
                  <script>alert("请勿重复点提交按钮，过多的点击可能造成服务器缓慢，违纪原因处可以填写，宿舍床号柜子号几铺未跑操、室外卫生区、几人未跑操、跑操班与班间距太大、集体迟到等，不要用360等浏览器提交可能造成空表不要用360等浏览器提交可能造成空表不要用360等浏览器提交可能造成空表！")</script>
                </form>

              </body>
            </html>';
  echo $ser ;
	} else {
    // 若没有登录
    header('refresh:2; url=login.php');
    echo "<h1>您还没有登录,2秒后自动跳转登录页面。</h1>";
    echo "<br>";
    echo "<h1>若长时间未跳转请<a href='login.php'>登录</a></h1>";
    
	}
?>

