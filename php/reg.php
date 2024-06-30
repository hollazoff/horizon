<?php
session_start();
?>

    <?php


$_name = $_POST['name'];
$_surname = $_POST['surname'];
$_email = $_POST['email'];
$_number = $_POST['number'];
$_password = $_POST['password'];
$_reppassword = $_POST['reppassword'];



$mysql=mysqli_connect('localhost','root','','horizon');
$_provnumber = mysqli_query($mysql,"SELECT * FROM `users` WHERE `number` = '$_number'");
$_provemail = mysqli_query($mysql,"SELECT * FROM `users` WHERE `email` = '$_email'");

if ($mysql==false){
    echo 'вы не смогли подключится';
}
elseif($_name == ''){
    echo 'Введите ваше имя';
}
elseif($_surname == ''){
    echo 'Введите вашу фамилию';
}
elseif($_email == ''){
    echo 'Введите вашу электронную почту';
}
elseif(mysqli_num_rows($_provemail) >= 1){
    echo 'такая почта уже занята';
}

elseif($_number == ''){
    echo 'Введите ваш номер телефона';
}
elseif(mysqli_num_rows($_provnumber) >= 1){
    echo 'такой номер телефона уже занят';
}
elseif ( strlen($_number) < 11){
    echo 'Номер должен состоять из 11 цифр, без каких либо специальных символов';
}

elseif($_password == ''){
    echo 'Введите пароль';
}

elseif($_reppassword == ''){
    echo 'Пожалуста подтвердите пароль';
}
elseif ($_password != $_reppassword){
    echo 'пароли не совпали';
}
elseif ( strlen($_password) < 6){
    echo 'пароль меньше 6 символов';
}









else{
    $sqlInsert="INSERT INTO `users`(`name`,`surname`, `email`,`number`, `password`) VALUES ('$_name','$_surname', '$_email','$_number', '$_password')";
    $result=mysqli_query($mysql,$sqlInsert);
    echo 'Вы успешно зарегестрировались';
    header("Location: ../vhodreg.php");
    
}

?>