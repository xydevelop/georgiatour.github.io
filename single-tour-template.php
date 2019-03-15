<?php

$tour = get_queried_object();

$id_tour = get_the_ID();

 $type_tour = get_terms( array(
  'taxonomy' => 'tourtheme',
  'hide_empty' => false,
  'object_ids' => $id_tour
) );

 $length_type_tour = count($type_tour);


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
  <section class="page tour-page" style="font: 400 15px Roboto; color: #686868;">
    <div class="container">
      <div class="row">
        <div class="col-md-7 single-tour places">
          <div class="tour-description">
              <h4>Описание тура</h4>
              <?php if( $tour_description ) ?> <p><?php echo $tour_description; ?></p>
          </div>
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
               <div class="col-md-5">
          <div class="tour-info row item">
            <h3><?php the_title(); ?></h3>
            <div class="single-rating-wrap col-md-8 p-0">
              <h4>Однодневный тур</h4>
              <div class="rating-single row rev-wrap">
               
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
              <div class="d-flex justify-content-between"><h6>Продолжительность</h6><span><?php if( $tour_time ){ echo $tour_time; }?></span></div>
              <div class="d-flex justify-content-between"><h6>Транспорт</h6><span><?php if( $tour_transp ) echo $tour_transp; ?></span></div>
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
            <div class="single-bottom single-t">
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
        <!--<p class="include-tour col-12">*Экскурсию можно планировать  как из Тбилиси, так же из Кутаиси. Так  же можно планировать по вашему желанию , можно добавить или заменить объекты  посещения.</p>-->
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

  <section class="places-should-visit">
    <div class="container"><h4>Места которые должен посетить каждый</h4></div>
  </section>

  <section class="places-list">
    <div class="container">
      <div class="row p-15">


       <?php $places = new WP_Query( 
    array( "post_type" => "tg_place",
     'post_per_page' => 15
  
    ) ); ?>

 <?php if ($places->have_posts()) : while ($places->have_posts()) : $places->the_post(); 

 $place_photo_src = get_the_post_thumbnail_url( $post, 'large' );

 ?>

        <div class="col-md-4 place-item p-0">
          <div class="place-image-wrapper">
            <div class="dark_bg"></div>
            <img src="<?php echo $place_photo_src; ?>" alt="" />
            <div class="place-content d-flex justify-content-center align-items-center">
              <h4><?php the_title(); ?></h4>
              <p><?php the_content(); ?></p>
              <span class="place-plus">&#43;</span>
              <span class="close">&#43;</span>
            </div>
          </div>
        </div>
         
        <?php  endwhile; 



        else :
        
            get_template_part('content-none'); 
        endif; wp_reset_postdata();  ?>   
     
     
      </div>
    </div>
  </section>

   <section class="single-rev">
    <div class="container">
      <h4 class="text-center">Отзывы</h4>
     <div class="row">


       <?php $review = new WP_Query( 
    array( "post_type" => "tg_rev",
     'post_per_page' => 99
  
    ) ); ?>

 <?php if ($review->have_posts()) : while ($review->have_posts()) : $review->the_post(); 

 $rev_rating = get_field('gt_rev_rating', $post->ID);

  $rev_tour = get_field('gt_rev_tour', $post->ID);

  $rev_bool = true;

$rev_count = count($rev_tour);



if( $rev_tour > 1){


if( !in_array($tour,$rev_tour) ) $rev_bool = false; 


}else{

  if( $post != $rev_tour[0] ) $rev_bool = false;
}

  


if( $rev_bool == false ) continue; 



 
  



 ?>

        <div class="col-12 rev-item">
          <div class="name-rating d-flex justify-content-between">
            <h5 class="name"><?php the_title(); ?></h5>
            <div class="rating">
               <div class="rev-rating">

                <?php 
                      if( $rev_rating ){ 
                        for( $i = 0; $i < $rev_rating; $i++){ ?>
                          <i class="fa fa-star" aria-hidden="true"></i>
                        <?php }
                      }
                    ?>
                  </div>
            </div>
          </div>
          <div class="rev-text">
            <?php the_content(); ?>
          </div>
        </div>
         
        <?php  endwhile; 



        else :
        
            get_template_part('content-none'); 
        endif; wp_reset_postdata();  ?> 

      </div>
       <div class="load-more-wrapper text-center">
          <a class="load-more" href="">Cмотреть еще</a>
        </div>
    </div>
  </section>