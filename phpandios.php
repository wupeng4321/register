<?php
header("Content-type: application/json; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: wupeng
 * Date: 2017/10/1
 * Time: 14:49
 */
require_once 'function.php';
$data = $_REQUEST;
$json = file_get_contents('php://input');
//$decodeJson = json_decode($json);
////
$con = connectDB();
mysqli_select_db($con,"shengHuoJia");
//
//$sql = "INSERT INTO shj_goods (id, qrCode, price, manuName, img, spec) VALUES ('1','312321421412', '30','2032004', 'img', 'spec')";
//$set = mysqli_query($con, $sql);






$count = count($data['(null)']);
for ($i = 0; $i < $count; $i++) {
    $qrCode = $data['(null)'][$i]['qrCode'];
    $sql = "INSERT INTO shj_goods (id, qrCode, price, manuName, img, spec) VALUES ($i,$qrCode, '30','2032004', 'img', 'spec')";
//    if ($i < $count - 1){
//        $sql .= ";";
//    }


$set = mysqli_query($con, $sql);
//$set = 1;
//if ($set) {
//    echo json_encode("success111111");
//} else {
//    echo json_encode("faliure111111");
//}
//$set = mysqli_multi_query($con, $sql);
//    $set = mysqli_query($con, $sql);
//    if ($set) {
//        echo "注册成功";
//    } else {
//        echo "注册失败";
////        echo mysqli_error($con);
//    }
}
//$test = ['1'=>'1', '2'=>'2', '3'=>'3'];
//mysqli_close($con);
//$set = $con->multi_query($sql);
$array = [
//    'status'=>$set?'success':'false',
    'Message' => 'hello,php',
    'data'=>$data,
    'json'=>$json,
//    'test'=>$test,
    'senddata'=>$data['(null)'][0]['qrCode'],
    'count'=>$count
    ];
echo json_encode($array);


