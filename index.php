<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/6/9
 * Time: 11:06
 */
header('Content-Type:text/event=stream');
echo "hello";
//
for ($i = 0; $i < 100; $i++) {
    date_default_timezone_set("Asia/shanghai");
    echo "event:newDate/n";
    echo 'data:'.date('Y-m-d H-i-s');
    echo "\n\n";
    echo "2345675";
    flush();
    sleep(1);
}
