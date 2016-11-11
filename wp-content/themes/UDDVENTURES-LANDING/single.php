<?php  
	get_header(); 
	function URL(){
		$url=$_SERVER['REQUEST_URI'];
		return $url;
	}
?>
<main role="main">
	<!-- section -->
	<?php 
		$url = URL();
		include("extend/space/index_w.php");
		if(strpos($url, '/blog/noticias/') === 0){
			include("extend/noticias/post.php");
		}
		else if(strpos($url, '/blog/quiensomos') === 0){
			include("extend/quiensomos/page-index.php");
		}
	?>
	<!-- /section -->
</main>

<?php get_footer(); ?>

