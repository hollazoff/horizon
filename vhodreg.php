<?php
session_start();


?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/horizon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./scss/vhodreg.css">
    <title>Horizon</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
        <div class="block">
          <div class="auth">
            <p class="auth__title">Вход</p>
            <hr class="auth__miniline">
            <form class="form" action="./php/auth.php" method="post">
              <input required class="form__email" type="email" name="email"  placeholder="Ваша электронная почта"/>
              <input required class="form__password" type="password" name="password"  placeholder="Ваш пароль"/>
              <div class="g-recaptcha" data-sitekey="6Ldrov0pAAAAALk8LcQpOElwKLLkQQ5x-T5GT_hG"></div>
              <input class="form__btn" type="submit" name="subscribe" id="subscribe" value="Войти" />
            </form>
            <hr class="auth__bigline">
            <p class="auth__quest">Нет личного кабинета?</p>
            <div class="auth-button">
              <a href="#" class="auth-btn">Регистрация</a>
            </div>
          </div>
          <div class="reg">
            <p class="reg__title">Вход</p>
            <hr class="reg__miniline">
            <form class="form" action="./php/reg.php" method="post">
              <input required class="form__name" type="text" name="name"  placeholder="Имя"/>
              <input required class="form__surname" type="text" name="surname"  placeholder="Фамилия"/>
              <input required class="form__email" type="email" name="email"  placeholder="Ваша электронная почта"/>
              <input required class="form__number" type="number" name="number"  placeholder="Номер телефона"/>
              <input required class="form__password" type="password" name="password"  placeholder="Придумайте пароль"/>
              <input required class="form__reppassword" type="password" name="reppassword"  placeholder="Повторите пароль"/>
              <input class="form__btn" type="submit" name="subscribe"  value="Создать" />
            </form>
            <hr class="reg__bigline">
            <p class="reg__quest">Уже есть аккаунт?</p>
            <div class="reg-button">
              <a href="#" class="reg-btn">Войти</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer>
      <div class="countainer">
        <div class="footer">
          <div class="footer-up">
            <img class="footer-up__logo" src="./public/footerlg.svg">
            <div class="footer-up-info">
              <div class="telephone">
                <img class="telephone__icon" src="./public/teleicon.svg">
                <a href="#" class="telephone__number">+7-985-842-04-42</a>
              </div>
              <div class="icons">
                <a class="icons__item" href="#"><img class="logo" src="./public/vk.svg"></a>
                <a class="icons__item" href="#"><img class="logo" src="./public/insta.svg"></a>
                <a class="icons__item" href="#"><img class="logo" src="./public/tg.svg"></a>
              </div>
              <div class="curs">
                <p class="curs__dollars">$ - 88,74₽</p>
                <p class="curs__euro">€ - 96,44₽</p>
              </div>
            </div>
          </div>
          <p class="footer-down">2009–2024 © HORIZON</p>
        </div>
      </div>
    </footer>
    <script type="module" src="form.js"></script>
  </body>
</html>