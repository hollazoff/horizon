const switchToAuthBtn = document.querySelector('.auth-btn');
const switchToRegBtn = document.querySelector('.reg-btn');

const authForm = document.querySelector('.auth');
const regForm = document.querySelector('.reg');

switchToAuthBtn.addEventListener('click', () => {
  authForm.style.display = 'none';
  regForm.style.display = 'flex';
});

switchToRegBtn.addEventListener('click', () => {
  regForm.style.display = 'none';
  authForm.style.display = 'flex';
});




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

$(function() { 
  var reCaptchaWidth = 302;
  var containerWidth = $('.container').width(); 
  if(reCaptchaWidth > containerWidth) {
      var reCaptchaScale = containerWidth / reCaptchaWidth;
      $('.g-recaptcha').css({
          'transform':'scale('+reCaptchaScale+')',
          'transform-origin':'left top'
      });
  }                
});