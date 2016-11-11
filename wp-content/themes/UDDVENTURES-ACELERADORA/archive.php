<?php get_header(); 
	function URL(){
		$url=$_SERVER['REQUEST_URI'];
		return $url;
	}
?>

<main role="main">
	<!-- section -->
	<?php include("extend/space/index_w.php");?>
	<?php 
		$url = URL();
		if(strpos($url, '/aceleradora/postulaciones') === 0){ //LISTO
			include("extend/postula/page-index.php");
		}
		else if(strpos($url, '/aceleradora/noticias') === 0){ //LISTO
			include("extend/noticias/page-index.php");
		}
		else if(strpos($url, '/aceleradora/que-hacemos')  === 0){ //LISTO
			include("extend/quehacemos/page-index.php");
		}
		else if(strpos($url, '/aceleradora/redes') === 0){ //LISTO
			include("extend/redes/page-index.php");
		}
		else if(strpos($url, '/aceleradora/recursos') === 0){ //LISTO
			include("extend/recursos/page-index.php");
		}
		else if(strpos($url, '/aceleradora/contacto') === 0){ //LISTO
			include("extend/contacto/page-index.php");
		}
		else if(strpos($url, '/aceleradora/emprendedores') === 0){ //LISTO
			include("extend/emprendedores/page-index.php");
		}
		else if(strpos($url, '/aceleradora/eventos') === 0){
			include("extend/eventos/page-index.php"); //LISTO
		}
		else if(strpos($url, '/aceleradora/faq') === 0){ //LISTO
			include("extend/faq/index.php");
		}
	?>
	<!-- /section -->
</main>

<?php get_footer(); ?>