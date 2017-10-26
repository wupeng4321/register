<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
require_once 'function.php';


$data = $_REQUEST;
echo $data["Code"];

return $data['Code'];









print_r(urldecode(file_get_contents('php://input')));
$name = "";
if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $password = "";
    if ($_POST["password"]) {
        $password = $_POST["password"];
    } else {
        echo "密码为空";
    }

    $success = login($name, $password);
    if ($success) {
        echo "success";
    }

//    echo "获取条数*******************";
//    $set1 = mysqli_query($con, "SELECT COUNT(*) FROM login");
//    $result_arr = mysqli_fetch_array($set1);
//    var_dump($result_arr[0]);
}else{
    echo '请输入名字';
}

/*用于登录的函数
 * name 用户名
 * password 密码
 * */
function login($name, $password) {
    $con = connectDB();
    mysqli_select_db($con,"login");
    $sql1 = "SELECT * FROM login WHERE name = $name";
    $set = mysqli_query($con, $sql1);
    $dataCount = mysqli_num_rows($set);
    echo "datacount = ".$dataCount;
    for ($i = 0; $i < $dataCount; $i++) {
        $result = mysqli_fetch_assoc($set);
        if ($result["password"] == $password) {
            echo "登录成功";
            return 1;
        }
        if ($i == $dataCount) {
            return 0;
        }
    }
}
?>


</body>
</html>
