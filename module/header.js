
document.querySelector('#header').innerHTML = `
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
                <a class="button-all" href="vhodreg.php">
                  <img class="logo" src="./public/profil.svg">
                  <p href="#" class="button-all__btn">Мой кабинет</p>
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
`








const burgerMenu = document.querySelector('.menu1-btn');
const menu = document.querySelector('.burger');
const headerButton = document.querySelector('.header-button');
const menuSpans = document.querySelectorAll('.menu1-btn span');
let isMenuOpen = false;

function toggleMenu() {
  if (!isMenuOpen) {
    menu.classList.add('show');
    headerButton.classList.add('show');
    if (menuSpans.length > 0) {
      menuSpans.forEach(span => span.classList.add('show'));
    }
    menu.classList.remove('hide');
    document.body.style.overflow = 'hidden';
  } else {
    menu.classList.add('hide');
    headerButton.classList.remove('show');
    if (menuSpans.length > 0) {
      menuSpans.forEach(span => span.classList.remove('show'));
    }
    menu.classList.remove('show');
    document.body.style.overflow = 'auto';

    // Удаляем класс 'hide' после 1 секунды
    setTimeout(() => {
      menu.classList.remove('hide');
    }, 1000);
  }
  isMenuOpen = !isMenuOpen;
}

burgerMenu.addEventListener('click', toggleMenu);

