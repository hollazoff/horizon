<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/horizon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./scss/style.css">
    <title>Horizon</title>
    <link >
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
      <ul class="slides">
        <li class="slide showing">         
        <h2 class="mald-title">Мальдивы</h2>
        <p class="mald-text">Бирюзовые воды и<br> белоснежно чистые пляжи</p>
        <img class="slide-img" src="./public/slide1.png">
        <div class="slide-button">
          <a href="bron.php" class="slide-btn">Выбрать место</a>
      </div>
        </li>
        <li class="slide">
          <h2 class="mald-title">Геленджик</h2>
          <p class="mald-text">Утопающий в зелени курорт<br> у подножия гор</p>
        <img class="slide-img" src="./public/slide2.png">
        <div class="slide-button">
        <a href="bron.php" class="slide-btn">Выбрать место</a>
      </div>
        </li>
        <li class="slide">
          <h2 class="mald-title">Тайланд</h2>
          <p class="mald-text">Яркие краски, тропики и душевное<br> умиротворение</p>
          <img class="slide-img" src="./public/slide3.png">
          <div class="slide-button">
          <a href="bron.php" class="slide-btn">Выбрать место</a>
        </div>
        </li>
        <li class="slide">
          <h2 class="mald-title">Куба</h2>
          <p class="mald-text">Райский уголок в Карибском море с<br> белоснежными пляжами</p>
          <img class="slide-img" src="./public/slide4.png">
          <div class="slide-button">
          <a href="bron.php" class="slide-btn">Выбрать место</a>
        </div>
        </li>
      </ul>
    </div>
  </section>
  <section>
      <div class="countainer">
        <div class="block-cards">
          <h3 class="block-cards__title">Выгодные предложения</h3>
          <div class="cards">
          <?php
        $mysql=mysqli_connect('localhost','root','','horizon');
        @$OPIS = $_SESSION['OPIS'];


        $_provid = ("    SELECT 
        Travels.img, 
        Travels.place, 
        Travels.title, 
        Travels.mesta, 
        Travels.dataotpr, 
        Travels.dataprib, 
        traveltype.title AS traveltype, 
        Travels.cena
    FROM Travels
    JOIN traveltype ON Travels.id_traveltype = traveltype.id_traveltype
    ORDER BY Travels.cena ASC
    LIMIT 4;
     ");
        $result = mysqli_query($mysql,$_provid);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<a class='card' href='bron.php'>";
          echo "  <img class='card__img' src='./public/";
          echo $row["img"];
          echo " '>";
          echo "  <div class='card-place'>";
          echo "    <img class='card-place__icon' src='./public/mesto.svg'>";
          echo "    <p class='card-place__title'>";
          echo $row["place"];
          echo "  </p>";
          echo "  </div>";
          echo "  <div class='info'>";
          echo "    <p class='info__title'>";
          echo $row["title"];
          echo "  </p>";
          echo "    <div class='block-stars'>";
          echo "      <img class='block-stars__star' src='./public/star.svg'>";
          echo "      <img class='block-stars__star' src='./public/star.svg'>";
          echo "      <img class='block-stars__star' src='./public/star.svg'>";
          echo "      <img class='block-stars__star' src='./public/star.svg'>";
          echo "      <img class='block-stars__star' src='./public/star.svg'>";
          echo "    </div>";
          echo "  </div>";
          echo "  <p class='card__kolvo'>Места: ";
          echo $row["mesta"];
          echo "  </p>";
          echo "  <p class='card__timeotp'>Дата отправки: ";
          echo date("d.m.Y", strtotime($row["dataotpr"]));
          echo "  </p>";
          echo "  <p class='card__timeprib'>Дата прибытия: ";
          echo date("d.m.Y", strtotime($row["dataprib"]));
          echo "  </p>";
          echo "  <p class='card__type'>";
          echo $row["traveltype"];
          echo "  </p>";
          echo "  <p class='card__minicena'>Цена от</p>";
          echo "  <p class='card__cena'>";
          $formattedPrice = number_format($row['cena'], 2, ',', ' ');
          echo $formattedPrice;
          echo "  ₽</p>";
          echo "</a>";
      }
        ?>
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="countainer">
        <div class="block-advantage">
          <p class="block-advantage__title">Почему мы?</p>
          <div class="advantages">
              <div class="support">
                <img class="support__icon" src="./public/support.svg">
                <div class="support-info">
                  <p class="support-info__title">Поддержка</p>
                  <p class="support-info__text">
                    Персональное сопровождение на всех этапах путешествия
                  </p>
                </div>
              </div>
              <div class="benefit">
                <img class="benefit__icon" src="./public/benefit.svg">
                <div class="benefit-info">
                  <p class="benefit-info__title">Выгодные цены</p>
                  <p class="benefit-info__text">
                    Лучшие предложения по доступным тарифам
                  </p>
                </div>
              </div>
              <div class="defender">
                <img class="defender__icon" src="./public/defender.svg">
                <div class="defender-info">
                  <p class="defender-info__title">Надежность</p>
                  <p class="defender-info__text">
                    Многолетний опыт организации туров любой сложности
                  </p>
                </div>
              </div>
              <div class="quality">
                <img class="quality__icon" src="./public/quality.svg">
                <div class="quality-info">
                  <p class="quality-info__title">Качество</p>
                  <p class="quality-info__text">
                    Изысканный сервис, дарящий незабываемые моменты отдыха
                  </p>
                </div>
              </div>
              <div class="innovation">
                <img class="innovation__icon" src="./public/innovation.svg">
                <div class="innovation-info">
                  <p class="innovation-info__title">Инновации</p>
                  <p class="innovation-info__text">
                  Идем в ногу со временем, предлагая современный уровень сервиса
                  </p>
                </div>
              </div>
              <div class="flexibility">
                <img class="flexibility__icon" src="./public/flexibillity.svg">
                <div class="flexibility-info">
                  <p class="flexibility-info__title">Гибкость</p>
                  <p class="flexibility-info__text">
                  Легко подстраиваемся под любые запросы и пожелания
                  </p>
                </div>
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
          <form class="form" action="./php/predlosh.php" method="post">
            <input class="form__name" type="text" name="name" id="name" placeholder="Ваше имя"/>
            <input class="form__email" type="email" name="email" id="email" placeholder="Ваша почта"/>

            <?php 
      @$_email = $_SESSION["userinfo"]['email'];
      $mysql=mysqli_connect('localhost','root','','horizon');
      $_provlog = mysqli_query($mysql,"SELECT * FROM `predlosh` WHERE `email` = '$_email' ");
      if(mysqli_num_rows($_provlog) >= 1){
        echo "<input class='form__btn' type='submit' name='subscribe'  value='Вы подписаны' readonly style='background:#EECF48' disabled/>";
      }
      else{
        echo "      <input class='form__btn' type='submit' name='subscribe' id='subscribe' value='Подписаться' />";
      }


      ?>
            <p class="predlosh"></p>
          </form>
        </div>
      </div>
    </section>
    <div id="footer"></div>
    <script type="module" src="main.js"></script>
  </body>
</html>
