<section class="EXTEND_redes" id="redes">
	<div class="container" id="news-folder">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="header">QUIÉNES SOMOS</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="subheader">
				<?php 
					$numero = 1;
					$category = array();
					$taxonomies = get_object_taxonomies('quiensomos');
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
		</div>
			<?php
				$numero = 1;
				foreach ($category as $vector) {
					$args=array(
					  'post_type' => 'quiensomos',
					  'post_status' => 'publish',
					  'nopaging' => true,
					  'tax_query' => array(
							array(
								'taxonomy' => 'quiensomos-tipo',
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
			<div class="row redes">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control left">
					<div class="autocenter">
						<h3><i class="fa fa-angle-left"></i></h3>
					</div>
				</div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 containercol">
				<?php
						if( $my_query->have_posts() ) {
		  					while ($my_query->have_posts()){ 
		  						$my_query->the_post();
		  						$custom_fields = get_field_objects();
		  						$result = array(
		  							"title"=> get_the_title(),
		  							"image"=> $custom_fields['imagen']['value']['url'],
		  							"content"=> get_the_content(),
		  							"link"=>get_the_permalink()
		  						);
		  						?>
		  						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 newcol" >
									<div class="image">
										<img src="<?php echo $custom_fields['imagen']['value']['url']; ?>" />
										<div class="background"  data='<?php echo json_encode($result); ?>'>
											<div class="text">
												<div><?php echo get_the_title(); ?></div>
												<div>MAS INFO AQUI</div>
											</div>
										</div>
									</div>
								</div>
		  						<?php	  
		  						$numero++;						
		 				 	}
						}
						wp_reset_query();// Restore global post data stomped by the_post().
					
				?>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control right">
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
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/quiensomos/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/quiensomos/js/scripts.js"></script>
