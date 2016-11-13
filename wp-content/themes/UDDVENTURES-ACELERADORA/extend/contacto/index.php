<section class="EXTEND_contacto" id="contacto">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="header">CONTACTO</div>
			</div>
		</div>
		<div class="row contactorow">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title">Completa los siguientes campos y nos pondremos en contacto contigo</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 contacto-items">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 contact-row">
					<?php echo do_shortcode('[contact-form-7 id="71" title="Contact form 1"]'); ?>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 maparow">
					<div id="mapa"></div>
				</div>
				
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 locations location1">
				SANTIAGO<br>
				(56 2) 2 2870 4005<br>
				Av. Italia 850. Piso 2<br>
				Providencia. Santiago.

			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 locations location2">
				CONCEPCIÓN<br>
				(56 41) 226 8610<br>
				Ainavillo 456.<br>
				Concepción
			</div>
			<div class="row social_networks">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title">COMPARTIR</div>
				<div class="content social" ><i class="fa fa-twitter-square" data-social="http://twitter.com/home?status=<?php echo urlencode(get_the_title()); ?>+<?php echo urlencode(get_permalink()); ?>"></i><i class="fa fa-facebook-official" data-social="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>"></i></div>
			</div>
		</div>
	</div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/contacto/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/contacto/js/scripts.js"></script>