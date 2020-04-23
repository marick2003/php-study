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
function send_post($url, $post_data){
    $postdata = http_build_query($post_data);
    $options = array(
        'http' => array(
          'method' => 'POST',
          'header' => 'Content-type:application/x-www-form-urlencoded',
          'content' => $postdata,
          'timeout' => 15 * 60 // 超時時間（單位:s）
        )
    );
    $context = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    return $result;
}
?>

