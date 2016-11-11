(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		$("#faq .faq-items .faq-item .title").on('click',function(){
			if($(this).children(".etiqueta").hasClass('active')){
				$(this).children(".etiqueta").removeClass('active');
				$(this).children(".texto").removeClass('active');
				$("#faq .faq-items .faq-item .contenido").hide();
				$("#faq .faq-items .faq-image").hide();
			}
			else
			{
				$("#faq .faq-items .faq-item .title .etiqueta").removeClass('active');
				$("#faq .faq-items .faq-item .title .texto").removeClass('active');
				$(this).children(".etiqueta").addClass('active');
				$(this).children(".texto").addClass('active');
				$("#faq .faq-items .faq-item .contenido").hide();
				$(this).parent().children('.contenido').show();
				$(this).parent().children('.contenido').show();
				$(this).parent().parent().children('.faq-image').show();
			}
		});
		//DECLARAMOS EL LINK BACK EN EL POST
		$(".EXTEND_faq .left").on('click',function(){
			window.history.back();
		});
	});
	
})(jQuery, this);
