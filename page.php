<?php get_header(); ?>

<!-- Map -->
  <section class="section" id="map">
    <h2 id="georgia-travel-parallax">Грузия</h2>
    <div class="container map-container">
      <div class="row">
        <div class="col-md-8 map-wrapper">
          <img src="<?php echo get_template_directory_uri(); ?>/images/georgia_travel_map.png" />
        </div>
        <div class="col-md-4 map-info">
          <div class="map-shadow-wrapper">
             <div class="map-image-wrapper">
            <img src="<?php echo get_template_directory_uri(); ?>/images/batumi.png" alt="" />
          </div>
          <div class="map-info-wrapper">
            <h3>Батуми</h3>
            <p>Lorem ipsum dolor sit amet, maiores ornare ac quo ut lectus, etiam vestibulum etiam vestibulum  etiam vestibulum</p>
            <div class="select-tour">
              <i>выбрать тур</i><span><span class="arrow-btn"></span></span>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    <!-- Cities -->
  <section class="section container" id="city">
    <h2>Выберите город</h2>
    <p class="text-center city-text">По Грузии туристы столкнутся с одной из самых влиятельных и живых</br> 
национальных культурных традиций</p>
    <div class="row">



           <?php $city = new WP_Query( 
    array( "post_type" => "tg_city",
     'post_per_page' => 12
  
    ) ); 
$i = 1;
$cityHTML = '';
$cityCLASS = '';
?>


<?php if ($city->have_posts()) : while ($city->have_posts()) : $city->the_post(); ?>

      <?php 

        $id_city = get_the_ID(); 

        $city_photo_src = get_the_post_thumbnail_url( $post, 'large' );

switch($i){

 case 1 : $cityCLASS = 'col-md-8 city pr-0';
break;


case 2 : $cityCLASS = 'col-md-4 city pr-0';
break;


case 3 : $cityCLASS = 'col-md-3 city pr-0';
break;

case 4 : $cityCLASS = 'col-md-3 city pr-0';
break;
    
case 5 : $cityCLASS = 'col-md-6 city pr-0';
break;

case 6 : $cityCLASS = 'col-md-3 city pr-0';
break;

case 7 : $cityCLASS = 'col-md-3 city pr-0';
break;

case 8 : $cityCLASS = 'col-md-3 city pr-0';
break;

case 9 : $cityCLASS = 'col-md-3 city pr-0';
break;

case 10 : $cityCLASS = 'col-md-6 city pr-0';
break;

case 11 : $cityCLASS = 'col-md-3 city pr-0';
break;

case 12 : $cityCLASS = 'col-md-3 city pr-0';
break;


}



$cityHTML = '<div class="'.$cityCLASS.'">
            <div class="shadow-wrapper">
              <div class="city-wrapper">
                <img src="'.$city_photo_src.'" alt="" />
                <div class="city-overlay">
                  <h5>'.get_the_title().'</h5>
                  <p>'.get_the_excerpt().'</p>
                   <a href="'.get_the_permalink().'"><div class="btn_city">
                    <div class="add_booking"><i>выбрать тур</i><span><div class="arrow-btn"></div></span></div>
                  </div></a>
                </div>
              </div>
            </div>
        </div>';

echo $cityHTML;

$cityHTML = '';
$cityCLASS = '';

?>





  <?php  
$i++;

endwhile;
  else :
        
            get_template_part('content-none'); 
        endif; wp_reset_postdata();  ?>
    </div>

     
  

  </section>
    <!-- Single Tour -->
  <section class="section" id="single_tour">
    <div class="container">
      <h2>Однодневные туры</h2>
      <div class="row">

           <?php $tour = new WP_Query( 
    array( "post_type" => "tg_tour",
  
     'tax_query' => array(
    array(
      'taxonomy' => 'tourcat',
      'field'    => 'slug',
      'terms'    => 'singleday'
    )
  ),
     'post_per_page' => 9
  
    ) ); ?>

     <?php if ($tour->have_posts()) : while ($tour->have_posts()) : $tour->the_post(); ?>

      <?php 

        $id_tour = get_the_ID();

         $type_tour = get_terms( array(
  'taxonomy' => 'tourtheme',
  'hide_empty' => false,
  'object_ids' => $id_tour
) );

         $length_type_tour = count($type_tour);

         $tour_photo_src = get_the_post_thumbnail_url( $post, 'large' );
$tour_sale = get_field('gt_tour_sale',$id_tour);
$tour_city = get_field('gt_tour_city_list',$id_tour);

$tour_time = get_field('gt_tour_time',$id_tour);
$tour_price = get_field('gt_tour_price',$id_tour);
$tour_sale_price = get_field('gt_sale_price',$id_tour);
$tour_rating = get_field('gt_tour_rating',$id_tour);
$tour_rt_count = get_field('gt_tour_qunt',$id_tour);

//var_dump($tour_city);

