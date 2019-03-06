<!-- Footer -->
  <footer id="footer">
    <div class="container"> 
     	<div class="row">
     		<div class="col-6">
          <a href="/"><img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo-didi.png" alt="Путешествия Грузия" /></a>
          <div class="footer-menu-wrapper">
             <ul class="footer-menu">
                <li><a href="/">Главная</a></li>
                <li><a href="/about/">О проекте</a></li>
                <li><a href="/condition/">Условия</a></li>
             </ul>
             <div class="social">
              <a class="icon-instagram" href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
              <a class="icon-facebook" href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
              <a class="icon-vk" href=""><i class="fa fa-vk" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="georgia-support">
            <div class="head-support">
              <h5>Служба поддержки:</h5>
            </div>
            <div class="info-support">
              <a href="tel:88000000000">8 (800) 000-00-00</a>
              <a href="mailto:info@diditravel.ru">info@diditravel.ru</a>
            </div>
          </div>
          <h3>Еженедельные скидки<br/>
            для наших подписчиков</h3>
          <form class="subscribe-form d-flex" method="post">
            <input type="text" name="subscribe" placeholder="Подпишитесть на рассылку акции и скидок" />
           <button class="subscribe-btn"></button>
          </form>
        </div>
     		<div id="footer_bg" class="col-6"></div>
     	</div>
    </div>
   	<div id="footer_line">
   		<div class="row">
	   		<div class="col-4"><a href="<?php echo get_template_directory_uri(); ?>/files/agree.pdf" target="__blank">Пользовательское соглашение</a></div>
	   		<div class="col-4">Все права защищены <?php echo date('Y'); ?></div>
	   		<div class="col-4"><a href="//xystudio.ru/" target="__blank">Разработано в XYStudio</a></div>
	   	</div>
   	</div>
  </footer>

<?php wp_footer(); ?>
</body>
</html>