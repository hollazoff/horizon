<?php
session_start();
$idtravel = @$_POST['subscribe1'];

if ($idtravel == ''){
  $crypt = $_SESSION["travel"];
}
else{
  $crypt = $idtravel;
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/horizon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./scss/card.css">
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
                <?php
                if(@$_SESSION["userinfo"] ["email"] == ""){
                    echo "<a class='button-all' href='vhodreg.php'>";
                    echo "<img class='logo' src='./public/profil.svg'>";
                      echo "<p class='button-all__btn' >Войти</p>";
                      echo "</a>";
                  }
                  else{
                    echo "<a class='button-all' href='account.php'>";
                    echo "<img class='logo' src='./public/profil.svg'>";
                      echo "<p class='button-all__btn' >";
                      echo $_SESSION["userinfo"]["name"];
                      echo "</p>";
                      echo "</a>";
                  }
                  ?>
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
  <div class="block-travel">
    <div class="travel">
    <?php
        $mysql=mysqli_connect('localhost','root','','horizon');

        $_provid = "SELECT 
        Travels.id_travel,
        Travels.img, 
        Travels.place, 
        Travels.title, 
        Travels.mesta, 
        Travels.dataotpr, 
        Travels.dataprib, 
        traveltype.title AS traveltype, 
        Travels.cena,
        Travels.description
    FROM Travels
    JOIN traveltype ON Travels.id_traveltype = traveltype.id_traveltype
    WHERE Travels.id_travel = $crypt";

$result = mysqli_query($mysql, $_provid);
while ($row = mysqli_fetch_assoc($result)) {
          echo " <div class='travel-other'> ";
          echo "        <img class='travel-other__img' src='./public/" . $row['img'] . "' >";
          echo "        <div class='travel-other-map'> ";
          echo "          <div class='map-button'> ";
          echo "            <a href='#' class='map-btn'>Посмотреть по карте</a> ";
          echo "          </div> ";
          echo "        </div> ";
          echo "      </div> ";
          echo "      <div class='travel-info'> ";
          echo "        <div class='first'> ";
          echo "          <h3 class='first__name'>" . $row['title'] . "</h3> ";
          echo "          <p class='first__type'>" . $row['traveltype'] . "</p> ";
          echo "        </div>";
          echo "        <div class='place'> ";
          echo "          <img class='place__icon' src='./public/mesto.svg'> ";
          echo "          <p class='place__title'>" . $row['place'] . "</p> ";
          echo "        </div> ";
          echo "        <p class='text'> ";
          echo "          " . $row['description'] . " ";
          echo "        </p> ";
          echo "        <div class='parametrs'> ";
          echo "          <div class='parametrs-left'> ";
          echo "            <p class='parametrs-left__kolvo'>Места: " . $row['mesta'] . "</p> ";
          echo "            <p class='parametrs-left__timeotp'>Дата отправки: " . date("d.m.Y", strtotime($row['dataotpr'])) . "</p> ";
          echo "            <p class='parametrs-left__timeprib'>Дата прибытия: " . date("d.m.Y", strtotime($row['dataprib'])) . "</p> ";
          echo "          </div> ";
          echo "          <div class='parametrs-right'> ";
          echo "            <div class='block-stars'> ";
          echo "              <img class='block-stars__star' src='./public/star.svg'> ";
          echo "              <img class='block-stars__star' src='./public/star.svg'> ";
          echo "              <img class='block-stars__star' src='./public/star.svg'> ";
          echo "              <img class='block-stars__star' src='./public/star.svg'>";
          echo "              <img class='block-stars__star' src='./public/star.svg'>";
          echo "            </div>";
          echo "            <p class='parametrs-right__minicena'>Цена от</p>";
          echo "            <p class='parametrs-right__cena'>" . number_format($row['cena'], 2, ',', ' ') . " ₽</p>";
          echo "          </div>";
          echo "        </div>";


          if(empty($_SESSION["userinfo"]["id_user"])){
            $mysql=mysqli_connect('localhost','root','','horizon');
            $_provlog1 = mysqli_query($mysql,"SELECT * FROM `orders` WHERE `id_travel` = '$crypt'");
            if(mysqli_num_rows($_provlog1) >= 1){
              
              echo "<input  class='buy-btn' type='submit' name='subscribe'  value='Авторизуйтесь' readonly style='background:#EECF48' />";
              }
            }
            else{
              $mysql=mysqli_connect('localhost','root','','horizon');
              $iduser = @$_SESSION["userinfo"]["id_user"];
              $_provlog = mysqli_query($mysql,"SELECT * FROM `orders` WHERE `id_travel` = '$crypt' AND  `id_user` = '$iduser' ");
              if(mysqli_num_rows($_provlog) >= 1){
            
                echo "<input  class='buy-btn' type='submit' name='subscribe'  value='Забронировано' readonly style='background:#EECF48' />";
              }
              else{
                echo "        <form class='buy-button' action='./php/cardlogic.php' method='POST'>";
                echo "          <input  type='hidden' name='sub2'  value='$crypt'/>";
                echo "          <input type='submit' class='buy-btn' name='sub' value='Забронировать'/>";
                echo "        </form>";
              }

            }




    
    


          echo "      </div>";

      }
        ?>
    </div>
  </div>
</div>
</section>
    <div id="footer"></div>
    <script type="module" src="main.js"></script>
  </body>
</html>