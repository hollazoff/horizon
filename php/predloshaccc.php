<?php
session_start();
$_userid = $_SESSION["userinfo"]['id_user'];
$_name = $_SESSION["userinfo"]['name'];
$_email = $_SESSION["userinfo"]['email'];
$mysql=mysqli_connect('localhost','root','','horizon');

if ($_email == "") {
    echo 'Непредвиденная ошибка';
}



else{
    $sqlInsert="INSERT INTO `predlosh`( `id_user`,`name`, `email`) VALUES ('$_userid', '$_name', '$_email')";
    $result=mysqli_query($mysql,$sqlInsert);
    header("Location: ../account.php");
    
}
?>