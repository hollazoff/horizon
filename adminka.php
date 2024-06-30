<?php
session_start();
ob_start();
if($_SESSION["userinfo"] ["email"] == ""){
  header("Location: ./index.php");
}
elseif($_SESSION["userinfo"] ["email"] == "1"){
    header("Location: ./index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./scss/adminka.css">
    <title>Horizon</title>
</head>
<body>
<header>
      <div class="countainer">
        <div class="header-up">
          <div class="menu">
            <div class="menu-left">
              <a href="index.php" id="change" class="menu-left__logo"><img class="logo" src="./public/horizon.svg"></a>
              <div class="burger">
              <a href="bron.php" class="menu-left__item">Бронирование</a>
              <a href="uslygi.php" class="menu-left__item">Услуги</a>
              <a href="contacts.php" class="menu-left__item">Контакты</a></div>
            </div>
            <div class="menu-right">
              <div class="telephone">
                <img class="telephone__icon" src="./public/teleicon.svg">
                <a href="#" class="telephone__number">+7-985-842-04-42</a>
              </div>
              <div class="header-button">
                <a class="button-all" href="account.php">
                  <img class="logo" src="./public/profil.svg">
                  <p class="button-all__btn"><?php echo $_SESSION["userinfo"]["name"]?></p>
                </a>
              </div>
            </div>
            <div class="menu1-btn">
            <span></span>
            <span></span>   
            <span></span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <section>
        <div class="countainer">
            <div class="adminka">
                <h3 class="adminka__title">Админка</h3>
                    <div class="users">
                            <h3 class="adminka__nametb">Пользователи</h3>
                            <?php 
                            $mysql=mysqli_connect('localhost','root','','horizon');
                            $_provid = ("SELECT * FROM `users` ");
                            $result = mysqli_query($mysql,$_provid);
                    
                            ?>
                            <table class="table" >
                            <tr class="stroke-up">
                                <td class="stroke-up__title"style='width:40px' >id_user</td>
                                <td class="stroke-up__title">name</td>
                                <td class="stroke-up__title">surname</td>
                                <td class="stroke-up__title">email</td>
                                <td class="stroke-up__title">number</td>
                                <td class="stroke-up__title">password</td>
                                <td class="stroke-up__title" style='width:40px'>trips</td>
                                <td class="stroke-up__title" style='width:40px'>role</td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                            </tr>
                            <?php 
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='stroke-down'>";
                                echo "<td class='down-form__text'>";
                                echo "<input readonly style='width:20px' class='stroke-down__input' type='text' value='" . $row['id_user'] . "'>";
                                $usera = $row["id_user"];
                                echo "</td>";
                                echo "<td class='down-form__text'>";
                                echo "<input style='width:120px' name='name' class='stroke-down__input' type='text' value='" . $row["name"] . "'>";
                                echo "</td>";
                                echo "<td class='down-form__text'>";
                                echo "<input style='width:120px' name='surname' class='stroke-down__input' type='text' value='" . $row["surname"] . "'>";
                                echo "</td>";
                                echo "<td  class='down-form__text'>";
                                echo "<input style='width:250px' name='email'class='stroke-down__input'  type='text' value='" . $row["email"] . "'>";
                                echo "</td>";
                                echo "<td  class='down-form__text'>";
                                echo "<input    class='stroke-down__input' name='number'  type='text' value='" . $row["number"] . "'>";
                                echo "</td>";
                                echo "<td class='down-form__text'>";
                                echo "<input style='width:120px' name='password' class='stroke-down__input' type='text' value='" . $row["password"] . "'>";
                                echo "</td>";
                                echo "<td class='down-form__text'>";
                                echo "<input style='width:10px' name='trips' class='stroke-down__input' type='text' value='" . $row["trips"] . "'>";
                                echo "</td>";
                                echo "<td class='down-form__text'>";
                                echo "<input style='width:10px' name='role' class='stroke-down__input' type='text' value='" . $row["role"] . "'>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='id_user' value='$usera'>";
                                echo "<input style='width:100px' class='del-button' type='submit' name='del' value='Удалить'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='userred' value='$usera'>";
                                echo "<input style='width:100px;   background: #EECF48;' class='del-button' type='submit' name='edit' value='Редакт'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input style='width:100px;   background: green;' class='del-button' type='submit' name='add' value='Добавить'>";
                                echo "</form>";

                                echo "</td>";
                                echo "</tr>";
                            }

                            ?>
                            </table>

                            <?php

                            if (isset($_POST['del'])){
                                $mysql=mysqli_connect('localhost','root','','horizon');
                                $sqlInsert="DELETE FROM `users` WHERE `id_user`= $usera";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                            }
                            @$usered = $_POST['userred'];
                            if (isset($_POST['edit'])){ 
                                $sqlSelect = "SELECT * FROM users WHERE id_user = $usered";
                                $result=mysqli_query($mysql,$sqlSelect);
                                $row = mysqli_fetch_assoc($result);
                                $name = $row["name"];
                                $surname  = $row["surname"];
                                $email = $row["email"];
                                $number = $row["number"];
                                $password =$row["password"];
                                $trips = $row["trips"];
                                $role = $row["role"];
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:40px' class='formred__input' type='text' name='id_user' value='$usered' >
                                <input style='width:120px' name='name' class='formred__input' type='text' value='$name'  >
                                <input style='width:120px' name='surname' class='formred__input' type='text' value='$surname' >
                                <input style='width:250px' name='email'class='formred__input'  type='text' value='$email' >
                                <input class='formred__input' name='number'  type='text' value='$number' placeholder='Номер'>
                                <input style='width:120px' name='password' class='formred__input' type='text' value='$password' >
                                <input style='width:90px' name='trips' class='formred__input' type='text' value='$trips' >
                                <input style='width:50px' name='role' class='formred__input' type='text' value='$role' >
                                <input style='width:140px;   background: #EECF48;' class='formred__btn' type='submit' name='save' value='Сохранить'>
                                </form>
                                ";
                            }
                            if (isset($_POST['save'])){
                                $usered = $_POST["id_user"];
                                $name = $_POST["name"];
                                $surname  = $_POST["surname"];
                                $email = $_POST["email"];
                                $number = $_POST["number"];
                                $password =$_POST["password"];
                                $trips = $_POST["trips"];
                                $role = $_POST["role"];
                                $sqlInsert = "UPDATE users                 SET name = '$name',                     surname = '$surname',                    email = '$email',                     number = '$number',                    password = '$password'                WHERE id_user = $usered";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                                }
                                if (isset($_POST['add'])){ 
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:40px' class='formred__input' type='text' name='id_user' value='' placeholder='ID' >
                                <input style='width:120px' name='name' class='formred__input' type='text' value=''  placeholder='Имя'>
                                <input style='width:120px' name='surname' class='formred__input' type='text' value='' placeholder='Фамилия'>
                                <input style='width:250px' name='email'class='formred__input'  type='text' value='' placeholder='Почта'>
                                <input class='formred__input' name='number'  type='text' value='' placeholder='Номер'>
                                <input style='width:120px' name='password' class='formred__input' type='text' value='' placeholder='Пароль'>
                                <input readonly style='width:90px' name='trips' class='formred__input' type='text' value='' placeholder='Поездки'>
                                <input readonly style='width:50px' name='role' class='formred__input' type='text' value='' placeholder='Роль'>
                                <input style='width:140px;   background: green;' class='formred__btn' type='submit' name='adduser' value='Добавить'>
                                </form>
                                ";
                                }
                                if (isset($_POST['adduser'])){
                                    $name = $_POST["name"];
                                    $surname  = $_POST["surname"];
                                    $email = $_POST["email"];
                                    $number = $_POST["number"];
                                    $password =$_POST["password"];
                                    $sqlInsert="INSERT INTO `users`(`name`,`surname`, `email`,`number`, `password`) VALUES ('$name','$surname', '$email','$number', '$password')";
                                    $result=mysqli_query($mysql,$sqlInsert);
                                    header("Location: ./adminka.php");
                                    }





                            ?>
                    </div>
                    <div class="travels">
                            <h3 class="adminka__nametb">Путешествия</h3>
                            <?php 
                            $mysql=mysqli_connect('localhost','root','','horizon');
                            $_provid = ("SELECT * FROM `Travels` ");
                            $result = mysqli_query($mysql,$_provid);
                    
                            ?>
                            <table class="table" >
                            <tr class="stroke-up">
                                <td class="stroke-up__title"style='width:40px' >id_travel</td>
                                <td class="stroke-up__title">title</td>
                                <td class="stroke-up__title">place</td>
                                <td class="stroke-up__title" style='width:20px'>mesta</td>
                                <td class="stroke-up__title"style='width:95px' >dataotpr</td>
                                <td class="stroke-up__title" style='width:95px'>dataprib</td>
                                <td class="stroke-up__title" style='width:20px'>id_traveltype</td>
                                <td class="stroke-up__title" style='width:20px'>id_tourtype</td>
                                <td class="stroke-up__title">cena</td>
                                <td class="stroke-up__title" style='width:40px'>ostalos</td>
                                <td class="stroke-up__title" style='width:80px'>img</td>
                                <td class="stroke-up__title" style='width:80px'>description</td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                            </tr>
                            <?php 
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='stroke-down'>";
                                $travela = $row["id_travel"];
                                echo "<td class='down-form__text'>" . $row['id_travel'] . "</td>";
                                echo "<td class='down-form__text'>" . $row["title"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["place"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["mesta"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["dataotpr"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["dataprib"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["id_traveltype"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["id_tourtype"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["cena"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["ostalos"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["img"] . "</td>";
                                echo "<td  class='down-form__text'>";
                                echo "<textarea readonly class='stroke-down__input' name='number' >" . $row["description"] . "</textarea>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='id_user' value='$travela'>";
                                echo "<input style='width:100px' class='del-button' type='submit' name='delt' value='Удалить'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='userredt' value='$travela'>";
                                echo "<input style='width:100px;   background: #EECF48;' class='del-button' type='submit' name='editt' value='Редакт'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input style='width:100px;   background: green;' class='del-button' type='submit' name='addt' value='Добавить'>";
                                echo "</form>";

                                echo "</td>";
                                echo "</tr>";
                            }

                            ?>
                            </table>

                            <?php

                            if (isset($_POST['delt'])){
                                $mysql=mysqli_connect('localhost','root','','horizon');
                                $sqlInsert="DELETE FROM `Travels` WHERE `id_travel`= $travela";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                            }
                            @$travelred = $_POST['userredt'];
                            if (isset($_POST['editt'])){ 
                                $sqlSelect = "SELECT * FROM Travels WHERE id_travel = $travelred";
                                $result=mysqli_query($mysql,$sqlSelect);
                                $row = mysqli_fetch_assoc($result);
                                $title = $row["title"];
                                $place  = $row["place"];
                                $mesta = $row["mesta"];
                                $dataotpr = $row["dataotpr"];
                                $dataprib = $row["dataprib"];
                                $id_traveltype = $row["id_traveltype"];
                                $id_tourtype = $row["id_tourtype"];
                                $cena = $row["cena"];
                                $ostalos = $row["ostalos"];
                                $img = $row["img"];
                                $description = $row["description"];
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:20px' class='formred__input' type='text' name='travel' value='$travelred'>
                                <input style='width:120px' name='title' class='formred__input' type='text' value='$title'>
                                <input style='width:120px' name='place' class='formred__input' type='text' value='$place'>
                                <input style='width:20px' name='mesta' class='formred__input' type='text' value='$mesta'>
                                <input style='width:130px' name='dataotpr' class='formred__input' type='text' value='$dataotpr'>
                                <input style='width:130px' name='dataprib' class='formred__input' type='text' value='$dataprib'>
                                <input style='width:20px' name='id_traveltype' class='formred__input' type='text' value='$id_traveltype'>
                                <input style='width:20px' name='id_tourtype' class='formred__input' type='text' value='$id_tourtype'>
                                <input style='width:100px' name='cena' class='formred__input' type='text' value='$cena'>
                                <input style='width:30px' name='ostalos' class='formred__input' type='text' value='$ostalos'>
                                <input style='width:150px' name='img' class='formred__input' type='text' value='$img'>
                                <textarea name='description' class='formred__input' rows='3'style='width:464px;'>$description</textarea>
                                <input style='width:140px;   background: #EECF48;' class='formred__btn' type='submit' name='savet' value='Сохранить'>
                            </form>
                            
                                ";
                            }
                            if (isset($_POST['savet'])){
                                $id_travel = $_POST['travel'];
                                $title = $_POST['title'];
                                $place = $_POST['place'];
                                $mesta = $_POST['mesta'];
                                $dataotpr = $_POST['dataotpr'];
                                $dataprib = $_POST['dataprib'];
                                $id_traveltype = $_POST['id_traveltype'];
                                $id_tourtype = $_POST['id_tourtype'];
                                $cena = $_POST['cena'];
                                $ostalos = $_POST['ostalos'];
                                $img = $_POST['img'];
                                $description = $_POST['description'];
                                if ($id_tourtype === '') {
                                    $sqlInsert = "UPDATE Travels
                                    SET 
                                        title = '$title',
                                        place = '$place',
                                        mesta = '$mesta',
                                        dataotpr = '$dataotpr',
                                        dataprib = '$dataprib',
                                        id_traveltype = '$id_traveltype',
                                        cena = '$cena',
                                        ostalos = '$ostalos',
                                        img = '$img',
                                        description = '$description'
                                    WHERE id_travel = '$id_travel';
                                    ";
                                } else {
                                    $sqlInsert = "UPDATE Travels
                                    SET 
                                        title = '$title',
                                        place = '$place',
                                        mesta = '$mesta',
                                        dataotpr = '$dataotpr',
                                        dataprib = '$dataprib',
                                        id_traveltype = '$id_traveltype',
                                        id_tourtype = '$id_tourtype',
                                        cena = '$cena',
                                        ostalos = '$ostalos',
                                        img = '$img',
                                        description = '$description'
                                    WHERE id_travel = '$id_travel';
                                    ";
                                };

                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                                }
                                if (isset($_POST['addt'])){ 
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:20px' name='title' class='formred__input' type='text' value='' placeholder='ID'>
                                <input style='width:150px' name='title' class='formred__input' type='text' value='' placeholder='Название'>
                                <input style='width:150px' name='place' class='formred__input' type='text' value='' placeholder='Место'>
                                <input style='width:60px' name='mesta' class='formred__input' type='text' value='' placeholder='Места'>
                                <input style='width:175px' name='dataotpr' class='formred__input' type='text' value='' placeholder='Дата отправления'>
                                <input style='width:150px' name='dataprib' class='formred__input' type='text' value='' placeholder='Дата прибытия'>
                                <input style='width:120px' name='id_traveltype' class='formred__input' type='text' value='' placeholder='Тип поездки'>
                                <input style='width:80px' name='id_tourtype' class='formred__input' type='text' value='' placeholder='Тип тура'>
                                <input style='width:60px' name='cena' class='formred__input' type='text' value='' placeholder='Цена'>
                                <input style='width:90px' name='ostalos' class='formred__input' type='text' value='' placeholder='Осталось'>
                                <input style='width:150px' name='img' class='formred__input' type='text' value='' placeholder='Изображение'>
                                <textarea name='description' class='formred__input' rows='2' style='width:164px;' placeholder='Описание'></textarea>
                                <input style='width:140px;   background: green;' class='formred__btn' type='submit' name='addtravel' value='Добавить'>
                            </form>
                                ";
                                }
                                if (isset($_POST['addtravel'])){
                                    $title = $_POST["title"];
                                    $place = $_POST["place"];
                                    $mesta = $_POST["mesta"];
                                    $dataotpr = $_POST["dataotpr"];
                                    $dataprib = $_POST["dataprib"];
                                    $id_traveltype = $_POST["id_traveltype"];
                                    $id_tourtype = $_POST["id_tourtype"];
                                    $cena = $_POST["cena"];
                                    $ostalos = $_POST["ostalos"];
                                    $img = $_POST["img"];
                                    $description = $_POST["description"];
                                    if ($id_tourtype === '') {
                                        $sqlInsert = "INSERT INTO Travels (title, place, mesta, dataotpr, dataprib, id_traveltype, cena, ostalos, img, description)
                                        VALUES ('$title', '$place', '$mesta', '$dataotpr', '$dataprib', '$id_traveltype', '$cena', '$ostalos', '$img', '$description')";
                                    } else {
                                        $sqlInsert = "INSERT INTO Travels (title, place, mesta, dataotpr, dataprib, id_traveltype, id_tourtype, cena, ostalos, img, description)
                                        VALUES ('$title', '$place', '$mesta', '$dataotpr', '$dataprib', '$id_traveltype', '$id_tourtype', '$cena', '$ostalos', '$img', '$description')";
                                    };
                                
                                    $result = mysqli_query($mysql, $sqlInsert);
                                    header("Location: ./adminka.php");
                                }
                                





                            ?>
                    </div>
                    <div class="traveltype">
                            <h3 class="adminka__nametb">Тип путешествия</h3>
                            <?php 
                            $mysql=mysqli_connect('localhost','root','','horizon');
                            $_provid = ("SELECT * FROM `traveltype` ");
                            $result = mysqli_query($mysql,$_provid);
                    
                            ?>
                            <table class="table" >
                            <tr class="stroke-up">
                                <td class="stroke-up__title"style='width:40px' >id_traveltype</td>
                                <td class="stroke-up__title">title</td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                            </tr>
                            <?php 
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='stroke-down'>";
                                $traveltypa = $row["id_traveltype"];
                                echo "<td class='down-form__text'>" . $row['id_traveltype'] . "</td>";
                                echo "<td class='down-form__text'>" . $row["title"] . "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='id_user' value='$travela'>";
                                echo "<input style='width:100px' class='del-button' type='submit' name='delturt' value='Удалить'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='redturt' value='$traveltypa'>";
                                echo "<input style='width:100px;   background: #EECF48;' class='del-button' type='submit' name='editurt' value='Редакт'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input style='width:100px;   background: green;' class='del-button' type='submit' name='addturt' value='Добавить'>";
                                echo "</form>";

                                echo "</td>";
                                echo "</tr>";
                            }

                            ?>
                            </table>

                            <?php

                            if (isset($_POST['delturt'])){
                                $mysql=mysqli_connect('localhost','root','','horizon');
                                $sqlInsert="DELETE FROM `traveltype` WHERE `id_traveltype`= $traveltypa";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                            }
                            @$traveltypa = $_POST['redturt'];
                            if (isset($_POST['editurt'])){ 
                                $sqlSelect = "SELECT * FROM traveltype WHERE id_traveltype = $traveltypa";
                                $result=mysqli_query($mysql,$sqlSelect);
                                $row = mysqli_fetch_assoc($result);
                                $title = $row["title"];
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:20px' class='formred__input' type='text' name='travel' value='$traveltypa'>
                                <input style='width:120px' name='title' class='formred__input' type='text' value='$title'>
                                <input style='width:140px;   background: #EECF48;' class='formred__btn' type='submit' name='saveturt' value='Сохранить'>
                            </form>
                            
                                ";
                            }
                            if (isset($_POST['saveturt'])){
                                $id_traveltype = $_POST['travel'];
                                $title = $_POST['title'];
                            
                                $sqlInsert = "UPDATE Travels
                                                SET 
                                                    title = '$title'
                                                WHERE id_travel = '$id_traveltype';
                                                ";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                                }
                                if (isset($_POST['addturt'])){ 
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:20px' name='title' class='formred__input' type='text' value='' placeholder='ID'>
                                <input style='width:150px' name='title' class='formred__input' type='text' value='' placeholder='Название'>
                                <input style='width:140px;   background: green;' class='formred__btn' type='submit' name='addtraveltype' value='Добавить'>
                            </form>
                                ";
                                }
                                if (isset($_POST['addtraveltype'])){
                                    $title = $_POST["title"];
                                
                                    $sqlInsert = "INSERT INTO traveltype (title)
                                                  VALUES ('$title')";
                                    $result = mysqli_query($mysql, $sqlInsert);
                                    header("Location: ./adminka.php");
                                }
                                





                            ?>
                    </div>
                    <div class="tourtype">
                            <h3 class="adminka__nametb">Тип Тура</h3>
                            <?php 
                            $mysql=mysqli_connect('localhost','root','','horizon');
                            $_provid = ("SELECT * FROM `Tourtype` ");
                            $result = mysqli_query($mysql,$_provid);
                    
                            ?>
                            <table class="table" >
                            <tr class="stroke-up">
                                <td class="stroke-up__title"style='width:40px' >id_tourtype</td>
                                <td class="stroke-up__title">title</td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                            </tr>
                            <?php 
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='stroke-down'>";
                                $tourtypa = $row["id_tourtype"];
                                echo "<td class='down-form__text'>" . $row['id_tourtype'] . "</td>";
                                echo "<td class='down-form__text'>" . $row["title"] . "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='id_user' value='$tourtypa'>";
                                echo "<input style='width:100px' class='del-button' type='submit' name='deltourt' value='Удалить'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='redtourt' value='$tourtypa'>";
                                echo "<input style='width:100px;   background: #EECF48;' class='del-button' type='submit' name='editourt' value='Редакт'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input style='width:100px;   background: green;' class='del-button' type='submit' name='addtourt' value='Добавить'>";
                                echo "</form>";

                                echo "</td>";
                                echo "</tr>";
                            }

                            ?>
                            </table>

                            <?php

                            if (isset($_POST['deltourt'])){
                                $mysql=mysqli_connect('localhost','root','','horizon');
                                $sqlInsert="DELETE FROM `Tourtype` WHERE `id_tourtype`= $tourtypa";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                            }
                            @$tourtypa = $_POST['redtourt'];
                            if (isset($_POST['editourt'])){ 
                                $sqlSelect = "SELECT * FROM Tourtype WHERE id_tourtype = $tourtypa";
                                $result=mysqli_query($mysql,$sqlSelect);
                                $row = mysqli_fetch_assoc($result);
                                $title = $row["title"];
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:20px' class='formred__input' type='text' name='travel' value='$tourtypa'>
                                <input style='width:120px' name='title' class='formred__input' type='text' value='$title'>
                                <input style='width:140px;   background: #EECF48;' class='formred__btn' type='submit' name='savetourt' value='Сохранить'>
                            </form>
                            
                                ";
                            }
                            if (isset($_POST['savetourt'])){
                                $id_traveltype = $_POST['travel'];
                                $title = $_POST['title'];
                            
                                $sqlInsert = "UPDATE Tourtype
                                                SET 
                                                    title = '$title'
                                                WHERE id_tourtype = '$id_traveltype';
                                                ";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                                }
                                if (isset($_POST['addtourt'])){ 
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:20px' name='title' class='formred__input' type='text' value='' placeholder='ID'>
                                <input style='width:150px' name='title' class='formred__input' type='text' value='' placeholder='Название'>
                                <input style='width:140px;   background: green;' class='formred__btn' type='submit' name='addtourtype' value='Добавить'>
                            </form>
                                ";
                                }
                                if (isset($_POST['addtourtype'])){
                                    $title = $_POST["title"];
                                
                                    $sqlInsert = "INSERT INTO Tourtype (title)
                                                  VALUES ('$title')";
                                    $result = mysqli_query($mysql, $sqlInsert);
                                    header("Location: ./adminka.php");
                                }
                                





                            ?>
                    </div>
                    <div class="support">
                            <h3 class="adminka__nametb">Сообщения для поддержки</h3>
                            <?php 
                            $mysql=mysqli_connect('localhost','root','','horizon');
                            $_provid = ("SELECT * FROM `support` ");
                            $result = mysqli_query($mysql,$_provid);
                    
                            ?>
                            <table class="table" >
                            <tr class="stroke-up">
                                <td class="stroke-up__title"style='width:40px' >id_support</td>
                                <td class="stroke-up__title">id_user</td>
                                <td class="stroke-up__title">email</td>
                                <td class="stroke-up__title">message</td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                            </tr>
                            <?php 
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='stroke-down'>";
                                echo "<td class='down-form__text'>" . $row["id_support"] . "</td>";
                                $supporta = $row["id_support"];
                                echo "<td class='down-form__text'>" . $row["id_user"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["email"] . "</td>";
                                echo "<td class='down-form__text'>";
                                echo "<textarea readonly class='stroke-down__input' name='number' >" . $row["message"] . "</textarea>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='id_support' value='$supporta'>";
                                echo "<input style='width:100px' class='del-button' type='submit' name='delsup' value='Удалить'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='supred' value='$supporta'>";
                                echo "<input style='width:100px;   background: #EECF48;' class='del-button' type='submit' name='editsup' value='Редакт'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input style='width:100px;   background: green;' class='del-button' type='submit' name='addsup' value='Добавить'>";
                                echo "</form>";

                                echo "</td>";
                                echo "</tr>";
                            }

                            ?>
                            </table>

                            <?php

                            if (isset($_POST['delsup'])){
                                $mysql=mysqli_connect('localhost','root','','horizon');
                                $sqlInsert="DELETE FROM `support` WHERE `id_support`= $supporta";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                            }
                            @$supporta = $_POST['supred'];
                            if (isset($_POST['editsup'])){ 
                                $sqlSelect = "SELECT * FROM support WHERE id_support = $supporta";
                                $result=mysqli_query($mysql,$sqlSelect);
                                $row = mysqli_fetch_assoc($result);
                                $id_user = $row["id_user"];
                                $email  = $row["email"];
                                $message = $row["message"];
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:40px' class='formred__input' type='text' name='id_support' value='$supporta' >
                                <input style='width:120px' name='id_user' class='formred__input' type='text' value='$id_user'  >
                                <input style='width:120px' name='email' class='formred__input' type='text' value='$email' >
                                <textarea name='message' class='formred__input' rows='3'style='width:464px;'>$message</textarea>
                                <input style='width:140px;   background: #EECF48;' class='formred__btn' type='submit' name='savesup' value='Сохранить'>
                                </form>
                                ";
                            }
                            if (isset($_POST['savesup'])){
                                $supporta = $_POST["id_support"];
                                $id_user = $_POST["id_user"];
                                $email = $_POST["email"];
                                $message = $_POST["message"];
                                
                                $sqlInsert = "UPDATE support   SET id_user = '$id_user',  email = '$email',   message = '$message'   WHERE id_support = $supporta";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                                }
                                if (isset($_POST['addsup'])){ 
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:40px' class='formred__input' type='text' name='id_user' value='' placeholder='ID' >
                                <input style='width:120px' name='id_user' class='formred__input' type='text' value=''  placeholder='ID_user'>
                                <input style='width:250px' name='email'class='formred__input'  type='text' value='' placeholder='Почта'>
                                <textarea name='message' class='formred__input' rows='3'style='width:464px;'></textarea>
                                <input style='width:140px;   background: green;' class='formred__btn' type='submit' name='addsupport' value='Добавить'>
                                </form>
                                ";
                                }
                                if (isset($_POST['addsupport'])){
                                    $id_user = $_POST["id_user"];
                                    $email  = $_POST["email"];
                                    $message = $_POST["message"];
                                    $sqlInsert="INSERT INTO `support`(`id_user`,`email`,`message`) VALUES ('$id_user','$email','$message')";
                                    $result=mysqli_query($mysql,$sqlInsert);
                                    header("Location: ./adminka.php");
                                    }





                            ?>
                    </div>
                    <div class="predlosh">
                            <h3 class="adminka__nametb">Подписавшиеся на рассылку</h3>
                            <?php 
                            $mysql=mysqli_connect('localhost','root','','horizon');
                            $_provid = ("SELECT * FROM `predlosh` ");
                            $result = mysqli_query($mysql,$_provid);
                    
                            ?>
                            <table class="table" >
                            <tr class="stroke-up">
                                <td class="stroke-up__title"style='width:40px' >id_predlosh</td>
                                <td class="stroke-up__title">id_user</td>
                                <td class="stroke-up__title">name</td>
                                <td class="stroke-up__title">email</td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                            </tr>
                            <?php 
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='stroke-down'>";
                                echo "<td class='down-form__text'>" . $row["id_predlosh"] . "</td>";
                                $predlosha = $row["id_predlosh"];
                                echo "<td class='down-form__text'>" . $row["id_user"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["name"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["email"] . "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='id_predlosh' value='$predlosha'>";
                                echo "<input style='width:100px' class='del-button' type='submit' name='delpred' value='Удалить'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='predred' value='$predlosha'>";
                                echo "<input style='width:100px;   background: #EECF48;' class='del-button' type='submit' name='editpred' value='Редакт'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input style='width:100px;   background: green;' class='del-button' type='submit' name='addpred' value='Добавить'>";
                                echo "</form>";

                                echo "</td>";
                                echo "</tr>";
                            }

                            ?>
                            </table>

                            <?php

                            if (isset($_POST['delpred'])){
                                $mysql=mysqli_connect('localhost','root','','horizon');
                                $sqlInsert="DELETE FROM `predlosh` WHERE `id_predlosh`= $predlosha";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                            }
                            @$predlosha = $_POST['predred'];
                            if (isset($_POST['editpred'])){ 
                                $sqlSelect = "SELECT * FROM predlosh WHERE id_predlosh = $predlosha";
                                $result=mysqli_query($mysql,$sqlSelect);
                                $row = mysqli_fetch_assoc($result);
                                $id_user = $row["id_user"];
                                $name = $row["name"];
                                $email  = $row["email"];

                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:40px' class='formred__input' type='text' name='id_predlosh' value='$predlosha' >
                                <input style='width:120px' name='id_user' class='formred__input' type='text' value='$id_user'  >
                                <input style='width:120px' name='name' class='formred__input' type='text' value='$name' >
                                <input style='width:150px' name='email' class='formred__input' type='text' value='$email' >
                                <input style='width:140px;   background: #EECF48;' class='formred__btn' type='submit' name='savepred' value='Сохранить'>
                                </form>
                                ";
                            }
                            if (isset($_POST['savepred'])){
                                $predlosha = $_POST["id_predlosh"];
                                $id_user = $_POST["id_user"];
                                if ($id_user === '') {
                                    $sqlInsert = "UPDATE predlosh   SET  name = '$name',   email = '$email'   WHERE id_predlosh = $predlosha";
                                } else {
                                    $sqlInsert = "UPDATE predlosh   SET id_user = '$id_user',  name = '$name',   email = '$email'   WHERE id_predlosh = $predlosha";
                                }
                                $name = $_POST["name"];
                                $email = $_POST["email"];

                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                                }
                                if (isset($_POST['addpred'])){ 
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:40px' class='formred__input' type='text' name='id_predlosh' value='' placeholder='ID' >
                                <input style='width:120px' name='id_user' class='formred__input' type='text' value=''  placeholder='ID_user'>
                                <input style='width:250px' name='name'class='formred__input'  type='text' value='' placeholder='Имя'>
                                <input style='width:250px' name='email'class='formred__input'  type='text' value='' placeholder='Почта'>
                                <input style='width:140px;   background: green;' class='formred__btn' type='submit' name='addpredlosh' value='Добавить'>
                                </form>
                                ";
                                }
                                if (isset($_POST['addpredlosh'])){
                                    $id_user = $_POST["id_user"];

                                    $name = $_POST["name"];

                                    $email  = $_POST["email"];
                                    if ($id_user === '') {
                                        $sqlInsert = "INSERT INTO predlosh(id_user, name, email) VALUES (NULL, '$name', '$email')";
                                    } else {
                                        $sqlInsert = "INSERT INTO predlosh(id_user, name, email) VALUES ('$id_user', '$name', '$email')";
                                    }
                                  
                                    $result=mysqli_query($mysql,$sqlInsert);
                                    header("Location: ./adminka.php");
                                    }





                            ?>
                    </div>
                    <div class="orders">
                            <h3 class="adminka__nametb">Брони</h3>
                            <?php 
                            $mysql=mysqli_connect('localhost','root','','horizon');
                            $_provid = ("SELECT * FROM `orders` ");
                            $result = mysqli_query($mysql,$_provid);
                    
                            ?>
                            <table class="table" >
                            <tr class="stroke-up">
                                <td class="stroke-up__title"style='width:40px' >id_order</td>
                                <td class="stroke-up__title">id_travel</td>
                                <td class="stroke-up__title">id_user</td>
                                <td class="stroke-up__title">time</td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                            </tr>
                            <?php 
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='stroke-down'>";
                                echo "<td class='down-form__text'>" . $row["id_order"] . "</td>";
                                $ordera = $row["id_order"];
                                echo "<td class='down-form__text'>" . $row["id_travel"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["id_user"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["time"] . "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='id_order' value='$ordera'>";
                                echo "<input style='width:100px' class='del-button' type='submit' name='delord' value='Удалить'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='ordred' value='$ordera'>";
                                echo "<input style='width:100px;   background: #EECF48;' class='del-button' type='submit' name='editord' value='Редакт'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input style='width:100px;   background: green;' class='del-button' type='submit' name='addord' value='Добавить'>";
                                echo "</form>";

                                echo "</td>";
                                echo "</tr>";
                            }

                            ?>
                            </table>

                            <?php

                            if (isset($_POST['delord'])){
                                $mysql=mysqli_connect('localhost','root','','horizon');
                                $sqlInsert="DELETE FROM `orders` WHERE `id_order`= $ordera";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                            }
                            @$ordera = $_POST['ordred'];
                            if (isset($_POST['editord'])){ 
                                $sqlSelect = "SELECT * FROM orders WHERE id_order = $ordera";
                                $result=mysqli_query($mysql,$sqlSelect);
                                $row = mysqli_fetch_assoc($result);
                                $id_travel = $row["id_travel"];
                                $id_user = $row["id_user"];
                                $time = $row["time"];

                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:40px' class='formred__input' type='text' name='id_order' value='$ordera' >
                                <input style='width:120px' name='id_travel' class='formred__input' type='text' value='$id_travel'  >
                                <input style='width:120px' name='id_user' class='formred__input' type='text' value='$id_user' >
                                <input style='width:150px' name='time' class='formred__input' type='text' value='$time' >
                                <input style='width:140px;   background: #EECF48;' class='formred__btn' type='submit' name='saveord' value='Сохранить'>
                                </form>
                                ";
                            }
                            if (isset($_POST['saveord'])){
                                $ordera = $_POST["id_order"];
                                $id_travel = $_POST["id_travel"];
                                $id_user = $_POST["id_user"];
                                $time = $_POST["time"];;
                                $sqlInsert = "UPDATE orders   SET id_travel = '$id_travel',  id_user = '$id_user',   time = '$time'   WHERE id_order = $ordera";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                                }
                                if (isset($_POST['addord'])){ 
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:40px' class='formred__input' type='text' name='id_predlosh' value='' placeholder='ID' >
                                <input style='width:120px' name='ID_travel' class='formred__input' type='text' value=''  placeholder='ID_travel'>
                                <input style='width:250px' name='ID_user'class='formred__input'  type='text' value='' placeholder='ID_user'>
                                <input style='width:250px' name='time'class='formred__input'  type='text' value='' placeholder='time'>
                                <input style='width:140px;   background: green;' class='formred__btn' type='submit' name='addorder' value='Добавить'>
                                </form>
                                ";
                                }
                                if (isset($_POST['addorder'])){
                                    $id_travel = $_POST["ID_travel"];
                                    $id_user = $_POST["ID_user"];

                                    $time = $_POST["time"];

                                    $sqlInsert = "INSERT INTO orders(id_travel, id_user, time) VALUES ('$id_travel', '$id_user', '$time')";
                                    $result=mysqli_query($mysql,$sqlInsert);
                                    header("Location: ./adminka.php");
                                    }





                            ?>
                    </div>
                    <div class="infoorder">
                            <h3 class="adminka__nametb">Брони:подробно</h3>
                            <?php 
                            $mysql=mysqli_connect('localhost','root','','horizon');
                            $_provid = ("SELECT * FROM `infoorder` ");
                            $result = mysqli_query($mysql,$_provid);
                    
                            ?>
                            <table class="table" >
                            <tr class="stroke-up">
                            <td class="stroke-up__title"style='width:40px' >id_infoorder</td>
                                <td class="stroke-up__title"style='width:40px' >id_order</td>
                                <td class="stroke-up__title">id_travel</td>
                                <td class="stroke-up__title">id_user</td>
                                <td class="stroke-up__title">cost</td>
                                <td class="stroke-up__title">dataotp</td>
                                <td class="stroke-up__title">dataprib</td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                            </tr>
                            <?php 
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='stroke-down'>";
                                echo "<td class='down-form__text'>" . $row["id_infoorder"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["id_order"] . "</td>";
                                $infoordera = $row["id_infoorder"];
                                echo "<td class='down-form__text'>" . $row["id_travel"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["id_user"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["cost"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["dataotpr"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["dataprib"] . "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='id_inorder' value='$infoordera'>";
                                echo "<input style='width:100px' class='del-button' type='submit' name='delinord' value='Удалить'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='inordred' value='$infoordera'>";
                                echo "<input style='width:100px;   background: #EECF48;' class='del-button' type='submit' name='editinord' value='Редакт'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input style='width:100px;   background: green;' class='del-button' type='submit' name='addinord' value='Добавить'>";
                                echo "</form>";

                                echo "</td>";
                                echo "</tr>";
                            }

                            ?>
                            </table>

                            <?php

                            if (isset($_POST['delinord'])){
                                $mysql=mysqli_connect('localhost','root','','horizon');
                                $sqlInsert="DELETE FROM `infoorder` WHERE `id_infoorder`= $infoordera";
                                $result=mysqli_query($mysql,$sqlInsert);

                                header("Location: ./adminka.php");
                            }
                            @$infoordera = $_POST['inordred'];
                            if (isset($_POST['editinord'])){ 
                                $sqlSelect = "SELECT * FROM infoorder WHERE id_infoorder = $infoordera";
                                $result=mysqli_query($mysql,$sqlSelect);
                                $row = mysqli_fetch_assoc($result);
                                $id_order = $row["id_order"];
                                $id_user = $row["id_user"];
                                $id_travel = $row["id_travel"];
                                $cost = $row["cost"];
                                $dataotpr = $row["dataotpr"];
                                $dataprib = $row["dataprib"];

                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:40px' class='formred__input' type='text' name='id_infoorder' value='$infoordera'>
                                <input style='width:120px' name='id_order' class='formred__input' type='text' value='$id_order'  >
                                <input style='width:120px' name='id_user' class='formred__input' type='text' value='$id_user' >
                                <input style='width:120px' name='id_travel' class='formred__input' type='text' value='$id_travel'  >
                                <input style='width:120px' name='cost' class='formred__input' type='text' value='$cost'  >
                                <input style='width:150px' name='dataotpr' class='formred__input' type='text' value='$dataotpr' >
                                <input style='width:150px' name='dataprib' class='formred__input' type='text' value='$dataprib' >
                                <input style='width:140px;   background: #EECF48;' class='formred__btn' type='submit' name='saveinord' value='Сохранить'>
                                </form>
                                ";
                            }
                            if (isset($_POST['saveinord'])){
                                $infoordera = $_POST["id_infoorder"];
                                $id_order = $_POST["id_order"];
                                $id_user = $_POST["id_user"];
                                $id_travel = $_POST["id_travel"];
                                $cost = $_POST["cost"];
                                $dataotpr = $_POST["dataotpr"];
                                $dataprib = $_POST["dataprib"];
                                $sqlInsert = "UPDATE infoorder   SET id_order = '$id_order',  id_user = '$id_user', id_travel = '$id_travel' , cost = '$cost' , dataotpr = '$dataotpr' , dataprib = '$dataprib'  WHERE id_infoorder = $infoordera";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                                }
                                if (isset($_POST['addinord'])){ 
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:40px' class='formred__input' type='text' name='id_infoorder' value='' placeholder='ID' >
                                <input style='width:120px' name='ID_order' class='formred__input' type='text' value=''  placeholder='ID_order'>
                                <input style='width:120px' name='ID_travel' class='formred__input' type='text' value=''  placeholder='ID_travel'>
                                <input style='width:250px' name='ID_user'class='formred__input'  type='text' value='' placeholder='ID_user'>
                                <input style='width:250px' name='cost'class='formred__input'  type='text' value='' placeholder='Цена'>
                                <input style='width:250px' name='dataotpr'class='formred__input'  type='text' value='' placeholder='Дата отправки'>
                                <input style='width:250px' name='dataprib'class='formred__input'  type='text' value='' placeholder='Дата прибытия'>
                                <input style='width:140px;   background: green;' class='formred__btn' type='submit' name='addinfoorder' value='Добавить'>
                                </form>
                                ";
                                }
                                if (isset($_POST['addinfoorder'])){
                                    $id_order = $_POST["id_order"];
                                    $id_user = $_POST["id_user"];
                                    $id_travel = $_POST["id_travel"];
                                    $cost = $_POST["cost"];
                                    $dataotpr = $_POST["dataotpr"];
                                    $dataprib = $_POST["dataprib"];

                                    $sqlInsert = "INSERT INTO infoorder(id_order, id_user,id_travel ,cost,dataotpr,dataprib) VALUES ('$id_order', '$id_user', '$id_travel','$cost','$dataotpr','$dataprib')";
                                    $result=mysqli_query($mysql,$sqlInsert);
                                    header("Location: ./adminka.php");
                                    }





                            ?>
                    </div>
                    <div class="insurance">
                            <h3 class="adminka__nametb">Заказы страховки</h3>
                            <?php 
                            $mysql=mysqli_connect('localhost','root','','horizon');
                            $_provid = ("SELECT * FROM `insurance` ");
                            $result = mysqli_query($mysql,$_provid);
                    
                            ?>
                            <table class="table" >
                            <tr class="stroke-up">
                            <td class="stroke-up__title"style='width:40px' >id_insurance</td>
                                <td class="stroke-up__title">id_user</td>
                                <td class="stroke-up__title">fio</td>
                                <td class="stroke-up__title">email</td>
                                <td class="stroke-up__title">number</td>
                                <td class="stroke-up__title">daterosh</td>
                                <td class="stroke-up__title">zagran</td>
                                <td class="stroke-up__title">summ</td>
                                <td class="stroke-up__title">dateprib</td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                                <td class="stroke-up__title" style='width:80px'></td>
                            </tr>
                            <?php 
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr class='stroke-down'>";
                                echo "<td class='down-form__text'>" . $row["id_insurance"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["id_user"] . "</td>";
                                $insurance = $row["id_insurance"];
                                echo "<td class='down-form__text'>" . $row["fio"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["email"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["number"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["daterosh"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["zagran"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["summ"] . "</td>";
                                echo "<td class='down-form__text'>" . $row["dateprib"] . "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='id_insurance' value='$insurance'>";
                                echo "<input style='width:100px' class='del-button' type='submit' name='delinsu' value='Удалить'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input type='hidden' name='insured' value='$insurance'>";
                                echo "<input style='width:100px;   background: #EECF48;' class='del-button' type='submit' name='editinsu' value='Редакт'>";
                                echo "</form>";
                                echo "</td>";
                                echo "<td>";
                                echo "<form method='POST'>";
                                echo "<input style='width:100px;   background: green;' class='del-button' type='submit' name='addinsu' value='Добавить'>";
                                echo "</form>";

                                echo "</td>";
                                echo "</tr>";
                            }

                            ?>
                            </table>

                            <?php

                            if (isset($_POST['delinsu'])){
                                $mysql=mysqli_connect('localhost','root','','horizon');
                                $sqlInsert="DELETE FROM `insurance` WHERE `id_insurance`= $insurance";
                                $result=mysqli_query($mysql,$sqlInsert);

                                header("Location: ./adminka.php");
                            }
                            @$insurance = $_POST['insured'];
                            if (isset($_POST['editinsu'])){ 
                                $sqlSelect = "SELECT * FROM insurance WHERE id_insurance = $insurance";
                                $result=mysqli_query($mysql,$sqlSelect);
                                $row = mysqli_fetch_assoc($result);
                                $id_user = $row["id_user"];
                                $fio = $row["fio"];
                                $email = $row["email"];
                                $number = $row["number"];
                                $daterosh = $row["daterosh"];
                                $zagran = $row["zagran"];
                                $summ = $row["summ"];
                                $dateprib = $row["dateprib"];

                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:40px' class='formred__input' type='text' name='id_insurance' value='$insurance'>
                                <input style='width:120px' name='id_user' class='formred__input' type='text' value='$id_user'  >
                                <input style='width:120px' name='fio' class='formred__input' type='text' value='$fio' >
                                <input style='width:120px' name='email' class='formred__input' type='text' value='$email'  >
                                <input style='width:120px' name='number' class='formred__input' type='text' value='$number'  >
                                <input style='width:150px' name='daterosh' class='formred__input' type='text' value='$daterosh' >
                                <input style='width:150px' name='zagran' class='formred__input' type='text' value='$zagran' >
                                <input style='width:150px' name='summ' class='formred__input' type='text' value='$summ' >
                                <input style='width:150px' name='dateprib' class='formred__input' type='text' value='$dateprib' >
                                <input style='width:140px;   background: #EECF48;' class='formred__btn' type='submit' name='saveinsu' value='Сохранить'>
                                </form>
                                ";
                            }
                            if (isset($_POST['saveinsu'])){
                                $insurance = $_POST["id_insurance"];
                                $id_user = $_POST["id_user"];
                                $fio = $_POST["fio"];
                                $email = $_POST["email"];
                                $number = $_POST["number"];
                                $daterosh = $_POST["daterosh"];
                                $zagran = $_POST["zagran"];
                                $summ = $_POST["summ"];
                                $dateprib = $_POST["dateprib"];
                                $sqlInsert = "UPDATE insurance   SET id_user = '$id_user',  fio = '$fio', email = '$email' , number = '$number' , daterosh = '$daterosh' , zagran = '$zagran', summ = '$summ', dateprib = '$dateprib'  WHERE id_insurance = $insurance";
                                $result=mysqli_query($mysql,$sqlInsert);
                                header("Location: ./adminka.php");
                                }
                                if (isset($_POST['addinsu'])){ 
                                echo"
                                <form class='formred' method='POST'>
                                <input readonly style='width:40px' class='formred__input' type='text' name='id_insurance' value='' placeholder='ID' >
                                <input style='width:30px' name='id_user' class='formred__input' type='text' value=''  placeholder='id_user'>
                                <input style='width:250px' name='fio' class='formred__input' type='text' value=''  placeholder='ФИО'>
                                <input style='width:180px' name='email'class='formred__input'  type='text' value='' placeholder='Почта'>
                                <input style='width:150px' name='number'class='formred__input'  type='text' value='' placeholder='Телефон'>
                                <input style='width:160px' name='daterosh'class='formred__input'  type='text' value='' placeholder='Дата рождения'>
                                <input style='width:150px' name='zagran'class='formred__input'  type='text' value='' placeholder='ЗагранПаспорт'>
                                <input style='width:180px' name='summ'class='formred__input'  type='text' value='' placeholder='Сумма в рублях'>
                                <input style='width:150px' name='dateprib'class='formred__input'  type='text' value='' placeholder='Дата прибытия'>
                                <input style='width:140px;   background: green;' class='formred__btn' type='submit' name='addinsur' value='Добавить'>
                                </form>
                                ";
                                }
                                if (isset($_POST['addinsur'])){
                                    $id_user = $_POST["id_user"];
                                    $fio = $_POST["fio"];
                                    $email = $_POST["email"];
                                    $number = $_POST["number"];
                                    $daterosh = $_POST["daterosh"];
                                    $zagran = $_POST["zagran"];
                                    $summ = $_POST["summ"];
                                    $dateprib = $_POST["dateprib"];
                                    $sqlInsert = "INSERT INTO insurance (id_user, fio,email ,number,daterosh,zagran,summ,dateprib) VALUES ('$id_user', '$fio', '$email','$number','$daterosh','$zagran','$summ','$dateprib')";
                                    $result=mysqli_query($mysql,$sqlInsert);
                                    header("Location: ./adminka.php");
                                    }





                            ?>
                    </div>
            </div>
        </div>
    </section>


    <div id="footer"></div>
    <script type="module" src="adminka.js"></script>
    <?php ob_end_flush();?>
</body>
</html>