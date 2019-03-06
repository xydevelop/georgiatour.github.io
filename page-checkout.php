<?php get_header('page'); ?>

<!-- PAge -->
  <section class="page" id="checkout" style="margin-bottom: 150px;">
  	<div class="container">
      <div class="row">
        <div class="col-md-6 form-checkout-wrapper">
          <div class="form-checkout">
              <img style="max-width: 80%; margin: 0 auto; display: block;" src="<?php echo get_template_directory_uri(); ?>/images/calendar.png" alt="" />
              <h3 class="text-center">Детали брони</h3>
              <form method="post" style="max-width: 100%;">
                <div class="row">
                  <div class="col-md-4 pr-0">
                    <label>Количество</label>
                    <input type="number" name="quantity" placeholder="1" />
                  </div>
                  <div class="col-md-4 pr-0">
                    <label>Стоимость</label>
                    <input type="text" name="cost" value="200 руб" />
                  </div>
                  <div class="col-md-4">
                    <label>Время</label>
                    <input type="text" name="time" value="в 12:00" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>Имя и фамимлия</label>
                    <input type="text" name="name" required/>
                  </div> 
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>Email</label>
                    <input class="m-0" type="email" name="mail" required/>
                  </div>
                  <div class="col-md-6">
                    <label>Телефон</label>
                    <input class="m-0" type="tel" name="phone" required/>
                  </div>
                </div>
                  <p>*После бронирования и подтверждения гидом возможности проведения экскурсии на указанный
 email придет сообщение с поодтверждением  указанаимем суммы для предоплаты</p>
              <div class="privacy-policy">
                <input class="check-policy" type="checkbox" required checked> Я принимаю условия <a href="">пользовательского соглашения</a>
              </div>
              <div class="book-wrapper">
                <button class="add_booking"><i>Забронировать</i><span><div class="arrow-btn"></div></span></button>
              </div>
              </form>
          </div>
        </div>
        <div class="col-md-6">
             <div class="tour-info row item">
            <h3>Пещерный город</h3>
            <div class="single-rating-wrap col-md-8 p-0">
              <h4>Многодневный тур</h4>
              <div class="rating-single rev-wrap">
                
                  <div class="rev-rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
                  <div class="review">( 25 отзывов )</div>
              
              </div>
            </div>
            <div class="col-md-4 p-0 date-time">
              <div class="city-icon"><i class="fa fa-map-marker" aria-hidden="true"></i>Тбилиси</div>
              <div class="time-icon"><i class="fa fa-clock-o" aria-hidden="true"></i>12 часов (2 дня)</div>
            </div>
            <h4>Маршрут : Пещерный город Уплисцихе, гори и Боржоми</h4>
            <div class="w-100 tour-properties">
              <div class="d-flex justify-content-between"><h6>Продолжительность</h6><span>5 дней</span></div>
              <div class="d-flex justify-content-between"><h6>Тип тура</h6><span>Панорама</span></div>
              <div class="d-flex justify-content-between"><h6>Транспорт</h6><span>На автобусе</span></div>
            </div>
            <div class="single-bottom">
              <ul class="in-cost">
                <h6>В стоимость включено</h6>
                  <li>- Транспортные услуги</li>
                  <li>- Услуги гида</li>
                  <li>- Размещение в гостинице (двух и трехместных номерах)</li>
                  <li>- Завтрак в гостинице</li>
                  <li>- Транспортные услуги</li>
                  <li>- Услуги гида</li>
                  <li>- Размещение в гостинице (двух и трехместных номерах)</li>
              </ul>
              <ul class="not-in-cost">
                <h6>В стоимость не включено</h6>
                  <li>- Транспортные услуги</li>
                  <li>- Услуги гида</li>
                  <li>- Размещение в гостинице (двух и трехместных номерах)</li>
              </ul>
              <div class="col-md-6 price-wrapper p-0">
                  <div class="cost">
                    <div class="price">5000 р</div>
                    <span>* за человека</span>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
  	</div>
  </section>
 

	

<?php get_footer(); ?>