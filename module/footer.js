fetch('https://www.cbr-xml-daily.ru/daily_json.js')
  .then(function (response) {
    return response.json();
  })
  .then(function (data) {
    if (data && data.Valute && data.Valute.USD && data.Valute.EUR) {
      const usd = data.Valute.USD.Value;
      const eur = data.Valute.EUR.Value;

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
                    <p class="curs__dollars">$ - ${usd.toFixed(2)}₽</p>
                    <p class="curs__euro">€ - ${eur.toFixed(2)}₽</p>
                  </div>
                </div>
              </div>
              <p class="footer-down">2009–2024 © HORIZON</p>
            </div>
          </div>
        </footer>
      `;
    } 
  });



