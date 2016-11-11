<?php
/*
*	@file style.php
*	@brief Script para compilar LESS CSS y usarlo en entorno PHP
*	@autor Angelo Calvo Alfaro
*	@date 24/07/2015
*/
require "../lib/lessphp/lessc.inc.php";
// DEFINIMOS LAS CABECERAS PARA QUE SEA  UN CSS
header("Content-type: text/css", true);
$less = new lessc();
//IMPRIMIMOS EL CONTENIDO DEL NUEVO CSS
echo $less->compileFile("style.less");
?>