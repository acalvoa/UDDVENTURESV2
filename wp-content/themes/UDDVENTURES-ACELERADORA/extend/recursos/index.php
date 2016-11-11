<section class="EXTEND_recursos" id="recursos">
	<div class="container" id="news-folder">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header">
				RECURSOS Y TESTIMONIOS
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 subheader">
				<?php 
					$numero = 1;
					$category = array();
					$taxonomies = get_object_taxonomies('recursos');
					$taxonomies = get_terms($taxonomies[0]);
					foreach ( $taxonomies  as $taxonomy) {
						$category[] = $taxonomy->name;
					?>
					    <div class="tipos <?php if($numero++ === 1) echo 'active'; ?>" data-id="<?php echo $taxonomy->name; ?>"><?php echo $taxonomy->name; ?></div>
					<?php
					}
				?>
				</div>
		</div>
			<?php
				$numero = 1;
				foreach ($category as $vector) {
					$args=array(
					  	'post_type' => 'recursos',
					  	'post_status' => 'publish',
					  	'nopaging' => true,
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
		<div class="element-group <?php if($numero === 1) echo 'activerow'; ?>" data-id="<?php echo $vector; ?>" style="<?php if($numero++ === 1) echo 'display:block;'; ?>">
			<!--<div class="row move_control">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control left"><h2><i class="fa fa-angle-left"></i></h2></div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"></div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control right"><h2><i class="fa fa-angle-right"></i></h2></div>
			</div>-->
			<div class="row recursos">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control left <?php if($my_query->found_posts > 5) echo 'double'; ?>">
					<div class="autocenter">
						<h3><i class="fa fa-angle-left"></i></h3>
					</div>
				</div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 containercol containervideo">
				<?php
						if( $my_query->have_posts() ) {
		  					while ($my_query->have_posts()){ 
		  						$my_query->the_post();
		  						$custom_fields = get_field_objects();
		  						if($vector == "Videos"){
		  							?>
		  							<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 newcol video" >
										<iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo $custom_fields['link_video']['value']; ?>" frameborder="0" allowfullscreen></iframe>
									</div>
		  							<?php
		  						}
		  						else
		  						{
		  						?>
		  						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 newcol" >
									<div class="image" data-link="<?php if(!empty($custom_fields['archivo']['value'])) echo $custom_fields['archivo']['value']['url']; else echo $custom_fields['link_archivo']['value']; ?>">
										<img src="<?php echo $custom_fields['imagen']['value']['url']; ?>" />
										<div class="background"><div>DESCARGAR</div></div>
									</div>
									<div class="content">
										<div class="title"><?php echo get_the_title(); ?></div>
										<!-- <div class="resumen"><?php echo get_the_content(); ?></div> -->
									</div>
								</div>
		  						<?php	 
		  						}
		  						$numero++;						
		 				 	}
						}
						wp_reset_query();// Restore global post data stomped by the_post().
				?>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control right <?php if($my_query->found_posts > 5) echo 'double'; ?>">
					<div class="autocenter">
						<h3><i class="fa fa-angle-right"></i></h3>
					</div>
				</div>
			</div>
		</div>
			<?php
				}
			?>
		
	</div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/recursos/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/recursos/js/scripts.js"></script>
