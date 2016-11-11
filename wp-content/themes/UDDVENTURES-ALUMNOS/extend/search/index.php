<?php
	$q = get_query_var('s');
	try {
  
        $elastica = new Elastica\Client(array(
            // 'host' => '201.221.123.194',
            'host' => '10.185.0.91',
            'port' => '9200'
        ));

       
        // construir objeto de búsqueda
        $search = new Elastica\Search( $elastica );
         $query = new Elastica\Query();
        $string = new Elastica\Query\QueryString();
        $string->setQuery($q);
        $query->setQuery($string);
        $query->setSize( 1000 );
        
        $search->setQuery($query);
        // obtener resultados, indicando índice y tipo
        $results = $search->setQuery($query)->addIndex('udd')->search($query);
        // $results = array_reverse($results);

    } catch ( Exception\InvalidException $e ) {
        // atrapar error. en este ejemplo, sólo indicamos que no existen resultados
        $results = array();
    }
?>
<!-- INCLUIMOS EL ESPACIO PARA LOS CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/extend/search/css/style.php">
<section class="EXTEND_search" id="search">
    <div class="container" id="search-folder">
    	<div class="row">
    		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 search_header">Resultados de <b>"<?php echo get_search_query(); ?>"</b></div>
    	</div>
    	<div class="row result">
    		<div class="col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 col-xs-10 col-sm-10 col-md-10 col-lg-10">
	    		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tab">
	    			<div class="col-xs-5 col-sm-5 col-md-4 col-lg-4 btn_result ext active" data="result_ext">UDD VENTURES</div>
	    			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 btn_result local" data="result_local">OTROS SITIOS DE UDD</div>
	    		</div>
	    		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 result-cont result_ext" style="display:none;">
	    			
    				<?php
    					$pagina = 0;
    					$elemento = 0;
    					$status = true;
    					foreach ($results as $hit) { 
    						$status = false;
    						$data =  $hit->getData();
    					 	if($data['_new_udd_ventures'] && $data['post_type'] != "post" && $data['post_type'] != "page"){	
	    					 	$elemento++;
	    					 	if($elemento > 15*$pagina) {
									$pagina++;
									if($pagina == 1){
										echo '<div class="result_page" data="'.$pagina.'" style="display:block;">';
									}
									else
									{
										echo '<div class="result_page" data="'.$pagina.'">';
									}
	    					 	}
	    					 	?>
	    					 	<div class="elemento">
	    					 		<div class="header_element">
	    					 			<div class="tipo">
	    					 				<?php 
			    					 			if($data['post_type'] == "quehacemos"){
							 						echo "QUE HACEMOS";
							 					} 	  
							 					else
							 					{
							 						echo strtoupper($data['post_type']);
							 					}
						 					?></div>
	    					 			<div class="fpublicacion">Fecha de publicación: <?php echo date('d/m/Y h:i:s',strtotime($data['post_date'])); ?></div>
	    					 		</div>
	    					 		<div class="contenido_element">
	    					 			<div class="imagen_element">
	    					 				<img src="
	    					 				<?php
	    					 					echo $data['_source']['thumbnail']; 	    					 					
	    					 				?>
	    					 				" />
	    					 			</div>
	    					 			<div class="datos_element">
	    					 				<div class="titulo"><a href="<?php echo $data['_source']['bookmark']; ?>" target="_blank"><?php echo $data['_source']['entry_title']; ?></a></div>
	    					 				<?php 
	    					 					if(strtoupper($data['post_type']) == "EVENTOS"){
	    					 					?>
	    					 					<div class="fevento">Fecha del Evento:&nbsp;
	    					 					<?php
	    					 						echo date('d/m/Y h:i:s',strtotime($data['_source']['fecha_evento']));
	    					 					?>
	    					 					</div>
	    					 					<?php
	    					 					}
	    					 				?>
	    					 				<div class="resumen">
	    					 					<?php
		    					 					echo $data['_source']['entry_summary'];    					 					
		    					 				?>
	    					 				</div>
	    					 			</div>
	    					 		</div>
	    					 	</div>
	    					 	<?php
	    						if($elemento == 15*$pagina) {
	    					 		echo '</div>';
	    					 		$status = true;
	    					 	}
	    					}
    					}
    					if(!$status){
    						echo '</div>'; 
    					}
    				?>
	    			<?php 
		    			if(($elemento/15) > 1){
		    		?>
		    			<div class="col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
			    			<div class="pagination">
			    				<div class="left_arrow" data="ext"><i class="fa fa-angle-double-left"></i></div>
			    				<div class="pagina">Pagina</div>
			    				<div class="page" id="EXTEND_search_ext">1</div>
			    				<div class="de">De</div>
			    				<div class="total"><?php echo ceil($elemento/15); ?></div>
			    				<div class="right_arrow" data="ext" max="<?php echo ceil($elemento/15); ?>"><i class="fa fa-angle-double-right"></i></div>
			    			</div>
			    		</div>
		    		<?php
		    			}
		    		?>
	    		</div>
	    		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 result-cont result_local" style="display:none;">
	    			<?php
    					$pagina = 0;
    					$elemento = 0;
    					$status = true;
    					foreach ($results as $hit) { 
    						$status = false;
    						$data =  $hit->getData();
    					 	if((!array_key_exists('_new_udd_ventures',$data) || !$data['_new_udd_ventures']) && strtolower($data['post_type']) != "attachment"){	
	    					 	$elemento++;
	    					 	if($elemento > 15*$pagina) {
									$pagina++;
									if($pagina == 1){
										echo '<div class="result_page" data="'.$pagina.'" style="display:block;">';
									}
									else
									{
										echo '<div class="result_page" data="'.$pagina.'">';
									}
	    					 	}
	    					 	?>
	    					 	<div class="elemento">
	    					 		<div class="header_element">
	    					 			<div class="tipo">
	    					 				<?php 
	    					 					switch(strtoupper($data['post_type'])){
	    					 						case "PERSON":
	    					 							echo "PERSONA";
	    					 							break;
	    					 						case "PAGE":
	    					 							echo "PAGINA";
	    					 							break;
	    					 						case "GALLERY":
	    					 							echo "GALERIA";
	    					 							break;
	    					 						case "EVENT":
	    					 							echo "EVENTO";
	    					 							break;
	    					 						case "PUBLICATION":
	    					 							echo "PUBLICACION";
	    					 							break;
	    					 					}
			    					 									 					
			    					 		?></div>
	    					 			<div class="fpublicacion">Fecha de publicación: <?php echo date('d/m/Y h:i:s',strtotime($data['published'])); ?></div>
	    					 		</div>
	    					 		<div class="contenido_element">
	    					 			<div class="imagen_element">
	    					 				<img src="
	    					 				<?php
	    					 					if(array_key_exists('thumbnail', $data)){
	    					 						if(strlen($data['thumbnail']) > 0) echo "http://".$_SERVER['HTTP_HOST']."/wp-content/uploads/image.php?image=".$data['thumbnail'];
	    					 						else echo 'data:image/jpeg;base64,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';		
	    					 					}
	    					 					else
	    					 					{
	    					 						if(array_key_exists('photo', $data)){
	    					 							if(strlen($data['photo']) > 0) echo "http://".$_SERVER['HTTP_HOST']."/wp-content/uploads/image.php?image=".$data['photo'];
	    					 							else echo 'data:image/jpeg;base64,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';		
	    					 						}
	    					 						else
	    					 						{
	    					 							echo 'data:image/jpeg;base64,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';
	    					 						}
	    					 					}
	    					 				?>
	    					 				" />
	    					 			</div>
	    					 			<div class="datos_element">
	    					 				<div class="titulo"><a href="<?php echo $data['bookmark']; ?>" target="_blank"><?php echo $data['entry_title']; ?></a></div>
	    					 				<div class="resumen">
	    					 					<?php
	    					 						if(array_key_exists('entry_summary', $data)){
		    					 						if(strlen($data['entry_summary']) > 0) echo $data['entry_summary'];
		    					 						else echo "Sin Descripci&oacute;n";					 					
		    					 					}
		    					 					else
		    					 					{
		    					 						if(array_key_exists('description', $data)){
		    					 							if(strlen($data['description']) > 0) echo $data['description'];
		    					 							else echo "Sin Descripci&oacute;n";
		    					 						}
		    					 						else
		    					 						{
		    					 							echo "Sin Descripci&oacute;n";
		    					 						}
		    					 					}
		    					 								 					
		    					 				?>
	    					 				</div>
	    					 			</div>
	    					 		</div>
	    					 	</div>
	    					 	<?php
	    						if($elemento == 15*$pagina) {
	    					 		echo '</div>';
	    					 		$status = true;
	    					 	}
	    					}
    					}
    					if(!$status){
    						echo '</div>'; 
    					}
    				?>
	    			<?php 
		    			if(($elemento/15) > 1){
		    		?>
		    			<div class="col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 col-xs-4 col-sm-4 col-md-4 col-lg-4">
			    			<div class="pagination">
			    				<div class="left_arrow" data="local"><i class="fa fa-angle-double-left"></i></div>
			    				<div class="pagina">Pagina</div>
			    				<div class="page" id="EXTEND_search_local">1</div>
			    				<div class="de">De</div>
			    				<div class="total"><?php echo ceil($elemento/15); ?></div>
			    				<div class="right_arrow" data="local" max="<?php echo ceil($elemento/15); ?>"><i class="fa fa-angle-double-right"></i></div>
			    			</div>
			    		</div>
		    		<?php
		    			}
		    		?>
	    		</div>
	    	</div>
    	</div>
    </div>
</section>
<!-- INCLUIMOS EL ESPACIO PARA LOS JS -->
<script src="<?php echo get_template_directory_uri(); ?>/extend/search/js/scripts.js"></script>
