

// if (document.getElementById('header')) {
//   import('./module/header.js').then((module) => {
//   });
// } else {
// }

// if (document.getElementById('slider')) {
//   import('./module/slider.js').then((module) => {
//   });
// } else {
// }

// if (document.getElementById('benefit')) {
//   import('./module/benefit.js').then((module) => {
//   });
// } else {
// }

// if (document.getElementById('advantage')) {
//   import('./module/advantage.js').then((module) => {
//   });
// } else {
// }

// if (document.getElementById('form')) {
//   import('./module/form.js').then((module) => {
//   });
// } else {
// }

if (document.getElementById('footer')) {
  import('./module/footer.js').then((module) => {
  });
} else {
}

// if (document.getElementById('catalog')) {
//   import('./module/catalog.js').then((module) => {
//   });
// } else {
// }

// if (document.getElementById('uslygi')) {
//   import('./module/uslygi.js').then((module) => {
//   });
// } else {
// }

// if (document.getElementById('questions')) {
//   import('./module/questions.js').then((module) => {
//   });
// } else {
// }

// if (document.getElementById('formq')) {
//   import('./module/formq.js').then((module) => {
//   });
// } else {
// }

if (document.getElementById('contacts')) {
  import('./module/contacts.js').then((module) => {
  });
} else {
}

// if (document.getElementById('account')) {
//   import('./module/account.js').then((module) => {
//   });
// } else {
// }

// if (document.getElementById('formaaccount')) {
//   import('./module/formaaccount.js').then((module) => {
//   });
// } else {
// }

// if (document.getElementById('authreg')) {
//   import('./module/authreg.js').then((module) => {
//   });
// } else {

// }
// if (document.getElementById('travel')) {
//   import('./module/travel.js').then((module) => {
//   });
// } else {
// }

// import { setupCounter } from './counter.js'
{/* <div id="header"></div> */}

// setupCounter(document.querySelector('#counter'))


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

    setTimeout(() => {
      menu.classList.remove('hide');
    }, 1000);
  }
  isMenuOpen = !isMenuOpen;
}

burgerMenu.addEventListener('click', toggleMenu);



var slides = document.querySelectorAll('.slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,4500);

function nextSlide(){
  slides[currentSlide].className = 'slide';
  currentSlide = (currentSlide+1)%slides.length;
  slides[currentSlide].className = 'slide showing';
}






