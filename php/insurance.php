<?php
session_start();
$_userid = $_SESSION["userinfo"]['id_user'];
$_fio = $_POST['fio'];
$_email = $_POST['email'];
$_number = $_POST['number'];
$_daterosh = $_POST['daterosh'];
$_passport = $_POST['passport'];
$_summ = $_POST['summ'];
$_dateprib = $_POST['dateprib'];

$mysql=mysqli_connect('localhost','root','','horizon');

if ($_email == "") {
    echo 'Непредвиденная ошибка';
}



else{
    $sqlInsert="INSERT INTO `insurance`( `id_user`,`fio`,`email`,`number`,`daterosh`,`zagran`,`summ`,`dateprib`) VALUES ('$_userid', 
    '$_fio', '$_email','$_number','$_daterosh','$_passport','$_summ','$_dateprib')";
    $result=mysqli_query($mysql,$sqlInsert);
    header("Location: ../uslygi.php");
    
}
?>