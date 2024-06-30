
document.querySelector('#formq').innerHTML = `
<section>
<div class="countainer">
  <div class="block-formq">
    <p class="block-formq__title">Не нашли ответ на свой вопрос?</p>
    <p class="block-formq__text">Заполните формы и мы ответим на интересующие вас вопросы.</p>
    <form class="formq">
      <input class="formq__email" type="text" name="email" id="email" placeholder="Ваша почта"/>
      <textarea class="formq__message" type="text" name="message" id="message" placeholder="Сообщение..."></textarea>
      <input class="formq__btn" type="submit" name="subscribe" id="subscribe" value="Отправить" />
    </form>
  </div>
</div>
</section>
`