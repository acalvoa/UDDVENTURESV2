(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		$
		//VARIABLES GLOBALES
		var EXTEND_noticias = 1;
		var EXTEND_noticias_MAX = Math.floor($(".EXTEND_noticias .newcol").length/9)+1;
		//DECLARAMOS LOS EVENTOS DE PAGINATION
		$(".EXTEND_noticias .pagination-item").on('click',function(){
			EXTEND_noticias = $(this).attr('data-pagination');
			$(".EXTEND_noticias .newcol").hide();
			$(".EXTEND_noticias .newcol[data-pagination="+EXTEND_noticias+"]").show();
		});
		//CONTROLES
		$(".EXTEND_noticias .left").on('click',function(){
			$(".EXTEND_noticias .newscontainer .newcol").last().prependTo($(".EXTEND_noticias .newscontainer"));
		});
		$(".EXTEND_noticias .right").on('click',function(){
			$(".EXTEND_noticias .newscontainer .newcol").first().appendTo($(".EXTEND_noticias .newscontainer"));
		});
		//DECLARAMOS LOS LINKS
		$(".EXTEND_noticias .newcol .image").on('click',function(){
			location.href = $(this).attr('data-link');
		});
		//DECLARAMOS EL LINK BACK EN EL POST
		$(".EXTEND_noticias .noticia_article .left").on('click',function(){
			window.history.back();
		});
		$(".EXTEND_noticias .left-back").on('click',function(){
			window.history.back();
		});
		//DECLARAMOS LAS REDES SOCIALES
		$(".EXTEND_noticias .noticia_article .social i").on('click',function(){
			window.open($(this).attr('data-social'),"_blank", "height=500,width=700");
		});
	});
	
})(jQuery, this);
