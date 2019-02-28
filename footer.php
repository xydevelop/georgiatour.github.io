<!-- Footer -->
  <footer id="footer">
    <div class="container"> 
     	<div class="row">
     		<div class="col-6">
          <img src="<?php echo get_template_directory_uri(); ?>/images/logo-didi.png" alt="Путешествия Грузия" />
           <ul class="footer-menu">
              <li><a href="/">Главная</a></li>
              <li><a href="/about/">О проекте</a></li>
              <li><a href="/link/">Обратная связь</a></li>
           </ul>
        
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