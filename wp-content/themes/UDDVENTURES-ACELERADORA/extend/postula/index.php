<section class="EXTEND_postula" id="postula">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header">
				CONVOCATORIAS
			</div>
		</div>
		<div class="row postulaciones" >
			<div class="col-xs-12 visible-xs-block" id="postulaciones-imagen-landing">
				<div class="postulaImg"><img src="<?php echo get_postula_image(); ?>" /></div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 postulaciones-items">
				<?php
					$args=array(
					  'post_type' => 'convocatorias',
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
	  						<div class="convocatoria-container">
								<div class="label" style="display:<?php if($is_active){ echo 'block'; } else { echo 'none'; }?>">Abierta</div>
								<div class="image" style="background-image: url('<?php echo $custom_fields['imagen_postulacion']['value']['url']; ?>');"></div>
								<div class="description" style="background: <?php echo $custom_fields['color_postulacion']['value']; ?>">
									<div class="title"><?php echo the_title(); ?></div>
									<div class="contenido"><?php echo $custom_fields['resumen_postulacion']['value']; ?></div>
									<div class="btn_read" data-link="<?php echo get_permalink(); ?>">Leer Mas</div>
									<div class="btn_status" data-link="<?php if($is_active){ echo get_permalink(); } else { echo 'NOTLINK'; }  ?>"><?php if($is_active){ echo "ABIERTA"; } else{ echo "CERRADA"; }?></div>
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
	</div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/postula/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/postula/js/postula.js"></script>