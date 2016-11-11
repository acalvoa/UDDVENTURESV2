(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		//CARGAMOS LAS FUNCIONES DE PASO DE POSTULACIONES
		//DECLARAMOS LOS LINKS
		$(".EXTEND_postula .btn_read").on('click',function(){
			if($(this).attr('data-link') != "NOTLINK"){
				location.href = $(this).attr('data-link');
			}
		});
		$(".EXTEND_postula .btn_status").on('click',function(){
			if($(this).attr('data-link') != "NOTLINK"){
				location.href = $(this).attr('data-link');
			}
		});
		$(".EXTEND_postula .postula_article .link").on('click',function(){
			if($(this).attr('data-link') != "NOTLINK"){
				location.href = $(this).attr('data-link');
			}
		});
		//DECLARAMOS EL LINK BACK EN EL POST
		$(".EXTEND_postula .left").on('click',function(){
			window.history.back();
		});
		//DECLARAMOS LAS REDES SOCIALES
		$(".EXTEND_postula .postula_article .social_networks .social i").on('click',function(){
			window.open($(this).attr('data-social'),"_blank", "height=500,width=700");
		});
	});
	
})(jQuery, this);
