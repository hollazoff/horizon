if (document.getElementById('questions')) {
    import('./module/questions.js').then((module) => {
    });
  } else {
  }

if (document.getElementById('footer')) {
    import('./module/footer.js').then((module) => {
    });
  } else {
  }




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