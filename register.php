<?php
include_once 'php/head.php';

if (isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['tel'])&& isset($_POST['email'])&& isset($_POST['address'])){
    $name = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $location = $_POST['address'];
    $insert = "INSERT INTO users ( name, email, password, tel, address) VALUES ( '$name','$email','$password','$tel','$location')";
    $newUser = $art_store->query($insert);
    if(! $newUser ) {
        die('注册失败，用户名已存在！'.'重新<a href="register.php">注册</a>');
    }else{
        $_SESSION['admin'] = "true";
        $_SESSION['userName'] =$name;
        $_SESSION['userEmail'] =$email;
        $_SESSION['userTel'] =$tel;
        $_SESSION['userID'] =($newUser->fetch_assoc())['userID'];
        $_SESSION['userAddress'] =$location;
        echo "<script> alert('注册成功！');location.href = 'homepage.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>注册</title>
        <link rel="stylesheet" href="css/homepage.css">
        <link rel="stylesheet" href="css/logAndReg.css">

        <script>
            window.onload = function(){
                document.getElementById("form").onsubmit = function(){
                    var result = checkUsername() && checkPassword() && checkConfirm();
                    if(result)
                        alert("表单校验成功");
                    else
                        alert("校验错误，请重新输入");
                    return result;
                }

                document.getElementById("username").onblur = checkUsername;
                document.getElementById("password").onblur = checkPassword;
                document.getElementById("confirm").onblur = checkConfirm;
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
                //(?![0-9]+$) 预测该位置后面不全是数字
                //(?![a-zA-Z]+$) 预测该位置后面不全是字母
                var reg_password = /^(?![0-9]+$)(?![a-zA-Z]+$)\w{6,12}$/;
                var flag = reg_password.test(password);
                var s_password = document.getElementById("s_password");

                if(flag){
                    s_password.innerHTML = "<img width='35' height='25' src='resources/img/gou.png'/>";
                }else{
                    s_password.innerHTML = "密码格式有误";
                }
                return flag;
            }

            function checkConfirm(){
                var password = document.getElementById("password").value;
                var confirm = document.getElementById("confirm").value;
                var flag = password == confirm;
                var s_confirm = document.getElementById("s_confirm");

                if(flag){
                    s_confirm.innerHTML = "<img width='35' height='25' src='resources/img/gou.png'/>";
                }else{
                    s_confirm.innerHTML = "密码和确认密码不⼀致";
                }
                return flag;
            }
        </script>
    </head>

    <body>
        <div class="reg_layout">

            <div class="rg_left">
                <p>用户注册</p>
                <p>USER REGISTER</p>
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
                                <td class="td_left"><label for="confirm">确认密码</label></td>

                                <td class="td_right">
                                    <input type="password" name="confirm" id="confirm" placeholder="please enter your password again">

                                    <span id="s_confirm" class="error"></span>
                                </td>
                            </tr>

                            <tr>
                                <td class="td_left"><label for="email">Email</label></td>
                                <td class="td_right"><input type="email" name="email" id="email" placeholder="please enter your email"></td>
                            </tr>

                            <tr>
                                <td class="td_left"><label for="address">地址</label></td>
                                <td class="td_right"><input type="text" name="address" id="name" placeholder="please enter your address"></td>
                            </tr>

                            <tr>
                                <td class="td_left"><label for="tel">手机号</label></td>
                                <td class="td_right"><input type="text" name="tel" id="tel" placeholder="please enter your tel"></td>
                            </tr>

                            <tr>
                                <td class="td_left"><label>性别</label></td>
                                <td class="td_right">
                                    <input type="radio" name="gender" value="male" checked> 男
                                    <input type="radio" name="gender" value="female"> 女
                                </td>
                            </tr>

                            <tr>
                                <td class="td_left"><label for="birthday">出生日期</label></td>
                                <td class="td_right"><input type="date" name="birthday" id="birthday" placeholder="please enter your birthday"></td>
                            </tr>

                            <tr>
                                <td colspan="2" class="out_sub"><input type="submit" class="in_sub" value="注册"></td>
                            </tr>
                        </table>
                    </form>
                </div>

                <br><br>
                <p class="out_jump"><a class="in_jump" href="sign.php"> SIGN IN </a></p>

                <br>
                <p class="out_jump"><a class="in_jump" href="homepage.php"> BACK TO HOMEPAGE </a></p>
            </div>
        </div>
        <script src="js/foot.js"></script>
    </body>
</html>


