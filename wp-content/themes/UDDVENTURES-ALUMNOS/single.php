<?php 
	get_header();
	function URL(){
		$url=$_SERVER['REQUEST_URI'];
		return $url;
	}
	$url = URL();
	
?>
<main role="main">
	<!-- section -->
	<?php include("extend/space/index_w.php");?>
	<?php 
		if(strpos($url, '/alumnos/noticias/') === 0){
			include("extend/noticias/post.php");
		}
		else if(strpos($url, '/alumnos/postulaciones/') === 0){
			include("extend/postula/post.php");
		}
		else if(strpos($url, '/alumnos/que-hacemos')  === 0){ //LISTO
			include("extend/quehacemos/page-index.php");
		}
		else if(strpos($url, '/alumnos/redes') === 0){ //LISTO
			include("extend/redes/page-index.php");
		}
		else if(strpos($url, '/alumnos/recursos') === 0){ //LISTO
			include("extend/recursos/page-index.php");
		}
		else if(strpos($url, '/alumnos/contacto') === 0){ //LISTO
			include("extend/contacto/page-index.php");
		}
		else if(strpos($url, '/alumnos/emprendedores') === 0){ //LISTO
			include("extend/emprendedores/page-index.php");
		}
		else if(strpos($url, '/alumnos/eventos') === 0){
			include("extend/eventos/page-index.php");//LISTO
		}
		else if(strpos($url, '/alumnos/faq') === 0){ //LISTO
			include("extend/faq/index.php");
		}
	?>
	<!-- /section -->
</main>

<?php get_footer(); ?>

