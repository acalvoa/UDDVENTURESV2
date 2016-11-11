<!doctype html>
<html <?php language_attributes(); ?> class="no-js" lang="es">
	<?php  
		function URL_(){
			$url=$_SERVER['REQUEST_URI'];
			return $url;
		}
	?>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/base/assets/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php include("base/partial/styles.php"); ?>
		<?php include("base/partial/scripts.php"); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body>
	<?php 
		$url = URL_();
		if(strpos($url, '/aceleradora/postulaciones') === 0){ //LISTO
			include("base/partial/header_w.php"); 
		}
		else if(strpos($url, '/aceleradora/que-hacemos')  === 0){ //LISTO
			include("base/partial/header_w.php"); 
		}
		else if(strpos($url, '/aceleradora/contacto') === 0){ //LISTO
			include("base/partial/header_w.php"); 
		}
		else if(strpos($url, '/aceleradora/noticias') === 0){ //LISTO
			include("base/partial/header_w.php"); 
		}
		else if(strpos($url, '/aceleradora/faq') === 0){ //LISTO
			include("base/partial/header_w.php"); 
		}
		else if(strpos($url, '/aceleradora/redes') === 0){ //LISTO
			include("base/partial/header_w.php"); 
		}
		else
		{
			include("base/partial/header.php");
		}
	?>
	<script src="<?php echo get_template_directory_uri(); ?>/extend/main/js/scripts.js"></script>
