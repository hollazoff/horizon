
document.querySelector('#uslygi').innerHTML = `
<section>
<div class="countainer">
  <div class="uslygi">
    <div class="visa">
      <h4 class="visa__title">Оформление виз</h4>
      <p class="visa__advanced">- Профессиональная помощь в оформлении виз для поездок в разные страны</p>
      <p class="visa__advanced">- Экспертная консультация по визовым требованиям и документам            </p>
      <p class="visa__advanced">- Быстрое и удобное заполнение анкет и подготовка пакета документов</p>
      <p class="visa__advanced">- Сопровождение клиентов на всех этапах визового процесса</p>
      <p class="visa__advanced">- Возможность получения визы в максимально короткие сроки</p>
      <p class="visa__text">Визовый отдел HORIZON предлагает оформление виз в более 20 стран, включая ОАЭ, Египет, Вьетнам, Индию, Шри-Ланку, Кипр, Кубу, Сингапур, Японию, Кению, Южную Корею, Иран, Китай, Грецию. 
        Доступна услуга "Пакет для самостоятельной подачи" стоимостью 5 у.е. с заявки.                Специалисты HORIZON окажут профессиональные консультации, подготовят необходимые документы и осуществят срочное оформление визы при необходимости. 
        Наш офис находится по адресу: Республика Татарстан, г. Лениногорск,
        ул. Нефтяников, д. 15, офис 12</p>
    </div>
    <div class="insurance">
      <h4 class="insurance__title">Страхование поездок</h4>
      <p class="insurance__advanced">- Страховые продукты для любых видов поездок</p>
      <p class="insurance__advanced">- Индивидуальный подход, круглосуточная поддержка            </p>
      <p class="insurance__advanced">- Оперативное урегулирование страховых случаев
      </p>
      <p class="insurance__advanced">- Дополнительные сервисы для комфорта и безопасности</p>
      <form class="form">
        <input class="form__fio" type="text" name="fio" id="fio" placeholder="Ваше ФИО"/>
        <input class="form__email" type="text" name="email" id="email" placeholder="Ваша почта"/>
        <input class="form__number" type="text" name="number" id="number" placeholder="Телефон"/>
        <input id="daterosh" type="text" placeholder="Дата рождения" class="form__daterosh" onfocus="this.type='date'" onblur="this.type='text'"/>
        <input class="form__passport" type="text" name="passport" id="passport" placeholder="ЗагранПаспорт"/>
        <input class="form__summ" type="text" name="summ" id="summ" placeholder="Сумма в рублях"/>
        <input class="form__dateprib" type="text" name="dateprib" id="dateprib" placeholder="Дата пребывания"onfocus="this.type='date'" onblur="this.type='text'"/>
        <input class="form__btn" type="submit" name="subscribe" id="subscribe" value="Отправить заявку" />
      </form>
    </div>
  </div>
</div>
</section>
`