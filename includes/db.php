<?php 
//localhost
$db['db_host']="127.0.0.1";
$db['db_user']="root";
$db['db_pass']="123456";
$db['db_db']="cms";

foreach($db as $key =>$value){
    define(strtoupper($key),$value);
}
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_DB);
// if($connection){
//     echo "Connected!";
// }

if(mysqli_connect_errno($connection)){

    echo "connect error";
}
?>