<?php 
if( is_singular('tg_city') ){
  get_header('city');
}else{
  get_header('single');
}

 ?>

<?php $id_tour = get_the_ID();

$cat_tour = get_terms( array(
  'taxonomy' => 'tourcat',
  'hide_empty' => false,
  'object_ids' => $id_tour
) ); 


if( is_singular('tg_city') ){

 get_template_part('single-city-template'); 


}else{


  if( $cat_tour[0]->slug == 'singleday' ){ 

    get_template_part('single-tour-template'); 

}else{

     get_template_part('multiple-tour-template'); 

}

}




?>
 
<?php get_footer(); ?>