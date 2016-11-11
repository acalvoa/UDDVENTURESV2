(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		//DECLARAMOS LOS EVENTOS DE PAGINATION
		$(".EXTEND_recursos .subheader .tipos").on('click',function(){
			$(".EXTEND_recursos .subheader .active").removeClass('active');
			$(this).addClass('active');
			$(".EXTEND_recursos .element-group").hide();
			$(".EXTEND_recursos .activerow").removeClass('activerow');
			$(".EXTEND_recursos .element-group[data-id='"+$(this).attr('data-id')+"']").show().addClass('activerow');
		});
		//CONTROLES
		$(".EXTEND_recursos .left").on('click',function(){
			$(".EXTEND_recursos .activerow .containercol .newcol").last().prependTo($(".EXTEND_recursos .activerow .containercol"));
		});
		$(".EXTEND_recursos .right").on('click',function(){
			$(".EXTEND_recursos .activerow .containercol .newcol").first().appendTo($(".EXTEND_recursos .activerow .containercol"));
		});
		//DECLARAMOS LOS LINKS
		$(".EXTEND_recursos .newcol .image").on('click',function(){
			myTempWindow = window.open($(this).attr('data-link'));
		});
		//DECLARAMOS EL LINK BACK EN EL POST
		$(".EXTEND_recursos .noticia_article .left-back").on('click',function(){
			window.history.back();
		});
	});
	
})(jQuery, this);
