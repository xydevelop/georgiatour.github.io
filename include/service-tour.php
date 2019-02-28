<?php

	add_action('add_meta_boxes', 'register_tour_settings');

	function register_tour_settings() {
		add_meta_box('tour_plan_settings', 'Обзор тура', 'cb_tour_plan_settings','tg_tour');
		add_meta_box('tour_calendar_settings', 'Даты с запретом', 'cb_tour_date_settings','tg_tour');
	}

	function cb_tour_date_settings ($post) { //$post->ID ?>

<?php /**$icon1 = get_post_meta( $post->ID, 'ek_element_icon1')[0]; 

$icon2 = get_post_meta( $post->ID, 'ek_element_icon2')[0];


$icon3 = get_post_meta( $post->ID, 'ek_element_icon3')[0];*/
?>

<form method="POST">
			<input type="hidden" name="eks_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>" />
			<input type="hidden" name="eks_id" value="<?php echo $post->ID; ?>" />
			<button class="lsw-btn"> Форма календарь</button><br/>
			<span class='text overall'>Нажмите чтобы добавить:</span>
			
		<input type="submit" value="Сохранить" id="add_cost_id" />
		</form>





	<?php }

	function cb_tour_plan_settings ($post) { //$post->ID ?>

<form method="POST">
			<input type="hidden" name="eks_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>" />
			<input type="hidden" name="eks_id" value="<?php echo $post->ID; ?>" />
			<button class="lsw-btn"> + </button><br/>
			<span class='text overall'>Нажмите чтобы добавить:</span>
			<br/><br/><br/>
			<table style="width: 100%;">
					<tr valign="top">
			<div style="overflow: hidden;" class="lsw-fsa">
				<td><h4 style="margin-bottom: 5px;">Опишите первый и последующие дни: </h4><textarea style="height: 250px; width: 100%;" name="eks_name" placeholder="Описание"></textarea></td>
			</div>
		</tr>
		</table>
		<input type="submit" value="Сохранить" id="add_cost_id" />
		</form>
<br/>
<br/>
<br/>
<h4 style="margin: 0; padding-left: 3px;">Список дней</h4>
<div class="rm-cost-wrap">		
<table class="cost-table">
<tr>
<th scope="row">День</th>
<th scope="row">Описание</th>	
</tr>
	<?php 

			$values = get_post_meta( $post->ID, 'ek_element_price' );
		//delete_post_meta($post->ID, 'ek_element_price', array('dddd','222') );
			//var_dump($values);
			foreach($values as $v){
				echo '<tr><span><td>'.$v[0].'</td><td>'.$v[1].' р.</td><td style="text-align:center;"><a v1="'.$v[0].'" v2="'.$v[1].'" class="rm-cost" href="" style="text-decoration: none; color: red; font-size: 14px;"> x </a></td></span></tr>';
			}
		?>
	</table>
</div>

		<script>
		
			jQuery(document).ready(function(){

var icon1_data = "id="+<?php echo $post->ID; ?>;
var icon2_data = "id="+<?php echo $post->ID; ?>;
var icon3_data = "id="+<?php echo $post->ID; ?>;

jQuery(document).on('change','.text_icon', function(e) {
					e.preventDefault();
					var elem_id = jQuery(this).attr('text-icon');

					var text  = jQuery(this).val();

					switch( elem_id ) {

						case 'ek_element_icon1' : icon1_data += "&text="+text; 
						break;

						case 'ek_element_icon2' : icon2_data += "&text="+text; 
						break;

						case 'ek_element_icon3' : icon3_data += "&text="+text; 
						break;
					}

					
})

	jQuery(document).on('click','.dow_icon', function(e) {
					e.preventDefault();
					 var send_attachment_bkp = wp.media.editor.send.attachment;

					
					 var elem_id = jQuery(this).attr('wt-icon');

					

    var button = $(this);

   
 
    wp.media.editor.send.attachment = function(props, attachment) {
        wp.media.editor.send.attachment = send_attachment_bkp;
  
   
      	switch( elem_id ) {

						case 'ek_element_icon1' : icon1_data += "&url="+encodeURIComponent(attachment.url); 
						break;

						case 'ek_element_icon2' : icon2_data += "&url="+encodeURIComponent(attachment.url); 
						break;

						case 'ek_element_icon3' : icon3_data += "&url="+encodeURIComponent(attachment.url); 
						break;
					}

				var ek_image = jQuery(button).parent().find('img');

				
				if( !ek_image.attr('src') || ek_image.attr('src') === undefined ){
					jQuery(button).after('<img style="max-width: 80px;" src="'+attachment.url+'" alt="" />');
				}else{
					ek_image.attr('src',attachment.url)
				}


    }

    

    wp.media.editor.open(button);



				 	});

var eks_icon_nonce = jQuery('input[name="eks_icon_nonce"]').val();

	jQuery(document).on('click','#add_icon_id', function(e) {
					e.preventDefault();

				jQuery('.dnld').removeClass('disi');

					jQuery.ajax({

					    url: ajaxurl,
					    type: "POST", 
					    data: {
					      icon_nonce : eks_icon_nonce,
					      icon1_data : icon1_data,
					      icon2_data : icon2_data,
					      icon3_data : icon3_data,
					      action: 'icon-add',
					    },
					    complete: function(res){  
					    	if(res.readyState == 4){
					    		jQuery('.dnld').addClass('disi');
					    	}
					    	//console.log(res.responseText);
					    }

					   });

	})
				

	jQuery(document).on('click','.lsw-btn', function(e) {
					e.preventDefault();

			jQuery('.lsw-fsa').fadeIn('slow','linear')

	})
				
 

				jQuery(document).on('click','form #add_cost_id', function(e) {
					e.preventDefault();

var data = $(this).parents('form').serialize();

var cost =  $(this).parents('form').find('input[name="eks_cost"]').val();
var name = $(this).parents('form').find('textarea[name="eks_name"]').val();


jQuery('.rm-cost-wrap').append(
'<span>'+name+' - '+cost+'<a v1="'+name+'" v2="'+cost+'" class="rm-cost" href="" style="text-decoration: none; color: red; font-size: 14px;"> x </a><br/></span>'
);





					

					  jQuery.ajax({

					    url: ajaxurl,
					    type: "POST", 
					    data: {
					      data : data,
					      action: 'cost-add',
					    },
					    complete: function(res){  
					    	console.log(res.responseText);
					    }

					   });
										
				})

			

			})

			jQuery(document).on('click','.rm-cost', function(e) {
					e.preventDefault();

					var v1 = jQuery(this).attr('v1');
					var v2 = jQuery(this).attr('v2');

					 jQuery.ajax({

					    url: ajaxurl,
					    type: "POST", 
					    data: {
					      v1 : v1,
					      v2 : v2,
					      id : <?php echo $post->ID; ?>,
					      action: 'cost-rm',
					    },
					    complete: function(res){  
					    	console.log(res.responseText);
					    }

					   });

					 jQuery(this).parent().remove();


			})
		</script>

		<style>
		.dnld{ display: block; }
		.disi{ display: none; }
		.lsw-fsa{ display: none;  }
		table textarea.text_icon{ min-width: 500px;  }
		.cost-table th{ font-size: 10px; }
		.icon-table td{ display: block; }
	</style>

	<?php }



		/*add_action ('save_post', 'update_ekserv_settings');
		function update_ekserv_settings ( $td_post_id ) {

			//var_dump( update_post_meta($td_post_id, 'ek_element_price', array('best reason',150) ) );

				

			var_dump($td_post_id);

			//add_post_meta()
		// verify nonce.  

		/*if (!isset($_POST['cmb_nonce'])) {
			return false;		
		}

		if (!wp_verify_nonce($_POST['cmb_nonce'], basename(__FILE__))) {
			return false;
		}

		global $td_allowed, $wpdb;
		//Даем нормальные номера
		if( empty( get_post_meta( $td_post_id, 'job_proper_id', true ) ) ) {
			update_post_meta($td_post_id, 'job_proper_id', rs_get_proper_id( $td_post_id ) );
		}
		
		//regular update
		update_post_meta($td_post_id, 'wpjobus_job_fullname', wp_kses($_POST['wpjobus_job_fullname'], $td_allowed));
		update_post_meta($td_post_id, 'wpjobus_post_title', wp_kses($_POST['wpjobus_job_fullname'], $td_allowed));*/

	/*}*/