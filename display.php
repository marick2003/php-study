<?php

  include_once('simpleCMS.php');
   $obj = new simpleCMS();
   $obj->host = 'localhost';
   $obj->username = 'root';
   $obj->password = '123456';
   $obj->table = 'list';
   $obj->connect();

   if ( $_POST )
     $obj->write($_POST);
   echo ( $_GET['admin'] == 1 ) ? $obj->display_admin() : $obj->display_public();

// $servername = "127.0.0.1";
// $username = "root";
// $password = "123456";

// // Create connection
// $conn = mysqli_connect($servername, $username, $password);

// // Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <title>SimpleCMS</title>
  </head>

  <body>

  </body>

</html>