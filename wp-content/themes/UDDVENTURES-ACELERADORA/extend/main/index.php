<section class="EXTEND_main">
	<div class="slider">
		<div class="slider_array">
		<?php
			$args=array(
			  	'post_type' => 'vitrina',
			  	'post_status' => 'publish',
			  	'nopaging' => true,
			);
			$bounces = 0;
			$my_query = new WP_Query($args);
			if( $my_query->have_posts() ) {
				while ($my_query->have_posts()){ 
  					$bounces++;
  					$my_query->the_post();
					$custom_fields = get_field_objects();
		?>
			<div class="slider-element" url="<?php echo $custom_fields['url']['value']; ?>" style="background-image: url('<?php echo $custom_fields['imagen_de_vitrina']['value']['url']; ?>');"></div>
		<?php
				}
			}
		?>
		</div>
		<div class="slider_flecha derecha" dir="der"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
		<div class="slider_flecha izq" dir="izq"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<div class="bounce">
		<?php 
			for($i=0;$i<$bounces;$i++){
				?><div class="bounces" ite="<?php echo $i; ?>"></div><?php
			}
		?>
		</div>
	</div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/main/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
