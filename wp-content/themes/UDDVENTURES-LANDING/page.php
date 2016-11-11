<?php get_header(); 
	function URL(){
		$url=$_SERVER['REQUEST_URI'];
		return $url;
	}
?>

<main role="main">
	<!-- section -->
	<?php include("extend/space/index.php");?>
	<?php 
		$url = URL();
		if(strpos($url, '/ventures') === 0){ //LISTO
			include("extend/nosotros_main/index.php");
			include("extend/nosotros/index.php");
			include("extend/quiensomos/index.php");
		}
		else{
			include("extend/main/index.php");
			include("extend/noticias/index.php");
		}
	?>
	<!-- /section -->
</main>

<?php get_footer(); ?>