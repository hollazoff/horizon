
document.querySelector('#catalog').innerHTML = `
<section>
<div class="countainer">
  <div class="booking">
    <form class="filter">
      <select name="type" id="type-select" class="filter__type">
        <option value="Тур">Тур</option>
        <option value="Круиз">*****</option>
      </select>
      <select name="country" id="country-select" class="filter__country">
        <option value="Мальдивы">Страна</option>
        <option value="Таиланд">*****</option>
        <option value="Россия">*****</option>
      </select>
      <select name="townotpr" id="townotpr-select" class="filter__townotpr">
        <option value="Мальдивы">Город отправления</option>
        <option value="Таиланд">*****</option>
        <option value="Южный Ари Атолл">*****</option>
        <option value="Таиланд">*****</option>
        <option value="Россия">*****</option>
      </select>
      <select name="townprib" id="townprib-select" class="filter__townprib">
        <option value="Мальдивы">Город прибытия</option>
        <option value="Таиланд">*****</option>
        <option value="Южный Ари Атолл">*****</option>
        <option value="Таиланд">*****</option>
        <option value="Россия">*****</option>
      </select>
      <input id="dateotpr" type="text" placeholder="Дата отправки" class="filter__dateotpr" onfocus="this.type='date'" onblur="this.type='text'"/>
      <input id="dateprib" type="text" placeholder="Дата прибытия" class="filter__dateprib" onfocus="this.type='date'" onblur="this.type='text'"/>
      <select name="mesta" id="mesta-select" class="filter__mesta">
        <option value="Мальдивы">Места</option>
        <option value="Таиланд">*****</option>
        <option value="Южный Ари Атолл">*****</option>
        <option value="Таиланд">*****</option>
        <option value="Россия">*****</option>
      </select>
      <select name="cena" id="cena-select" class="filter__cena">
        <option value="Мальдивы">По умолчанию</option>
        <option value="Таиланд">*****</option>
        <option value="Южный Ари Атолл">*****</option>
        <option value="Таиланд">*****</option>
        <option value="Россия">*****</option>
      </select>
      <input class="filter__btn" type="submit" name="search" id="search" value="Поиск" />
    </form>
    <div class="catalog-cards">
      <div class="cards">
        <a class="card" href="card.html">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="">
              <img class="block-stars__star" src="">
              <img class="block-stars__star" src="">
              <img class="block-stars__star" src="">
              <img class="block-stars__star" src="">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
        <a class="card" href="#">
          <img src="./public/malsives.png" class="card__img">
          <div class="card-place">
            <img class="card-place__icon" src="./public/mesto.svg">
            <p class="card-place__title">Мальдивы, Южный Ари Атолл</p>
          </div>
          <div class="info">
            <p class="info__title">NOVA MALDIVES</p>
            <div class="block-stars">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
              <img class="block-stars__star" src="./public/star.svg">
            </div>
          </div>
          <p class="card__kolvo">Места: 2</p>
          <p class="card__timeotp">Дата отправки: 05.06.2024</p>
          <p class="card__timeprib">Дата прибытия: 12.06.2024</p>
          <p class="card__type">Тур</p>
          <p class="card__minicena">Цена от</p>
          <p class="card__cena">430 700,52 ₽</p>
        </a>
      </div>

    </div>
  </div>
</div>
</section>
`
