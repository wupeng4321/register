<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/4/28
 * Time: 16:11
 */
require_once 'config.php';

function connectDB() {
    return mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PW);
}