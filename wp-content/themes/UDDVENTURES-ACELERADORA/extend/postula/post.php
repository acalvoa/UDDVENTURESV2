<?php
	$custom_fields = get_field_objects();
	the_post();
	$fecha_init = $custom_fields['fecha_init_postulacion']['value'];
	$fecha_finish = $custom_fields['fecha_finish_postulacion']['value'];
	$is_active = (intval($fecha_init) <= time() && time() <= intval($fecha_finish))? true: false;
	echo $custom_fields['check_formulario']['value'];
?>
<section class="EXTEND_postula" id="postulaciones">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 nopadding">
				<div class="header">POSTULA</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row postula_article">
			<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 imagemobile">
				<div class="object">
					<img src="<?php echo $custom_fields['imagen_postulacion']['value']['url']; ?>" />
				</div>
				<div class="row social_networks">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title">COMPARTIR</div>
					<div class="content social" ><i class="fa fa-twitter-square" data-social="http://twitter.com/home?status=<?php echo urlencode(get_the_title()); ?>+<?php echo urlencode(get_permalink()); ?>"></i><i class="fa fa-facebook-official" data-social="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>"></i></div>
				</div>
				<br>
				<div class="postula-btn boton link" data-link="<?php echo $custom_fields['link_postulacion']['value'];?>" style="background-color: <?php echo $custom_fields['color_postulacion']['value']; ?>; display: <?php if($is_active) echo 'block'; else echo 'none'; ?>;">POSTULA</div>
				<div class="bases boton link" data-link="<?php echo $custom_fields['archivo_de_bases']['value']['url'];?>" style="background-color: <?php echo $custom_fields['color_postulacion']['value']; ?>; display: <?php if($custom_fields['checkbox_bases']['value']) echo 'block'; else echo 'none'; ?>;">BASES</div>
				<div class="formulario boton link" data-link="<?php echo $custom_fields['archivo_formulario']['value']['url'];?>" style="background-color: <?php echo $custom_fields['color_postulacion']['value']; ?>; display: <?php if($custom_fields['checkbox_formulario']['value']) echo 'block'; else echo 'none'; ?>;">FORMULARIO</div>
			</div>
			<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 content">
				<div class="date"><h5>Desde <?php echo date("d/m/Y h:i:s",$custom_fields['fecha_init_postulacion']['value']); ?>, Hasta: <?php echo date("d/m/Y h:i:s",$custom_fields['fecha_finish_postulacion']['value']); ?></h5></div>
				<div class="title"><h3><?php the_title(); ?></h3></div>
				<div class="contentext">
					<h4>DESCRIPCIÓN</h4>
					<?php echo the_content(); ?>
				</div>
			</div>
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 image">
				<div class="object">
					<img src="<?php echo $custom_fields['imagen_postulacion']['value']['url']; ?>" />
				</div>
				<div class="row social_networks">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title">COMPARTIR</div>
					<div class="content social" ><i class="fa fa-twitter-square" data-social="http://twitter.com/home?status=<?php echo urlencode(get_the_title()); ?>+<?php echo urlencode(get_permalink()); ?>"></i><i class="fa fa-facebook-official" data-social="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>"></i></div>
				</div>
				<br>
				<div class="postula-btn boton link" data-link="<?php echo $custom_fields['link_postulacion']['value'];?>" style="background-color: <?php echo $custom_fields['color_postulacion']['value']; ?>; display: <?php if($is_active) echo 'block'; else echo 'none'; ?>;">POSTULA</div>
				<div class="bases boton link" data-link="<?php echo $custom_fields['archivo_de_bases']['value']['url'];?>" style="background-color: <?php echo $custom_fields['color_postulacion']['value']; ?>; display: <?php if($custom_fields['checkbox_bases']['value']) echo 'block'; else echo 'none'; ?>;">BASES</div>
				<div class="formulario boton link" data-link="<?php echo $custom_fields['archivo_formulario']['value']['url'];?>" style="background-color: <?php echo $custom_fields['color_postulacion']['value']; ?>; display: <?php if($custom_fields['checkbox_formulario']['value']) echo 'block'; else echo 'none'; ?>;">FORMULARIO</div>
			</div>
		</div>
	</div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/postula/css/style.php">
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/postula/js/postula.js"></script>