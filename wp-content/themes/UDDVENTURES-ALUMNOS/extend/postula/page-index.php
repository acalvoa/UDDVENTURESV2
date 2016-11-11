<section class="EXTEND_postula" id="postula">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
				<div class="header">POSTULA</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="postulaciones-imagen">
				<div class="postulaImg"><img src="<?php echo get_postula_int_image(); ?>" /></div>
			</div>
		</div>
		<div class="row postulaciones interior" >
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 postulaciones-items nopadding">
				<?php
					$args=array(
					  'post_type' => 'postulaciones',
					  'post_status' => 'publish'
					);
					$my_query = new WP_Query($args);
					$numero = 1;
					if( $my_query->have_posts() ) {
	  					while ($my_query->have_posts()){
	  						$my_query->the_post();
	  						$custom_fields = get_field_objects();
	  						$fecha_init = $custom_fields['fecha_init_postulacion']['value'];
							$fecha_finish = $custom_fields['fecha_finish_postulacion']['value'];
							$is_active = ($fecha_init <= time() && time() <= $fecha_finish)? true: false;
	  						if($custom_fields['estado_postulacion']['value']  || true){
	  						?>
	  						<div class="itemPostula row">
								<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 numero nopadding" >
									<div class="figura" style="background-color: <?php echo $custom_fields['color_postulacion']['value']; ?>;"></div>
								</div>
								<div class="col-xs-offset-1 col-xs-9 col-sm-9 col-md-9 col-lg-9 texto" style="border-color: <?php echo $custom_fields['color_postulacion']['value']; ?>;">
									<div class="titulo"><h4><?php echo the_title(); ?></h4></div>
									<div class="bajada"><?php echo the_content(); ?></div>
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 boton pull-right" style="border-color: <?php echo $custom_fields['color_postulacion']['value']; ?>;">
									<div class="container-center">
										<div class="buttons-wrapper">
											<div class="button button-postulacion <?php if(!$is_active){ echo "closeb"; }?>" data-link="<?php if($is_active){ echo get_permalink(); } else { echo 'NOTLINK'; } ?>" style="background-color: <?php echo $custom_fields['color_postulacion']['value']; ?>;" data="<?php echo $numero++; ?>"><?php if($is_active){ echo "POSTULA"; } else{ echo "CERRADA"; }?></div>
											<div class="button button-info">DESCARGAR BASES</div>
										</div>
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
	</div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/postula/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/postula/js/postula.js"></script>