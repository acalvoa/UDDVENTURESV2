<section class="EXTEND_noticias" id="noticias">
	<div class="container-fluid" id="news-folder">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 header">
				NOTICIAS
			</div>
		</div>
		<!--<div class="row move_control">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control left"><h2><i class="fa fa-angle-left"></i></h2></div>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"></div>
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control right"><h2><i class="fa fa-angle-right"></i></h2></div>
		</div>-->
		<div class="row noticias">
			<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 control left">
				<div class="autocenter">
					<h3><i class="fa fa-angle-left"></i></h3>
				</div>
			</div>
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 newscontainer">
			<?php
				$args=array(
				  'post_type' => 'noticias',
				  'post_status' => 'publish',
				  'nopaging' => true
				);
				$my_query = new WP_Query($args);
				$numero = 0;
				if( $my_query->have_posts() ) {
  					while ($my_query->have_posts()){ 
  						$my_query->the_post();
  						$custom_fields = get_field_objects();
  						?>
  						<div class="newcol">
							<div class="image" data-link="<?php echo get_permalink(); ?>" style="background-image: url('<?php echo $custom_fields['imagen_noticia']['value']['url']; ?>');">
								<div class="background"><div>VER MAS</div></div>
							</div>
							<div class="content">
								<div class="date"><?php echo $custom_fields['fecha_noticia']['value'];?></div>
								<div class="title"><?php echo get_the_title(); ?></div>
								<!--<div class="resumen"><?php echo $custom_fields['resumen_noticia']['value'];?></div>-->
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
		<!--<div class="row pagination-control move_control">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 control ">
				<nav>
				  <ul class="pagination">
				    <li>
				      <a aria-label="Previous" class="left">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
				    <?php 
				    	$tabs = floor($numero/6)+1;
				    	for($i=1;$i<=$tabs;$i++){
				    ?>
				    	<li><a class="pagination-item" data-pagination="<?php echo $i; ?>"><?php echo $i; ?></a></li>
				    <?php 
				    	}
				    ?>
				    <li>
				      <a aria-label="Next" class="right">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>
		</div>-->
	</div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/noticias/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/noticias/js/scripts.js"></script>
