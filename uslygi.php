<?php
session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/horizon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./scss/uslygi.css">
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
  <div class="uslygi">
    <div class="visa">
      <h4 class="visa__title">Оформление виз</h4>
      <p class="visa__advanced">- Профессиональная помощь в оформлении виз для поездок в разные страны</p>
      <p class="visa__advanced">- Экспертная консультация по визовым требованиям и документам            </p>
      <p class="visa__advanced">- Быстрое и удобное заполнение анкет и подготовка пакета документов</p>
      <p class="visa__advanced">- Сопровождение клиентов на всех этапах визового процесса</p>
      <p class="visa__advanced">- Возможность получения визы в максимально короткие сроки</p>
      <p class="visa__text">Визовый отдел HORIZON предлагает оформление виз в более 20 стран, включая ОАЭ, Египет, Вьетнам, Индию, Шри-Ланку, Кипр, Кубу, Сингапур, Японию, Кению, Южную Корею, Иран, Китай, Грецию. 
        Доступна услуга "Пакет для самостоятельной подачи" стоимостью 5 у.е. с заявки.                Специалисты HORIZON окажут профессиональные консультации, подготовят необходимые документы и осуществят срочное оформление визы при необходимости. 
        Наш офис находится по адресу: Республика Татарстан, г. Лениногорск,
        ул. Нефтяников, д. 15, офис 12</p>
    </div>
    <div class="insurance">
      <h4 class="insurance__title">Страхование поездок</h4>
      <p class="insurance__advanced">- Страховые продукты для любых видов поездок</p>
      <p class="insurance__advanced">- Индивидуальный подход, круглосуточная поддержка            </p>
      <p class="insurance__advanced">- Оперативное урегулирование страховых случаев
      </p>
      <p class="insurance__advanced">- Дополнительные сервисы для комфорта и безопасности</p>
      <form class="form" action="./php/insurance.php" method="post">
        <input required class="form__fio" type="text" name="fio" id="fio" placeholder="Ваше ФИО"/>

        <!-- <input class="form__number" type="text" name="number" id="number"  placeholder="Номер телефона"/> -->
        <?php 
                        if(@$_SESSION["userinfo"] ["email"] == ""){
                          echo "<input required class='form__email' type='text' name='email' id='email'  placeholder='Ваша почта'/>";
                          echo "<input required class='form__number' type='text' name='number' id='number'  placeholder='Номер телефона'/>";
                        }
                        else{
                          echo "<input required class='form__email' type='text' name='email' id='email' readonly value='";
                          echo $_SESSION['userinfo']['email'];
                          echo"'/>";
                          echo "<input required class='form__number' type='text' name='number' id='number' readonly value='";
                          echo $_SESSION['userinfo']['number'];
                          echo"'/>";
                        }
        ?>
        <input required name="daterosh" type="text" placeholder="Дата рождения" class="form__daterosh" onfocus="this.type='date'" onblur="this.type='text'"/>
        <input required class="form__passport" type="text" name="passport" id="passport" placeholder="ЗагранПаспорт"/>
        <input required class="form__summ" type="text" name="summ" id="summ" placeholder="Сумма в рублях"/>
        <input required class="form__dateprib" type="text" name="dateprib" id="dateprib" placeholder="Дата пребывания"onfocus="this.type='date'" onblur="this.type='text'"/>
        <input class="form__btn" type="submit" name="subscribe" id="subscribe" value="Отправить заявку" />
      </form>
    </div>
  </div>
</div>
</section>
    <div id="questions"></div>
    <section>
<div class="countainer">
  <div class="block-formq">
    <p class="block-formq__title">Не нашли ответ на свой вопрос?</p>
    <p class="block-formq__text">Заполните формы и мы ответим на интересующие вас вопросы.</p>
    <form class="formq" action="./php/support.php" method="post">
      <input class="formq__email" type="text" name="email" placeholder="Почта" id="email" readonly value="<?php echo @$_SESSION['userinfo']['email']?>"/>
      <textarea class="formq__message" type="text" name="message"  placeholder="Сообщение..."></textarea>
      <input class="formq__btn" type="submit" name="subscribe" id="subscribe" value="Отправить" />
    </form>
  </div>
</div>
</section>
    <div id="footer"></div>
    <script type="module" src="uslugi.js"></script>
  </body>
</html>