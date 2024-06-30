
document.querySelector('#questions').innerHTML = `
<section>
<div class="countainer">
  <div class="block-questions">
    <p class="block-questions__title">Частые вопросы</p>
    <div class="questions">
        <div class="support">
          <div class="support-info">
            <img class="support-info__icon" src="./public/support.svg">
            <p class="support-info__title">Как забронировать тур?</p>
          </div>
          <p class="support__text">Мы сделали процесс бронирования максимально простым и интуитивно понятным. Несколько шагов - и отпуск вашей мечты уже забронирован!</p>
        </div>
        <div class="support">
          <div class="support-info">
            <img class="support-info__icon" src="./public/support.svg">
            <p class="support-info__title">Какие документы нужны для оформления визы?</p>
          </div>
          <p class="support__text">Наши визовые эксперты помогут собрать все необходимые документы и правильно их оформить. Мы возьмем на себя всю бюрократическую рутину.</p>
        </div>
        <div class="support">
          <div class="support-info">
            <img class="support-info__icon" src="./public/support.svg">
            <p class="support-info__title">Как получить консультацию по выбору тура?</p>
          </div>
          <p class="support__text">Наши опытные менеджеры проконсультируют вас по любым вопросам, помогут подобрать идеальный тур с учетом ваших предпочтений и пожеланий.</p>
        </div>
        <div class="support">
          <div class="support-info">
            <img class="support-info__icon" src="./public/support.svg">
            <p class="support-info__title">Что делать при отмене/переносе тура?</p>
          </div>
          <p class="support__text">Мы всегда на связи и готовы оперативно решить любые вопросы, возникающие до, во время и после путешествия.</p>
        </div>
        <div class="support">
          <div class="support-info">
            <img class="support-info__icon" src="./public/support.svg">
            <p class="support-info__title">Как застраховаться от непредвиденных ситуаций? </p>
          </div>
          <p class="support__text">Мы предлагаем широкий выбор страховых пакетов, чтобы вы чувствовали себя в полной безопасности во время поездки.</p>
        </div>
        <div class="support">
          <div class="support-info">
            <img class="support-info__icon" src="./public/support.svg">
            <p class="support-info__title">Какие способы оплаты доступны?</p>
          </div>
          <p class="support__text">Вы можете оплатить тур наличными, банковской картой или другим удобным для вас способом.</p>
        </div>
          <div class="support">
          <div class="support-info">
            <img class="support-info__icon" src="./public/support.svg">
            <p class="support-info__title">Какие экскурсии можно заказать?</p>
          </div>
          <p class="support__text">Мы подготовили обширную программу экскурсий, чтобы вы смогли в полной мере познакомиться с культурой и достопримечательностями.</p>
        </div>
        <div class="support">
          <div class="support-info">
            <img class="support-info__icon" src="./public/support.svg">
            <p class="support-info__title">Как получить скидку на покупку тура?</p>
          </div>
          <p class="support__text">Постоянные клиенты нашего агентства получают специальные скидки и бонусы при подписке на рассылку.</p>
        </div>
        <div class="support">
          <div class="support-info">
            <img class="support-info__icon" src="./public/support.svg">
            <p class="support-info__title">Какие услуги включены в стоимость тура?</p>
          </div>
          <p class="support__text">В стоимость тура входит перелет, проживание, питание и другие базовые услуги.</p>
        </div>
    </div>
  </div>
</div>
</section>
`
const supportElements = document.querySelectorAll('.support');

supportElements.forEach(supportElement => {
  const supportText = supportElement.querySelector('.support__text');

  supportElement.addEventListener('click', () => {
    supportElement.classList.toggle('active');
  });

  supportElement.addEventListener('mouseleave', () => {
    if (!supportElement.classList.contains('active')) {
      supportElement.classList.remove('active');
    }
  });
});


