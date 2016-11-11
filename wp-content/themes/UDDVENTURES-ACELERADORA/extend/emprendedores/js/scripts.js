(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		//DECLARAMOS LOS EVENTOS DE PAGINATION
		$(".EXTEND_emprendedores .subheader .tipos").on('click',function(){
			$(".EXTEND_emprendedores .subheader .active").removeClass('active');
			$(this).addClass('active');
			$(".EXTEND_emprendedores .element-group").hide();
			$(".EXTEND_emprendedores .activerow").removeClass('activerow');
			$(".EXTEND_emprendedores .element-group[data-id='"+$(this).attr('data-id')+"']").show().addClass('activerow');
		});
		//CONTROLES
		$(".EXTEND_emprendedores .left").on('click',function(){
			if($(".EXTEND_emprendedores .activerow .containercol .newcol").length > 4){
				$(".EXTEND_emprendedores .activerow .containercol .newcol").last().prependTo($(".EXTEND_emprendedores .activerow .containercol"));
			}
		});
		$(".EXTEND_emprendedores .right").on('click',function(){
			if($(".EXTEND_emprendedores .activerow .containercol .newcol").length > 4){
				$(".EXTEND_emprendedores .activerow .containercol .newcol").first().appendTo($(".EXTEND_emprendedores .activerow .containercol"));
			}
		});
		//DECLARAMOS LOS LINKS
		$(".EXTEND_emprendedores .newcol .image").on('click',function(){
			window.open($(this).attr('data-link'),'_blank');
		});
		//DECLARAMOS EL LINK BACK EN EL POST
		$(".EXTEND_emprendedores .noticia_article .left-back").on('click',function(){
			window.history.back();
		});
	});
	
})(jQuery, this);
