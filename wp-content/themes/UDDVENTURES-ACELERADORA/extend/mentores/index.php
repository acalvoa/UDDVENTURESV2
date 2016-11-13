<section class="EXTEND_redes" id="mentores">
	<div class="container-fluid" id="news-folder">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="header">Mentores</div>
			</div>
		</div>
			<?php
				$numero = 1;
				foreach ($category as $vector) {
					$args=array(
					  'post_type' => 'redes',
					  'post_status' => 'publish',
					  'nopaging' => true,
					  'tax_query' => array(
							array(
								'taxonomy' => 'redes-tipo',
								'field'    => 'name',
								'terms'    => 'mentores',
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
	  							"link"=>get_the_permalink()
	  						);
		  					array_push($contenedor[$orden], $result);
  						}
					}
					wp_reset_query();// Restore global post data stomped by the_post().
			?>
		<div class="element-group <?php if($numero === 1) echo 'activerow'; ?>" data-id="<?php echo $vector; ?>" style="<?php if($numero++ === 1) echo 'display:block;'; ?>">
			<!--<div class="row move_control">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control left"><h2><i class="fa fa-angle-left"></i></h2></div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"></div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control right"><h2><i class="fa fa-angle-right"></i></h2></div>
			</div>-->
			<div class="row redes">
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control left " >
					<div class="autocenter">
						<h3><i class="fa fa-angle-left"></i></h3>
					</div>
				</div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 containercol">
				<?php
					for($i=1; $i<count($contenedor); $i++) {
						foreach ($contenedor[$i] as $valor) {
							?>
							<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 newcol" >
								<div class="image">
									<img src="<?php echo $valor['image']; ?>" />
									<div class="background"  data='<?php echo json_encode($valor); ?>'>
										<div class="text">
											<div><?php echo $valor['title']; ?></div>
											<div><?php echo $valor['organizacion']; ?></div>
											<div>MAS INFO AQUI</div>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
					}
					foreach ($contenedor[null]as $valor) {
						?>
						<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 newcol" >
							<div class="image" style="background-image: url('<?php echo $valor['image']; ?>');">
								<div class="background"  data='<?php echo json_encode($valor); ?>'>
									<div class="text">
										<div><?php echo $valor['title']; ?></div>
										<div><?php echo $valor['organizacion']; ?></div>
										<div>MAS INFO AQUI</div>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
				?>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control right ">
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
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/mentores/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/mentores/js/scripts.js"></script>
