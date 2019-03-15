<?php

$id_tour = get_the_ID();

 $type_tour = get_terms( array(
  'taxonomy' => 'tourtheme',
  'hide_empty' => false,
  'object_ids' => $id_tour
) );

 $length_type_tour = count($type_tour);

if ( $cat_tour[0]->term_id == 2 ){ $cat_name = 'Однодневный тур';  }else{ $cat_name = 'Многодневный тур'; }

$tour_rating = get_field('gt_tour_rating',$id_tour);
$tour_rt_count = get_field('gt_tour_qunt',$id_tour);

$tour_sale = get_field('gt_tour_sale',$id_tour);
$tour_city = get_field('gt_tour_city_list',$id_tour);

$tour_time = get_field('gt_tour_time',$id_tour);
$tour_price = get_field('gt_tour_price',$id_tour);

$tour_route = get_field('gt_tour_route',$id_tour);

$tour_incost = get_field('gt_tour_include_cost',$id_tour);
$tour_ncost = get_field('gt_tour_not_inc',$id_tour);

$tour_price = get_field('gt_tour_price',$id_tour);
$tour_sale = get_field('gt_tour_sale',$id_tour);
$tour_sale_price = get_field('gt_sale_price',$id_tour);

$tour_objects = get_field('gt_tour_object',$id_tour);
$tour_description = get_field('gt_tour_description',$id_tour);

$tour_gallery  = get_post_gallery( get_the_ID(), false );
$tour_recc = get_field('gt_tour_take',$id_tour);

$tour_inday = get_field('gt_tour_day',$id_tour);
$tour_transp = get_field('gt_tour_transport',$id_tour);


?>
<!-- Tour -->
  <section class="page tour-page" style="font: 400 15px Roboto; color: #686868; padding-bottom: 65px;">
  	<div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="tour-info row item">
            <h3><?php the_title(); ?></h3>
            <div class="single-rating-wrap col-md-8 p-0">
              <h4>Многодневный тур</h4>
              <div class="rating-single rev-wrap">
                
                  <div class="rev-rating">
                    <?php 
                      if( $tour_rating ){ 
                        for( $i = 0; $i < $tour_rating; $i++){ ?>
                          <i class="fa fa-star" aria-hidden="true"></i>
                        <?php }
                      }
                    ?>
                  </div>
                  <div class="review">( <?php if( $tour_rt_count ) echo (int)$tour_rt_count; ?> отзывов )</div>
              
              </div>
            </div>
            <div class="col-md-4 p-0 date-time">
              <div class="city-icon"><?php if( $tour_city ){ ?><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $tour_city[0]->post_title; }  ?></div>
              <div class="time-icon"><?php if( $tour_time){ ?><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $tour_time; } ?></div>
            </div>
            <h4>Маршрут : <?php echo $tour_route; ?></h4>
            <div class="w-100 tour-properties">
              <div class="d-flex justify-content-between"><h6 class="col-md-3 p-0">Продолжительность</h6><span class="col-auto p-0"><?php if( $tour_time ){ echo $tour_time; }?></span></div>
              <div class="d-flex justify-content-between"><h6 class="col-md-3 p-0">Транспорт</h6><span class="col-auto p-0"><?php if( $tour_transp ) echo $tour_transp; ?></span></div>
              <div class="d-flex justify-content-between"><h6 class="col-md-3 p-0">Тип тура</h6><span class="col-auto p-0"><?php 
                $i = 1;
              foreach( $type_tour as $ttk => $ttv ){
                  if( $length_type_tour > 1 &&  $length_type_tour != $i ){
                    if( $i == 2 ){ break ;}
                    echo $ttv->name.', ';
                  }else{
                    echo $ttv->name;
                  }
                  $i++;
              } ?></span></div>
            </div>
            <div class="single-bottom">
              <?php if( $tour_incost ) echo $tour_incost; ?>
              <?php if( $tour_ncost ) echo $tour_ncost; ?>
              <div class="col-md-12 price-wrapper p-0">
                  <div class="cost">
                    <?php if( !empty($tour_sale) && $tour_sale != 0 ){ ?>
                        <div class="price"><?php if( $tour_sale_price ) echo $tour_sale_price; ?></div>
                    <?php } ?>
                    
                    <div class="sale-price"><?php if( $tour_price ) echo $tour_price; ?></div>
                    <span>* за человека</span>
                  </div>
                </div>
              <div class="btn-single-buy-tour"><a class="btn_tour" href="/checkout"><i>Забронировать</i><span><div class="arrow-btn"></div></span></a></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 places">
          <h4>Места посещения</h4>
          <?php if( $tour_objects ) ?><p><?php echo $tour_objects; ?></p>
          <div class="gallery-tour-wrapper row align-items-center justify-content-center text-center">

              <?php 
            if( !empty( $tour_gallery ) ){
                  $arr = explode(",", $tour_gallery['ids']);
              foreach($arr as $k => $v){ 
                $thumb = wp_get_attachment_image_src($v, 'medium', true); ?>
            <div class="col-md-6 place-img">
                <img src="<?php echo $thumb[0]; ?>" alt="Грузия" />
            </div>
            <?php }

            } ?>
            


          </div>
        </div>
        <p class="include-tour col-12"><?php echo $tour_recc; ?></p>
      </div>
    </div>
  </section>

  <section style="background: #F6F6F7;" class="tour-guide">
      <div class="container">
        <h4>Ваш гид</h4>

    <?php 

