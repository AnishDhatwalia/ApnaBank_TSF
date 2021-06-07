<?php
define('host','localhost');
define('user','root');
define('password','');
define('db','customers');
$conn =new mysqli(host,user,password,db);
if($conn){
}
else{
    die("no Connection".mysqli_connect_error());
}
?>


