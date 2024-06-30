

document.querySelector('#account').innerHTML = `
<section>
      <?php
      session_start();
      ?>
      <div class="countainer">
        <div class="account">
          <div class="account-action">
            <div class="btn">
              <div class="account-button">
                <a href="#" class="account-btn">Мой аккаунт</a>
              </div>
              <div class="quit-button">
                <a href="#" class="quit-btn">Выйти</a>
              </div>
            </div>
            <div class="counter">
              <p class="counter__text">Мои поездки</p>
              <p class="counter__num">0</p>
            </div>
          </div>
          <div class="info">
            <p class="info__title">Персональная информация</p>
            <div class="FIO">
              <div class="FIO-name">
                <p class="FIO-name__title">Имя:</p>
                <p class="FIO-name__text"></p>
              </div>
              <div class="FIO-surname">
                <p class="FIO-surname__title">Фамилия:</p>
                <p class="FIO-surname__text"></p>
              </div>
            </div>
            <div class="info-email">
              <p class="info-email__title">Электронная почта:</p>
              <p class="info-email__text"></p>
            </div>
            <div class="dr">
              <div class="dr-bertday">
                <p class="dr-bertday__title">ID аккаунта:</p>
                <p class="dr-bertday__text"></p>
              </div>
              <div class="dr-num">
                <p class="dr-num__title">Номер телефона:</p>
                <p class="dr-num__text">89851456345</p>
              </div>
            </div>
            .
            <form class="password">
              <div class="password-old">
                <p class="password-old__title">Старый пароль:</p>
                <input type="text" class="password-old__text" placeholder="****************">
              </div>
              <div class="password-new">
                <p class="password-new__title">Новый пароль:</p>
                <input type="text" class="password-new__text" placeholder="****************">
              </div>
              <input type="submit" class="password__btn" value="Сменить пароль">
            </form>
          </div>
          <div class="booking">
            <p class="booking__title">Мои брони</p>
            <div class="cards">
              <div class="card">
                <div class="first">
                  <p class="first__name">NOVA MALDIVES</p>
                  <div class="card-place">
                    <img class="card-place__icon" src="./public/mesto.svg">
                    <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
                  </div>
                </div>
                <div class="second">
                  <p class="second__mesta">Места: 2</p>
                  <p class="second__time">Время: 05.06.2024 - 12.06.2024</p>
                </div>
                <p class="card__cena">430 700,52 ₽</p>
              </div>
              <div class="card">
                <div class="first">
                  <p class="first__name">NOVA MALDIVES</p>
                  <div class="card-place">
                    <img class="card-place__icon" src="./public/mesto.svg">
                    <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
                  </div>
                </div>
                <div class="second">
                  <p class="second__mesta">Места: 2</p>
                  <p class="second__time">Время: 05.06.2024 - 12.06.2024</p>
                </div>
                <p class="card__cena">430 700,52 ₽</p>
              </div>
              <div class="card">
                <div class="first">
                  <p class="first__name">NOVA MALDIVES</p>
                  <div class="card-place">
                    <img class="card-place__icon" src="./public/mesto.svg">
                    <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
                  </div>
                </div>
                <div class="second">
                  <p class="second__mesta">Места: 2</p>
                  <p class="second__time">Время: 05.06.2024 - 12.06.2024</p>
                </div>
                <p class="card__cena">430 700,52 ₽</p>
              </div>
              <div class="card">
                <div class="first">
                  <p class="first__name">NOVA MALDIVES</p>
                  <div class="card-place">
                    <img class="card-place__icon" src="./public/mesto.svg">
                    <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
                  </div>
                </div>
                <div class="second">
                  <p class="second__mesta">Места: 2</p>
                  <p class="second__time">Время: 05.06.2024 - 12.06.2024</p>
                </div>
                <p class="card__cena">430 700,52 ₽</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
`
function getUserDataFromSession() {
  // Проверяем, есть ли данные пользователя в сессии
  if (typeof window.sessionStorage !== 'undefined' && sessionStorage.getItem('userInfo')) {
    // Если есть, то получаем их из sessionStorage
    return JSON.parse(sessionStorage.getItem('userInfo'));
  } else if (typeof $_SESSION !== 'undefined' && $_SESSION['userinfo']) {
    // Если нет в sessionStorage, то проверяем PHP-сессию
    return $_SESSION['userinfo'];
  } else {
    // Если нет нигде, возвращаем пустой объект
    return {};
  }
}

function fillUserInfo() {
  // Получаем данные пользователя из сессии
  const userInfo = getUserDataFromSession();

  // Находим элементы на странице, в которые нужно вставить данные
  const emailElement = document.querySelector('.FIO-name__text');
  const surnameElement = document.querySelector('.FIO-surname__text');
  // const numberElement = document.querySelector('.dr-num__text');
  // const idElement = document.querySelector('.dr-bertday__text');

  // Заполняем элементы данными
  emailElement.textContent = userInfo.email || '';
  surnameElement.textContent = userInfo.surname || '';
  // numberElement.textContent = userInfo.number || '';
  // idElement.textContent = userInfo.id_user || '';
}
document.addEventListener('DOMContentLoaded', fillUserInfo);