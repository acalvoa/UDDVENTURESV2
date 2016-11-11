<section class="EXTEND_quehacemos" id="quehacemos">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
				<div class="header">QUE HACEMOS</div>
			</div>
		</div>
	</div>
	<div class="container" id="news-folder">
		<div class="row quehacemos">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 quehacemos-item">
				<?php
					$args=array(
					  'post_type' => 'quehacemos',
					  'post_status' => 'publish'
					);
					$my_query = new WP_Query($args);
					$numero = 1;
					if( $my_query->have_posts() ) {
	  					while ($my_query->have_posts()){ 
	  						$my_query->the_post();
	  						$custom_fields = get_field_objects();
	  						?>
	  						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 newcol" >
								<div class="image">
									<div class="img-obj">
										<div class="img-container"><img src="<?php echo $custom_fields['imagen']['value']['url']; ?>" /></div>
										<div class="pie" <?php if($numero%3 == 0 || ($numero-1)%3 == 0) echo 'style="background: #C1C1C7;"'; ?>><?php echo get_the_title(); ?></div>
									</div>
									<div class="background" data-id="<?php echo $numero; ?>"><div><?php echo get_the_title(); ?></div></div>
								</div>
							</div>
	  						<?php	  
	  						$numero++;						
	 				 	}
					}
					wp_reset_query();// Restore global post data stomped by the_post().
				?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	
					<div class="social_networks container-fluid">
						<div class="row">
							<div class="title col-xs-12 col-sm-12 col-md-12 col-lg-12">COMPARTIR</div>
							<div class="content twitter col-xs-offset-10 col-sm-offset-10 col-md-offset-10 col-lg-offset-10 col-xs-1 col-sm-1 col-md-1 col-lg-1 social" data-social="http://twitter.com/home?status=<?php echo urlencode(get_the_title()); ?>+<?php echo urlencode(get_permalink()); ?>"><i class="fa fa-twitter-square"></i></div>
							<div class="content col-xs-1 col-sm-1 col-md-1 col-lg-1 social" data-social="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>"><i class="fa fa-facebook-official"></i></div>
						</div>
					</div>
				</div>
				<?php
					$args=array(
					  'post_type' => 'quehacemos',
					  'post_status' => 'publish'
					);
					$my_query = new WP_Query($args);
					$numero = 1;
					if( $my_query->have_posts() ) {
	  					while ($my_query->have_posts()){ 
	  						$my_query->the_post();
	  						$custom_fields = get_field_objects();
	  						?>
	  						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 content-text" style="<?php if($numero == 1) echo 'display:block;'; ?>" data-id="<?php echo $numero; ?>" >
								<div class="title"><h3><?php echo get_the_title(); ?></h3></div>
								<div class="content"><?php echo get_the_content(); ?></div>
							</div>
	  						<?php	  
	  						$numero++;						
	 				 	}
					}
					wp_reset_query();// Restore global post data stomped by the_post().
				?>
			</div>
			
		</div>
	</div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/quehacemos/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/quehacemos/js/scripts.js"></script>