$guide = get_field('gt_tour_guide', $id_tour);

 $guide_photo_src = get_the_post_thumbnail_url( $guide, 'large' );

if( $guide ) : ?>

  <div class="guide-wrap row align-items-center">
          <div class="col-md-3">
            <div class="guide-image-wrapper">
              <img src="<?php echo  $guide_photo_src; ?>" alt="" />
            </div>
          </div>
          <div class="col-md-9">
            <div class="guide-info">
              <h3><?php echo $guide->post_excerpt; ?></h3>
              <p><?php echo $guide->post_content; ?></p>
              <span><?php echo $guide->post_title; ?></span>
            </div>
          </div>
        </div>

<?php 

else : ?>

 <div class="guide-wrap row align-items-center">
          <div class="col-md-3">
            <img src="<?php echo get_template_directory_uri(); ?>/images/guide.png" alt="" />
          </div>
          <div class="col-md-9">
            <div class="guide-info">
              <h3>Я люблю эту страну и расскажу Вам о ней</h3>
              <p>И покажу Вам самые интересные места в нашем туреLorem ipsum dolor sit amet, maiores ornare ac fermentum, imperdiet ut vivamus a, nam lectus at nunc. Quam euismod sem, semper ut potenti pellentesque quisque. Ne eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in i</p>
              <span>Георгий Данелия, Тбилиси</span>
            </div>
          </div>
        </div>


<?php endif;
   ?>

