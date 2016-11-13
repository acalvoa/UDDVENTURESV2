<section class="EXTEND_emprendedores" id="emprendedores">
	<div class="container-fluid" id="news-folder">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header">
				STARTUPS
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 subheader">
				<?php 
					$numero = 1;
					$category = array();
					$taxonomies = get_object_taxonomies('emprendedores');
					$taxonomies = get_terms($taxonomies[0]);
					foreach (array_reverse($taxonomies)  as $taxonomy) {
						$category[] = $taxonomy->name;
					?>
					    <div class="tipos <?php if($numero++ === count($taxonomies)) echo 'active'; ?>" data-id="<?php echo $taxonomy->name; ?>"><?php echo $taxonomy->name; ?></div>
					<?php
					}
				?>
			</div>
		</div>
			<?php
				$numero = 1;
				foreach ($category as $vector) {
					$args=array(
					  'post_type' => 'emprendedores',
					  'post_status' => 'publish',
					  'nopaging' => true,
					  'tax_query' => array(
							array(
								'taxonomy' => 'emprendedores-tipo',
								'field'    => 'name',
								'terms'    => $vector,
							),
						)
					);
					
					$my_query = new WP_Query($args);
					$contenedor = array();
					if( $my_query->have_posts() ) {
	  					while ($my_query->have_posts()){ 
  							$my_query->the_post();
		  					$custom_fields = get_field_objects();
		  					$orden = $custom_fields['orden']['value'];
		  					if(!array_key_exists ($orden, $contenedor)) $contenedor[$orden] = array();
		  					$result = array(
	  							"title"=> get_the_title(),
	  							"image"=> $custom_fields['imagen']['value']['url'],
	  							"content"=> get_the_content(),
	  							"organizacion" => $custom_fields['organizacion']['value'],
	  							"link"=>$custom_fields['link']['value']
	  						);
		  					array_push($contenedor[$orden], $result);
  						}
					}
					wp_reset_query();// Restore global post data stomped by the_post().
			?>
		<div class="element-group <?php if($numero === count($category)) echo 'activerow'; ?>" data-id="<?php echo $vector; ?>" style="<?php if($numero++ == count($category)) echo 'display:block;'; ?>">
			<!--<div class="row move_control">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control left"><h2><i class="fa fa-angle-left"></i></h2></div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"></div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control right"><h2><i class="fa fa-angle-right"></i></h2></div>
			</div> -->
			<div class="row recursos">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control left">
					<div class="autocenter">
						<h3><i class="fa fa-angle-left"></i></h3>
					</div>
				</div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 containercol">
				<?php

					
					for($i=1; $i<count($contenedor); $i++) {
						foreach ($contenedor[$i] as $valor) {
						?>
						<div class="newcol" >
							<div class="image" data-link="<?php echo $valor['link']; ?>">
								<img src="<?php echo $valor['image']; ?>" />
								<div class="background">
									<div class="text">
										<div><?php echo $valor['title']; ?></div>
										<div>MAS INFO AQUI</div>
									</div>
								</div>
							</div>
						</div>
						<?php
						}
					}
					foreach ($contenedor[null] as $valor) {
						?>
						<div class="newcol" >
							<div class="image" data-link="<?php echo $valor['link']; ?>" style="background-image: url('<?php echo $valor['image']; ?>');">
								<div class="background">
									<div class="text">
										<div><?php echo $valor['title']; ?></div>
										<div>MAS INFO AQUI</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
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
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/emprendedores/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/emprendedores/js/scripts.js"></script>
