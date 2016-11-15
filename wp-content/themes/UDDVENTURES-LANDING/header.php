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
        <link href="/wp-content/themes/UDDBASESTYLE/assets/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php include(dirname(__FILE__)."/../UDDBASESTYLE/partial/styles.php"); ?>
		<?php include(dirname(__FILE__)."/../UDDBASESTYLE/partial/scripts.php"); ?>
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
		$url_ = URL_();
		if(strpos($url_, '/ventures') === 0){ //LISTO
			include(dirname(__FILE__)."/../UDDBASESTYLE/partial/header_n.php"); 
		}
		else
		{
			include(dirname(__FILE__)."/../UDDBASESTYLE/partial/header_l.php");
		}
	?>
	<script src="<?php echo get_template_directory_uri(); ?>/extend/main/js/scripts.js"></script>