</div>
  </section>

  <section class="tour-guide-image">
    <div class="container"><h4>Краткий обзор тура</h4></div>
  </section>

   <section class="tour-guide-info">
    <div class="container">
      <div class="row">
        <?php echo $tour_inday; ?>
      </div>
    </div>
  </section>

  <section class="places-should-visit">
    <div class="container"><h4>Места которые должен посетить каждый</h4></div>
  </section>

  <section class="places-list">
    <div class="container">
      <div class="row p-15">
        <div class="col-md-4 place-item p-0">
          <div class="place-image-wrapper">
            <div class="dark_bg"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/images/places/martvill.png" alt="" />
            <div class="place-content d-flex justify-content-center align-items-center">
              <h4>Мартвильские каньоны</h4>
              <p>Мартвильские каньоны - Интерес к этой местности вызывает увлекательный километровый каньон с водопадом и недавние находки палеонтологов. По официальным данным, здесь нашли следы обитания первобытного человека и доисторических животных, которые жили на земле 73 миллиона лет назад, а также сохранившиеся следы динозавров и даже их окаменевшие скелеты. Каньоны расположены недалеко от города Зугдиди и пользуются популярностью.  Вы можете прогуляться на гондоле по живописному месту, это более похоже на захватывающее путешествие  или рафтинг.</p>
              <span class="place-plus">+</span>
              <span class="close">&#10006;</span>
            </div>
          </div>
        </div>
         <div class="col-md-4 place-item p-0">
          <div class="place-image-wrapper">
            <div class="dark_bg"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/images/places/tbilisi.png" />
            <div class="place-content d-flex justify-content-center align-items-center">
              <h4>Город<br/>Тбилиси</h4>
              <p>столица Грузии и самый большой город.  Архитектура Тбилиси удивит Вас своим разнообразием, узкие улочки с характерными балкончиками, современные мосты , древнейшие церкви и храмы, большое количество кафе и многое другое . Все это создают микс незабываемой атмосферы.  Для осмотра всех его красот Вам понадобится не менее 3 дней.</p>
              <span class="place-plus">+</span>
              <span class="close">&#10006;</span>
            </div>
          </div>
        </div>
         <div class="col-md-4 place-item p-0">
          <div class="place-image-wrapper">
            <div class="dark_bg"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/images/places/borjomi.png" />
            <div class="place-content d-flex justify-content-center align-items-center">
              <h4>Город<br/>Боржоми</h4>
              <p>Знаменитый город Боржоми- Боржоми — это точно одно из самых популярных названий связанных с Грузией и конечно все ассоциируют его со знаменитой лечебной водой. голубым куполом находится источник с настоящей боржомской водой. Она очень сильно отличается от бутылочной по вкусу, но это истинно натуральная и целебная вода, которую можно пить без ограничений и совершенно бесплатно. Говорят, что для быстрого омолаживания нужно окунуться во всех бассейнах по очередности, начиная с холодного, как в сказке “Конёк — Горбунок”. Кстати, расстояние от входа в парк до бассейнов где-то три километра в одну сторону, что тоже пойдёт во благо, особенно если ходить к ним часто.</p>
              <span class="place-plus">+</span>
              <span class="close">&#10006;</span>
            </div>
          </div>
        </div>
         <div class="col-md-4 place-item p-0">
          <div class="place-image-wrapper">
            <div class="dark_bg"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/images/places/martvill.png" alt="" />
            <div class="place-content d-flex justify-content-center align-items-center">
              <h4>Мартвильские каньоны</h4>
              <p>Мартвильские каньоны - Интерес к этой местности вызывает увлекательный километровый каньон с водопадом и недавние находки палеонтологов. По официальным данным, здесь нашли следы обитания первобытного человека и доисторических животных, которые жили на земле 73 миллиона лет назад, а также сохранившиеся следы динозавров и даже их окаменевшие скелеты. Каньоны расположены недалеко от города Зугдиди и пользуются популярностью.  Вы можете прогуляться на гондоле по живописному месту, это более похоже на захватывающее путешествие  или рафтинг.</p>
              <span class="place-plus">+</span>
              <span class="close">&#10006;</span>
            </div>
          </div>
        </div>
         <div class="col-md-4 place-item p-0">
          <div class="place-image-wrapper">
            <div class="dark_bg"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/images/places/tbilisi.png" />
            <div class="place-content d-flex justify-content-center align-items-center">
              <h4>Город<br/>Тбилиси</h4>
              <p>столица Грузии и самый большой город.  Архитектура Тбилиси удивит Вас своим разнообразием, узкие улочки с характерными балкончиками, современные мосты , древнейшие церкви и храмы, большое количество кафе и многое другое . Все это создают микс незабываемой атмосферы.  Для осмотра всех его красот Вам понадобится не менее 3 дней.</p>
              <span class="place-plus">+</span>
              <span class="close">&#10006;</span>
            </div>
          </div>
        </div>
         <div class="col-md-4 place-item p-0">
          <div class="place-image-wrapper">
            <div class="dark_bg"></div>
            <img src="<?php echo get_template_directory_uri(); ?>/images/places/borjomi.png" />
            <div class="place-content d-flex justify-content-center align-items-center">
              <h4>Город<br/>Боржоми</h4>
              <p>Знаменитый город Боржоми- Боржоми — это точно одно из самых популярных названий связанных с Грузией и конечно все ассоциируют его со знаменитой лечебной водой. голубым куполом находится источник с настоящей боржомской водой. Она очень сильно отличается от бутылочной по вкусу, но это истинно натуральная и целебная вода, которую можно пить без ограничений и совершенно бесплатно. Говорят, что для быстрого омолаживания нужно окунуться во всех бассейнах по очередности, начиная с холодного, как в сказке “Конёк — Горбунок”. Кстати, расстояние от входа в парк до бассейнов где-то три километра в одну сторону, что тоже пойдёт во благо, особенно если ходить к ним часто.</p>
              <span class="place-plus">+</span>
              <span class="close">&#10006;</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

   <section class="single-rev">
    <div class="container">
      <h4 class="text-center">Отзывы</h4>
      <div class="row">
        <div class="col-12 rev-item">
          <div class="name-rating d-flex justify-content-between">
            <h5 class="name">Георгий Данелия, Тбилиси</h5>
            <div class="rating">
               <div class="rev-rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
            </div>
          </div>
          <div class="rev-text">
            И покажу Вам самые интересные места в нашем туреLorem ipsum dolor sit amet, maiores ornare ac fermentum, imperdiet ut vivamus a, nam lectus at nunc. Quam euismod sem, semper ut potenti pellentesque quisque.  n eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in i
          </div>
        </div>
         <div class="col-12 rev-item">
          <div class="name-rating d-flex justify-content-between">
            <h5 class="name">Георгий Данелия, Тбилиси</h5>
            <div class="rating">
               <div class="rev-rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
            </div>
          </div>
          <div class="rev-text">
            И покажу Вам самые интересные места в нашем туреLorem ipsum dolor sit amet, maiores ornare ac fermentum, imperdiet ut vivamus a, nam lectus at nunc. Quam euismod sem, semper ut potenti pellentesque quisque.  n eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in i
          </div>
        </div>
         <div class="col-12 rev-item">
          <div class="name-rating d-flex justify-content-between">
            <h5 class="name">Георгий Данелия, Тбилиси</h5>
            <div class="rating">
               <div class="rev-rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </div>
            </div>
          </div>
          <div class="rev-text">
            И покажу Вам самые интересные места в нашем туреLorem ipsum dolor sit amet, maiores ornare ac fermentum, imperdiet ut vivamus a, nam lectus at nunc. Quam euismod sem, semper ut potenti pellentesque quisque.  n eget sapien sed, sit duis vestibulum ultricies, placerat morbi amet vel, nullam in i
          </div>
        </div>
      </div>
      <div class="load-more-wrapper text-center">
          <a class="load-more" href="">Cмотреть еще</a>
        </div>
    </div>
  </section>