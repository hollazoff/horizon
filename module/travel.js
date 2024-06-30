import './travel.scss'

document.querySelector('#travel').innerHTML = `
<section>
<div class="countainer">
  <div class="block-travel">
    <div class="travel">
      <div class="travel-other">
        <img class="travel-other__img" src="/maldivs.png">
        <div class="travel-other-map">
          <div class="map-button">
            <a href="#" class="map-btn">Посмотреть по карте</a>
          </div>
        </div>
      </div>
      <div class="travel-info">
        <div class="first">
          <h3 class="first__name">NOVA MALDIVES</h3>
          <p class="first__type">Тур</p>
        </div>
        <div class="place">
          <img class="place__icon" src="/mesto.svg">
          <p class="place__title">Мальдивы, Южный Ари Атолл</p>
        </div>
        <p class="text">
          Отель Nova Maldives - жемчужина Индийского океана

          <br><br>Расположенный на уединенном острове в самом сердце Мальдивского архипелага, отель Nova Maldives предлагает своим гостям незабываемый отдых в райском уголке планеты. Белоснежные песчаные пляжи, бирюзовые воды лагуны и роскошные виллы с видом на океан создают атмосферу абсолютного блаженства и умиротворения.

<br><br>Элегантные виллы с панорамными видами, собственными бассейнами и террасами позволят вам насладиться уединением и уютом. Изысканная местная и интернациональная кухня в ресторанах отеля удовлетворит самый взыскательный вкус. А многочисленные активности - от подводного плавания до спа-процедур - сделают ваш отдых на Мальдивах по-настоящему незабываемым.
<br>Расположенный на живописном тропическом острове, отель Nova Maldives предлагает своим гостям незабываемый отдых в одном из самых красивых мест на Земле. Роскошные виллы с панорамными видами на бирюзовый океан, белоснежные пляжи и богатая инфраструктура делают этот курорт идеальным выбором для путешествия или семейного отдыха.

<br><br>К услугам гостей - просторные виллы с собственными бассейнами и террасами, откуда открываются захватывающие виды на лазурные воды лагуны. Разнообразие ресторанов и баров порадует гурманов изысканной местной и интернациональной кухней. А богатая программа развлечений, включая подводное плавание, спа-процедуры и водные виды спорта, превратит ваш отдых на Мальдивах в сказку наяву.
        </p>
        <div class="parametrs">
          <div class="parametrs-left">
            <p class="parametrs-left__kolvo">Места: 2</p>
            <p class="parametrs-left__timeotp">Дата отправки: 05.06.2024</p>
            <p class="parametrs-left__timeprib">Дата прибытия: 12.06.2024</p>
          </div>
          <div class="parametrs-right">
            <div class="block-stars">
              <img class="block-stars__star" src="/star.svg">
              <img class="block-stars__star" src="/star.svg">
              <img class="block-stars__star" src="/star.svg">
              <img class="block-stars__star" src="/star.svg">
              <img class="block-stars__star" src="/star.svg">
            </div>
            <p class="parametrs-right__minicena">Цена от</p>
            <p class="parametrs-right__cena">430 700,52 ₽</p>
          </div>
        </div>
        <div class="buy-button">
          <a href="#" class="buy-btn">Забронировать</a>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
`