<section class="EXTEND_noticias" id="noticias">
	<div class="container-fluid noticias-container" id="news-folder">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="header">NOTICIAS</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 noticias-items">
			<div class="row noticias noticias-indexador">
				<?php
					$args=array(
					  'post_type' => 'noticias',
					  'post_status' => 'publish',
					  'numberposts' => -1,
					  'posts_per_page' => -1
					);
					$my_query = new WP_Query($args);
					$numero = 0;
					if( $my_query->have_posts() ) {
	  					while ($my_query->have_posts()){ 
	  						$my_query->the_post();
	  						$custom_fields = get_field_objects();
	  						?>
	  						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 newcol noticias-box" data-pagination="<?php echo floor($numero/12)+1; ?>" style="<?php if((floor($numero/12)+1) > 1) echo 'display:none;'; ?>">
								<div class="image-index" data-link="<?php echo get_permalink(); ?>" style="background-image: url('<?php echo $custom_fields['imagen_noticia']['value']['url']; ?>');">
									<div class="background"><div>VER MAS</div></div>
								</div>
								<div class="content">
									<div class="date"><?php echo $custom_fields['fecha_noticia']['value'];?></div>
									<div class="title"><h4><b><?php echo get_the_title(); ?></b></h4></div>
									<!-- <div class="resumen"><?php echo $custom_fields['resumen_noticia']['value'];?></div> -->
								</div>
							</div>
	  						<?php	  
	  						$numero++;						
	 				 	}
					}
					wp_reset_query();// Restore global post data stomped by the_post().
				?>
			</div>
			<div class="row pagination-control move_control">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 control ">
					<nav>
					  <ul class="pagination">
					    <?php 
					    	$tabs = floor($numero/12)+1;
					    	for($i=1;$i<=$tabs;$i++){
					    ?>
					    	<li><a class="pagination-item" data-pagination="<?php echo $i; ?>"><?php echo $i; ?></a></li>
					    <?php 
					    	}
					    ?>
					  </ul>
					</nav>
				</div>
			</div>
		</div>	
	</div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/noticias/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/noticias/js/scripts.js"></script>
