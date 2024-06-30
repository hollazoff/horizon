
document.querySelector('#form').innerHTML = `
<section>
<div class="countainer">
  <div class="block-form">
    <p class="block-form__title">Лучшие предложения!</p>
    <p class="block-form__text">Уникальные предложения только для избранных путешественников. 
      Станьте одним из них!</p>
    <form class="form">
      <input class="form__name" type="text" name="name" id="name" placeholder="Ваше имя"/>
      <input class="form__email" type="text" name="email" id="email" placeholder="Ваша почта"/>
      <input class="form__btn" type="submit" name="subscribe" id="subscribe" value="Подписаться" />
    </form>
  </div>
</div>
</section>
`
