<?php
include_once 'php/head.php';


if (isset($_POST['username'])&& isset($_POST['password'])){
    $name = $_POST['username'];
    $password = $_POST['password'];
    $truePassword = '';
    $logIn = "SELECT * FROM users WHERE name = '$name'";

    $theUser = $art_store->query($logIn);
    if ($theUser -> num_rows === 0){
        echo '<script>alert("您还未注册，请立即注册！");location.href="register.php"</script>';
    }else {
        while ($row = $theUser -> fetch_assoc()){//得到正确的密码
            $truePassword = $row['password'];
        }
        if ($password !== $truePassword){
            echo '<script>alert("密码错误！");location.href="sign.php"</script>';
        }else if ($password === $truePassword){//登陆成功
            $_SESSION['admin'] = "true";

            $next = "SELECT * FROM users WHERE name = '$name'";

            $nowUser = $art_store->query($next);

            while ($row2 = $nowUser -> fetch_assoc()){
                $_SESSION['userID'] = $row2['userID'];
                $_SESSION['userName'] =$row2['name'];
                $_SESSION['userEmail'] =$row2['email'];
                $_SESSION['userTel'] =$row2['tel'];
                $_SESSION['userAddress'] =$row2['address'];
            }
            echo '<script>alert("登陆成功！");location.href = "homepage.php"</script>';
        }
    }
}








?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>登录</title>
        <link rel="stylesheet" href="css/homepage.css">
        <link rel="stylesheet" href="css/logAndReg.css">
        <script>
            window.onload = function(){
                document.getElementById("form").onsubmit = function(){
                    var result = checkUsername() && checkPassword();
                    if(result)
                        alert("表单校验成功");
                    else
                        alert("校验错误，请重新输入");
                    return result;
                }

                document.getElementById("username").onblur = checkUsername;
                document.getElementById("password").onblur = checkPassword;
            }

            function checkUsername(){
                var username = document.getElementById("username").value;
                var reg_username = /^\w{6,12}$/;
                var flag = reg_username.test(username);
                var s_username = document.getElementById("s_username");

                if(flag){
                    s_username.innerHTML = "<img width='35' height='25' src='resources/img/gou.png'/>";
                }else{
                    s_username.innerHTML = "用户名格式有误";
                }
                return flag;
            }

            function checkPassword(){
                var password = document.getElementById("password").value;
                var reg_password = /^\w{6,12}$/;
                var flag = reg_password.test(password);
                var s_password = document.getElementById("s_password");

                if(flag){
                    s_password.innerHTML = "<img width='35' height='25' src='resources/img/gou.png'/>";
                }else{
                    s_password.innerHTML = "密码格式有误";
                }
                return flag;
            }
        </script>
    </head>

    <body>
        <div class="log_layout">
            <div class="rg_left">
                <p>用户登录</p>
                <p>USER LOGIN</p>
            </div>

            <div class="rg_center">
                <br><br>
                <p class="out_title"> ART&nbsp&nbspSTORE </p>

                <br>
                <div class="rg_form">
                    <form action="#" id="form" method="post">
                        <table>
                            <tr>
                                <td class="td_left"><label for="username">用户名</label></td>

                                <td class="td_right">
                                    <input type="text" name="username" id="username" placeholder="please enter your username">

                                    <span id="s_username" class="error"></span>
                                </td>
                            </tr>

                            <tr>
                                <td class="td_left"><label for="password">密码</label></td>

                                <td class="td_right">
                                    <input type="password" name="password" id="password" placeholder="please enter your password">

                                    <span id="s_password" class="error"></span>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="2" class="out_sub"><input type="submit" class="in_sub" value="登录"></td>
                            </tr>
                        </table>
                    </form>
                </div>

                <br><br>
                <p class="out_jump"><a class="in_jump" href="register.php"> CREAT ACCOUNT </a></p>

                <br><br>
                <p class="out_jump"><a class="in_jump" href="homepage.php"> BACK TO HOMEPAGE </a></p>
            </div>
        </div>
        <script src="js/foot.js"></script>
    </body>
</html>



