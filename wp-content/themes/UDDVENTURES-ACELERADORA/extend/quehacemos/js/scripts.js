(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		//DECLARAMOS LOS EVENTOS DE HOVER
		$(".EXTEND_quehacemos .newcol .background").on('mouseenter',function(){
			$(this).parent().children('.img-obj').children('.pie').addClass('hover');
		});
		$(".EXTEND_quehacemos .newcol .background").on('mouseleave',function(){
			$(this).parent().children('.img-obj').children('.pie').removeClass('hover');
		});
		//DELARAMOS LOS CLICK
		$(".EXTEND_quehacemos .newcol .background").on('click',function(){
			$(".EXTEND_quehacemos .content-text").hide();
			$(".EXTEND_quehacemos .content-text[data-id="+$(this).attr('data-id')+"]").show();
			
		});
		//DECLARAMOS LAS REDES SOCIALES
		$(".EXTEND_quehacemos .quehacemos .social i").on('click',function(){
			window.open($(this).attr('data-social'),"_blank", "height=500,width=700");
		});
		$(".EXTEND_quehacemos .left").on('click',function(){
			window.history.back();
		});
	});
	
})(jQuery, this);