if( $tour_photo_src ){ 
  $tour_photo = '<img src="'.$tour_photo_src.'" alt="" />'; 
}else{ 
  $tour_photo = '<i class="fa fa-picture-o" aria-hidden="true"></i>'; 
} ?>

        <div class="col-md-4 tour-item pr-0 item">
          <a href="<?php the_permalink(); ?>">
          <div class="shadow-wrapper">
            <div class="tour-image-wrapper">
             <?php echo $tour_photo; ?>
            </div>
            <?php if( !empty($tour_sale) && $tour_sale != 0 ){ ?><div class="tour-action"><span>-<?php echo $tour_sale ?>%</span></div><?php } ?>
            <div class="tour-wrapper">
              <h4><?php the_title(); ?></h4>
              <p><?php 
                $i = 1;
              foreach( $type_tour as $ttk => $ttv ){
                  if( $length_type_tour > 1 &&  $length_type_tour != $i ){
                     if( $i == 20 ){ break ;}
                    echo $ttv->name.', ';
                  }else{
                    echo $ttv->name;
                  }
                  $i++;
              } ?></p>
              <div class="row">
                <div class="col-md-6">
                  <div class="city-icon"><?php if( $tour_city ){ ?><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $tour_city[0]->post_title; }  ?></div>
                  <div class="time-icon"><?php if( $tour_time){ ?><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $tour_time; } ?></div>
                </div>
                <div class="col-md-6 price-wrapper">
                  <div class="cost">
                    <?php if( !empty($tour_sale) && $tour_sale != 0 ){ ?>
                        <div class="price"><?php if( $tour_sale_price ) echo $tour_sale_price; ?></div>
                    <?php } ?>
                    
                    <div class="sale-price"><?php if( $tour_price ) echo $tour_price; ?></div>
                    <span>* за человека</span>
                  </div>
                </div>
              </div>
              <div class="row rev-wrap">
                <div class="col-md-7 pr-0">
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
                <div class="col-md-5"><span class="btn_tour">Забронировать</span></div>
              </div>
            </div>
          </div></a>
        </div>

         <?php  endwhile; 



        else :
        
            get_template_part('content-none'); 
        endif; wp_reset_postdata();  ?>
      
        </div>
        <div class="load-more-wrapper text-center">
          <a class="load-more" href="">Смотреть еще</a>
        </div>
    </div>
  </section>
    <!-- Multiple Tour -->
  <section class="section" id="mult_tour">
    <div class="container">
      <h2>Многодневные туры</h2>
      <div class="row">
         
   
       <?php $tour = new WP_Query( 
    array( "post_type" => "tg_tour",
  
     'tax_query' => array(
    array(
      'taxonomy' => 'tourcat',
      'field'    => 'slug',
      'terms'    => 'fewdays'
    )
  ),
     'post_per_page' => 9
  
    ) ); ?>

     <?php if ($tour->have_posts()) : while ($tour->have_posts()) : $tour->the_post(); ?>

      <?php 

        $id_tour = get_the_ID();

         $type_tour = get_terms( array(
  'taxonomy' => 'tourtheme',
  'hide_empty' => false,
  'object_ids' => $id_tour
) );

         $length_type_tour = count($type_tour);

         $tour_photo_src = get_the_post_thumbnail_url( $post, 'large' );
$tour_sale = get_field('gt_tour_sale',$id_tour);
$tour_city = get_field('gt_tour_city_list',$id_tour);

$tour_time = get_field('gt_tour_time',$id_tour);
$tour_price = get_field('gt_tour_price',$id_tour);
$tour_sale_price = get_field('gt_sale_price',$id_tour);
$tour_rating = get_field('gt_tour_rating',$id_tour);
$tour_rt_count = get_field('gt_tour_qunt',$id_tour);

//var_dump($tour_city);

if( $tour_photo_src ){ 
  $tour_photo = '<img src="'.$tour_photo_src.'" alt="" />'; 
}else{ 
  $tour_photo = '<i class="fa fa-picture-o" aria-hidden="true"></i>'; 
} ?>



        <div class="col-md-4 tour-item pr-0 item">
          <a href="<?php the_permalink(); ?>">
          <div class="shadow-wrapper">
            <div class="tour-image-wrapper">
             <?php echo $tour_photo; ?>
            </div>
            <?php if( !empty($tour_sale) && $tour_sale != 0 ){ ?><div class="tour-action"><span>-<?php echo $tour_sale ?>%</span></div><?php } ?>
            <div class="tour-wrapper">
              <h4><?php the_title(); ?></h4>
              <p><?php 
                $i = 1;
              foreach( $type_tour as $ttk => $ttv ){
                  if( $length_type_tour > 1 &&  $length_type_tour != $i ){
                     if( $i == 20 ){ break ;}
                    echo $ttv->name.',';
                  }else{
                    echo $ttv->name;
                  }
                  $i++;
              } ?></p>
              <div class="row">
                <div class="col-md-6">
                  <div class="city-icon"><?php if( $tour_city ){ ?><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $tour_city[0]->post_title; }  ?></div>
                  <div class="time-icon"><?php if( $tour_time){ ?><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $tour_time; } ?></div>
                </div>
                <div class="col-md-6 price-wrapper">
                  <div class="cost">
                    <?php if( !empty($tour_sale) && $tour_sale != 0 ){ ?>
                        <div class="price"><?php if( $tour_sale_price ) echo $tour_sale_price; ?></div>
                    <?php } ?>
                    
                    <div class="sale-price"><?php if( $tour_price ) echo $tour_price; ?></div>
                    <span>* за человека</span>
                  </div>
                </div>
              </div>
              <div class="row rev-wrap">
                <div class="col-md-7 pr-0">
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
                <div class="col-md-5"><span class="btn_tour">Забронировать</span></div>
              </div>
            </div>
          </div></a>
        </div>

         <?php  endwhile; 



        else :
        
            //get_template_part('content-none'); 
        endif; wp_reset_postdata();  ?>
     
        
      </div>
       <div class="load-more-wrapper text-center">
          <a class="load-more" href="">Смотреть еще</a>
        </div>
    </div>
  </section>

<?php get_footer(); ?>