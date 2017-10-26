<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册</title>
</head>
<body>
<?php

require_once 'login.php';

$con = mysqli_connect("localhost", "root", "");
mysqli_select_db($con,"login");
$post = $_POST;

$name = "";
$password = "";
if ($post["name"]) {
    $name = $post["name"];
} else {
    echo "用户名不能为空";
}
if ($post["password"] && $post["repassword"]) {
    if ( $post["password"] == $post["repassword"]) {
        $password = $post["password"];
    } else {
        echo "密码输入不一致";
    }
} else {
    echo "密码输入不一致";
}
if ($name && $password) {
//    先查询是不是存在该用户名
    if (login($name, $password)){
        echo "存在用户，请重新注册";
    } else {
        $sql = "INSERT INTO login (name, password) VALUES ($name, $password)";
        $set = mysqli_query($con, $sql);
        if ($set) {
            echo "注册成功";
        } else {
            echo "注册失败";
            echo mysqli_error($con);
        }
    }
}
?>

</body>
</html>

