<?php
session_start();
$_userid = $_SESSION["userinfo"]['id_user'];
$_email = $_SESSION["userinfo"]['email'];
$_message = $_POST['message'];
$mysql=mysqli_connect('localhost','root','','horizon');

if ($_email == "") {
    echo 'Непредвиденная ошибка';
}



else{
    $sqlInsert="INSERT INTO `support`( `id_user`,`email`, `message`) VALUES ('$_userid', '$_email', '$_message')";
    $result=mysqli_query($mysql,$sqlInsert);
    header("Location: ../uslygi.php");
    
}
?>