<section class="EXTEND_recursos" id="recursos">
	<div class="container" id="news-folder">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="header">RECURSOS Y TESTIMONIOS</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="subheader">
				<?php 
					$numero = 1;
					$category = array();
					$taxonomies = get_object_taxonomies('recursos');
					foreach ( $taxonomies  as $taxonomy) {
						$termino = get_terms($taxonomy);
						$category[] = $termino[0]->name;
					?>
					    <div class="tipos <?php if($numero++ === 1) echo 'active'; ?>" data-id="<?php echo $termino[0]->name; ?>"><?php print_r($termino[0]->name); ?></div>
					<?php
					}
				?>
				</div>
			</div>
		</div>
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 left-back"><h2><i class="fa fa-angle-left"></i></h2></div>
		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
			<?php
				$numero = 1;
				foreach ($category as $vector) {
					$args=array(
					  'post_type' => 'recursos',
					  'post_status' => 'publish',
					  'tax_query' => array(
							array(
								'taxonomy' => 'recursos-tipo',
								'field'    => 'name',
								'terms'    => $vector,
							),
						)
					);
					
					$my_query = new WP_Query($args);
			?>
			<div class="element-group" data-id="<?php echo $vector; ?>" style="<?php if($numero++ == 1) echo 'display:block;'; ?>">
				<div class="row move_control">
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control left"><h2><i class="fa fa-angle-left"></i></h2></div>
					<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"></div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control right"><h2><i class="fa fa-angle-right"></i></h2></div>
				</div>
				<div class="row recursos">
					<?php
							if( $my_query->have_posts() ) {
			  					while ($my_query->have_posts()){ 
			  						$my_query->the_post();
			  						$custom_fields = get_field_objects();
			  						?>
			  						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 newcol" >
										<div class="image-index" data-link="<?php echo $custom_fields['archivo']['value']['url']; ?>">
											<img src="<?php echo $custom_fields['imagen']['value']['url']; ?>" />
											<div class="background"><div>DESCARGAR</div></div>
										</div>
										<div class="content">
											<div class="title"><h4><?php echo get_the_title(); ?></h4></div>
											<div class="resumen"><?php echo get_the_content(); ?></div>
										</div>
									</div>
			  						<?php	  
			  						$numero++;						
			 				 	}
							}
							wp_reset_query();// Restore global post data stomped by the_post().
					?>
				</div>
			</div>
			<?php
				}
			?>
		</div>
			
	</div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/recursos/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/recursos/js/scripts.js"></script>
