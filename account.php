<?php
session_start();
if($_SESSION["userinfo"] ["email"] == ""){
  header("Location: ./index.php");
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/horizon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./scss/account.css">
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
        <div class="account">
          <div class="account-action">
            <div class="btn">
              <?php if($_SESSION["userinfo"]['role'] == '2'){
                echo"<div class='admin-button'>";
                echo"<a href='adminka.php' class='admin-btn'>Админка</a>";
                echo"</div>";
              }
              else{
                echo"<div class='account-button'>";
                echo"<a href='#' class='account-btn'>Мой аккаунт</a>";
                echo"</div>";
              }

              ?>
              <div class="quit-button">
                <a href="?quet=1" class="quit-btn" >Выйти</a>
                <?php     if (isset($_GET['quet'])){
                session_unset();
        header("Location: ./index.php");
      }?>
              </div>
            </div>
            <div class="counter">
              <p class="counter__text">Мои поездки</p>
              <p class="counter__num"><?php echo $_SESSION["userinfo"]["poezdki"]?></p>
            </div>
          </div>
          <div class="info">
            <p class="info__title">Персональная информация</p>
            <div class="FIO">
              <div class="FIO-name">
                <p class="FIO-name__title">Имя:</p>
                <p class="FIO-name__text"><?php echo $_SESSION["userinfo"]["name"]?></p>
              </div>
              <div class="FIO-surname">
                <p class="FIO-surname__title">Фамилия:</p>
                <p class="FIO-surname__text"><?php echo $_SESSION["userinfo"]["surname"]?></p>
              </div>
            </div>
            <div class="info-email">
              <p class="info-email__title">Электронная почта:</p>
              <p class="info-email__text"><?php echo$_SESSION["userinfo"]["email"]?></p>
            </div>
            <div class="dr">
              <div class="dr-bertday">
                <p class="dr-bertday__title">ID аккаунта:</p>
                <p class="dr-bertday__text"><?php echo $_SESSION["userinfo"]["id_user"]?></p>
              </div>
              <div class="dr-num">
                <p class="dr-num__title">Номер телефона:</p>
                <p class="dr-num__text"><?php echo $_SESSION["userinfo"]["number"]?></p>
              </div>
            </div>
            <form class="password" action="./php/oldnew.php" method="post">
              <div class="password-old">
                <p class="password-old__title">Старый пароль:</p>
                <input name="oldpass" type="text" class="password-old__text" placeholder="****************">
              </div>
              <div class="password-new">
                <p class="password-new__title">Новый пароль:</p>
                <input name="newpass" type="text" class="password-new__text" placeholder="****************">
              </div>
              <input type="submit" class="password__btn" value="Сменить пароль" >
            </form>
          </div>
          <div class="booking">
            <p class="booking__title">Мои брони</p>
            <div class="cards">
            <?php
            $user = $_SESSION['userinfo']['id_user'];
        $mysql=mysqli_connect('localhost','root','','horizon');
          $_provid = ("    SELECT 
          Travels.title, 
          Travels.place, 
          Travels.mesta, 
          Travels.dataotpr, 
          Travels.dataprib, 
          Travels.cena,
          orders.id_user
      FROM orders
      JOIN Travels ON orders.id_travel = Travels.id_travel
      WHERE orders.id_user = $user
        AND Travels.dataprib > CURDATE()
        ");
        $result = mysqli_query($mysql,$_provid);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='card'>";
          echo "<div class='first'>";
          echo "  <p class='first__name'>";
          echo $row["title"];
          echo "  </p>";
          echo "  <div class='card-place'>";
          echo "    <img class='card-place__icon' src='./public/mesto.svg'>";
          echo "    <p class='card-place__title'>";
          echo $row["place"];
          echo "  </p>";
          echo "  </div>";
          echo "</div>";
          echo "<div class='second'>";
          echo "  <p class='second__mesta'>Места:";
          echo $row["mesta"];
          echo "  </p>";
          echo "  <p class='second__time'>Время:";
          echo date("d.m.Y", strtotime($row["dataotpr"]));
          echo "-";
          echo date("d.m.Y", strtotime($row["dataprib"]));
          echo "  </p>";
          echo "</div>";
          echo "  <p class='card__cena'>";
          $formattedPrice = number_format($row['cena'], 2, ',', ' ');
          echo $formattedPrice;
          echo "  ₽</p>";
          echo "</div>";
      }
        ?>

    
            </div>
          </div>
        </div>
      </div>
    </section>
    <section>
<div class="countainer">
  <div class="block-form">
    <p class="block-form__title">Лучшие предложения!</p>
    <p class="block-form__text">Уникальные предложения только для избранных путешественников. 
      Станьте одним из них!</p>
      <?php 
      $_email = $_SESSION["userinfo"]['email'];
      $mysql=mysqli_connect('localhost','root','','horizon');
      $_provlog = mysqli_query($mysql,"SELECT * FROM `predlosh` WHERE `email` = '$_email' ");
      if(mysqli_num_rows($_provlog) >= 1){
        echo "<input class='form__btn' type='submit' name='subscribe'  value='Вы подписаны' readonly style='background:#EECF48' />";
      }
      else{
        echo "      <form action='./php/predloshaccc.php' method='post'>";
        echo "      <input class='form__btn' type='submit' name='subscribe' id='subscribe' value='Подписаться' />";
        echo "      </form>";
      }


      ?>




  </div>
</div>
</section>
<div id="footer"></div>
    <script type="module" src="account.js"></script>
  </body>
</html>