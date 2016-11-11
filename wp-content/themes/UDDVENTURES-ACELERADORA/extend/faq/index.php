<section class="EXTEND_faq" id="faq">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
				<div class="header">FAQS</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="postulaciones-imagen">
				<div class="postulaImg"><img src="<?php echo get_faq_image(); ?>" /></div>
			</div>
		</div>
		<div class="row faqrow">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 faq-items">
				<div class="container-fluid">
				<?php 
					$args=array(
					  'post_type' => 'faqs',
					  'post_status' => 'publish',
					  'nopaging' => true
					);
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
	  					while ($my_query->have_posts()){ 
	  						$my_query->the_post();
	  						$custom_fields = get_field_objects();
	  						$numero=1;
	  						?>
	  						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 faq-item">
								<div class="title" data-id="<?php echo $numero++; ?>">
									<div class="etiqueta"><i class="fa fa-angle-right"></i></div>
									<div class="texto"><?php the_title(); ?></div>
								</div>
								<div class="contenido"><?php the_content(); ?></div>
							</div>
	  						<?php
	  						
	  					}
					}
					wp_reset_query();
				?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/faq/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/faq/js/scripts.js"></script>