
document.querySelector('#authreg').innerHTML = `
<section>
<div class="countainer">
  <div class="block">
    <div class="auth">
      <p class="auth__title">Вход</p>
      <hr class="auth__miniline">
      <form class="form" action="auth.php" method="post">
        <input class="form__email" type="text" name="email"  placeholder="Ваша электронная почта"/>
        <input class="form__password" type="password" name="password"  placeholder="Ваш пароль"/>
        <input class="form__btn" type="submit" name="subscribe" id="subscribe" value="Войти" />
        <p class="error-auth"></p>
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
      <form class="form" action="reg.php" method="post">
        <input class="form__name" type="text" name="name"  placeholder="Имя"/>
        <input class="form__surname" type="text" name="surname"  placeholder="Фамилия"/>
        <input class="form__email" type="text" name="email"  placeholder="Ваша электронная почта"/>
        <input class="form__number" type="text" name="number"  placeholder="Номер телефона"/>
        <input class="form__password" type="password" name="password"  placeholder="Придумайте пароль"/>
        <input class="form__reppassword" type="password" name="reppassword"  placeholder="Повторите пароль"/>
        <input class="form__btn" type="submit" name="subscribe"  value="Создать" />
        <p class="error-reg"></p>
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
`

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