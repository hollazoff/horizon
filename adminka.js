if (document.getElementById('footer')) {
    import('./module/footer.js').then((module) => {
    });
  } else {
  }

// Выбираем форму с классом 'formred'
const formRed = document.querySelector('.formred');

// Добавляем обработчик события click на кнопку с классом 'del-button'
document.querySelector('.del-button').addEventListener('click', () => {
  // Изменяем стиль 'display' формы 'formred' на 'flex'
  formRed.style.display = 'flex';
});

