<section class="EXTEND_eventos" id="eventos">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header">
				<div>EVENTOS</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 subheader">
				<?php 
					$numero = 1;
					$category = array();
					$taxonomies = get_object_taxonomies('eventos');
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
		
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 left-back"><h2><i class="fa fa-angle-left"></i></h2></div>
		<?php
			$numero = 1;
			foreach ($category as $vector) {
		?>
		<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11" style="padding-left: 0px; padding-right: 0px;">
			<div class="container eventos-container" data-id="<?php echo $vector; ?>" style="<?php if($numero++ == 1) echo 'display:block;'; ?>">
				<div class="row">
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 calendar-container">
						<?php 
							$eventos = array();
							$args=array(
							  'post_type' => 'eventos',
							  'post_status' => 'publish',
							  'tax_query' => array(
									array(
										'taxonomy' => 'eventos-tipo',
										'field'    => 'name',
										'terms'    => $vector,
									),
								)
							);
							$my_query = new WP_Query($args);
							if( $my_query->have_posts() ) {
								
			  					while ($my_query->have_posts()){ 
			  						$my_query->the_post();
			  						$custom_fields = get_field_objects();
			  						$eventos[$custom_fields['fecha_evento']['value']] = array(
			  							"title"=> get_the_title(),
			  							"content" => get_the_content(),
			  							"image" =>  $custom_fields['imagen_evento']['value']['url'],
			  							"link" => get_the_permalink()
			  						);
			  						
			  					}
							}
							wp_reset_query();

							for($j=date('n');$j<=12;$j++){
								$week = 1;
								for($i=1;$i<=date('t',strtotime(date('Y').'-'.$j.'-1'));$i++) {
									$day_week = date('N', strtotime(date('Y').'/'.$j.'/'.$i));
									$calendar[$j][$week][$day_week] = $i;
									if ($day_week == 7) { $week++; };
								}
							}
							foreach ($calendar as $key => $value) {
								?>  				
								<div class="calendario">
									<div class="calendario-head">
										<div class="calendario-title">
											<?php 
												if($key == 1) echo "ENERO";
												if($key == 2) echo "FEBRERO";
												if($key == 3) echo "MARZO";
												if($key == 4) echo "ABRIL";
												if($key == 5) echo "MAYO";
												if($key == 6) echo "JUNIO";
												if($key == 7) echo "JULIO";
												if($key == 8) echo "AGOSTO";
												if($key == 9) echo "SEPTIEMBRE";
												if($key == 10) echo "OCTUBRE";
												if($key == 11) echo "NOVIEMBRE";
												if($key == 12) echo "DICIEMBRE";
											?>
											<span class="anio"><?php echo date('Y'); ?></span>
										</div>
										<div class="calendar-control-left"><i class="fa fa-angle-left"></i></div>
										<div class="calendar-control-right"><i class="fa fa-angle-right"></i></div>
									</div>
									<div class="calendario-date">
										<table border="0">
											<thead>
												<tr>
													<td>Lunes</td>
													<td>Martes</td>   
													<td>Miércoles</td>   
													<td>Jueves</td>   
													<td>Viernes</td>   
													<td>Sábado</td>   
													<td>Domingo</td>   
												</tr>
											</thead>
											<tbody>
												<?php foreach ($value as $days) : ?>
													<tr>
														<?php 
														for ($i=1;$i<=7;$i++) {
															$fecha = date('d/m/Y',strtotime(date('Y')."/".$key."/".$days[$i]));
															if(array_key_exists($fecha,$eventos)) echo '<td class="mark" data=\''.json_encode($eventos[$fecha]).'\' >';
															else echo '<td>';
															?>
																<?php echo isset($days[$i]) ? $days[$i] : ''; ?>
															</td>
														<?php  } ?>
													</tr>
												<?php endforeach ?>
											</tbody>
										</table> 
									</div>
								</div>
								<?php
							}
						?>
							
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 eventos-img">
						<img src="<?php echo get_eventos_image(); ?>" />		
					</div>
				</div>
			</div>
	</div>
	<?php
		}
	?>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/eventos/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/eventos/js/scripts.js"></script>