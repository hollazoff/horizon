fetch('https://api.currencyapi.com/v3/latest?apikey=cur_live_zteemCuYD1yzsimURPMpRyL2F5nfiOynhCR40hpy')
  .then(function (response) {
    return response.json();
  })
  .then(function (data) {
    console.log(data); 


    const ruble = data.data.RUB.value;

    const usd = (ruble / data.data.USD.value).toFixed(2);
    const eur = (ruble / data.data.EUR.value).toFixed(2);


    document.querySelector('#footer').innerHTML = `
<footer>
<div class="countainer">
  <div class="footer">
    <div class="footer-up">
      <img class="footer-up__logo" src="./public/footerlg.svg">
      <div class="footer-up-info">
        <div class="telephone">
          <img class="telephone__icon" src="./public/teleicon.svg">
          <a href="#" class="telephone__number">+7-985-842-04-42</a>
        </div>
        <div class="icons">
          <a class="icons__item" href="#"><img class="logo" src="./public/vk.svg"></a>
          <a class="icons__item" href="#"><img class="logo" src="./public/insta.svg"></a>
          <a class="icons__item" href="#"><img class="logo" src="./public/tg.svg"></a>
        </div>
        <div class="curs">
          <p class="curs__dollars">$ - ${usd}₽</p>
          <p class="curs__euro">€ - ${eur}₽</p>
        </div>
      </div>
    </div>
    <p class="footer-down">2009–2024 © HORIZON</p>
  </div>
</div>
</footer>
`;
  })


