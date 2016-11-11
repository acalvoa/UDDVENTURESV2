<section class="EXTEND_postula" id="postula">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header">
				POSTULA
			</div>
		</div>
		<div class="row postulaciones" >
			<div class="col-xs-12 visible-xs-block" id="postulaciones-imagen-landing">
				<div class="postulaImg"><img src="<?php echo get_postula_image(); ?>" /></div>
			</div>
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 postulaciones-items">
				<div class="postulaciones-wrapper">
					<?php
						$args=array(
						  'post_type' => 'postulaciones',
						  'post_status' => 'publish',
						  'nopaging' => true
						);
						$my_query = new WP_Query($args);
						$numero = 1;
						if( $my_query->have_posts() ) {
		  					while ($my_query->have_posts()){
		  						$my_query->the_post();
		  						$custom_fields = get_field_objects();
		  						$fecha_init = $custom_fields['fecha_init_postulacion']['value'];
								$fecha_finish = $custom_fields['fecha_finish_postulacion']['value'];
								$is_active = (intval($fecha_init) <= time() && time() <= intval($fecha_finish))? true: false;
		  						if($custom_fields['estado_postulacion']['value'] || true){
		  						?>
		  						<div class="itemPostula">
									<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 numero">
										<div class="figura" style="background-color: <?php echo $custom_fields['color_postulacion']['value']; ?>;"><?php echo $numero; ?></div>
									</div>
									<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 texto">
										<div class="titulo"><h4><?php echo the_title(); ?></h4></div>
										<div class="bajada"><?php echo substr($custom_fields['resumen_postulacion']['value'],0, 55); ?></div>
									</div>
									<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 boton">
										<div class="container-center">
											<div class="button button-postulacion <?php if(!$is_active){ echo "closeb"; }?>" data-link="<?php if($is_active){ echo get_permalink(); } else { echo 'NOTLINK'; }  ?>" style="background-color: <?php echo $custom_fields['color_postulacion']['value']; ?>;" data="<?php echo $numero++; ?>"><?php if($is_active){ echo "ABIERTA"; } else{ echo "CERRADA"; }?></div>
											<div class="button button-info" data-link="<?php echo get_permalink(); ?>">M&Aacute;S INFO AQUÍ</div>
										</div>
									</div>
								</div>
		  						<?php
		  						}
		 				 	}
						}
						wp_reset_query();// Restore global post data stomped by the_post().
					?>
				</div>
			</div>
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 visible-sm-block visible-md-block visible-lg-block" id="postulaciones-imagen-landing">
				<div class="postulaImg"><img src="<?php echo get_postula_image(); ?>" /></div>
			</div>
		</div>
	</div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/postula/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/postula/js/postula.js"></script>