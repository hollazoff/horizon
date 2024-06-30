<?php
session_start();

$_userid = $_SESSION["userinfo"]['id_user'];
$_oldpass = $_POST['oldpass'];
$_newpass = $_POST['newpass'];
$mysql=mysqli_connect('localhost','root','','horizon');
$_provlog = mysqli_query($mysql,"SELECT * FROM `users` WHERE `password` = '$_oldpass' AND `id_user` = '$_userid'");

if ($_oldpass == "" || $_newpass == "") {
    echo 'Поля не заполнены';
}
elseif(mysqli_num_rows($_provlog) == 0){
    echo 'Старый пароль не подходит';
    }
elseif ($_oldpass == $_newpass ) {
    echo 'Пароли одинаковые';
}
elseif (mysqli_num_rows($_provlog) >= 1) {
    $sqlInsert="UPDATE `users` SET `password` = '$_newpass' WHERE `users`.`id_user` = $_userid";
    $result=mysqli_query($mysql,$sqlInsert);
    session_unset();
    header("Location: ../vhodreg.php");
}

else{
    echo "ошибка";
    
}
?>