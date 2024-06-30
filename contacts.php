<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/horizon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./scss/cont.css">
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
    <div id="contacts"></div>
    <div id="footer"></div>
    <script type="module" src="contacts.js"></script>
  </body>
</html>