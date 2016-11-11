(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		function URL(){
			return document.URL;
		}

		// DOM ready, take it away
		$(".submenu-top li").on('click', function(){
			$(".submenu-top li").removeClass("active");
			$(this).addClass("active");	
		});
		$(".innovacion-link").on('click',function(){
			location.href = "http://innovacion.udd.cl/"
		});
		$(".link").on('click',function(){
			location.href = $(this).attr('link-data');
		});
		$(".quehacemos-link").on('click',function(){
			location.href = $.ENTORNO+"/que-hacemos/";
		});
		$(".postula-link").on('click',function(){
			location.href = $.ENTORNO+"/postulaciones/";
		});
		$(".nosotros-link").on('click',function(){
			location.href = $.ENTORNO+"/ventures/";
		});
		$("#redes-link").on('click',function(){
			var top = $("#redes").offset().top - 158;
			$('body').scrollTop(top);
		});
		$("#mentores-link").on('click',function(){
			var top = $("#mentores").offset().top - 158;
			$('body').scrollTop(top);
		});
		$("#recursos-link").on('click',function(){
			var top = $("#recursos").offset().top - 158;
			$('body').scrollTop(top);
		});
		$(".contacto-link").on('click',function(){
			location.href = $.ENTORNO+"/contacto/";
		});
		$("#noticias-link").on('click',function(){
			var top = $("#noticias").offset().top - 158;
			$('body').scrollTop(top);
		});
		$(".faq-link").on('click',function(){
			location.href = $.ENTORNO+"/faq/";
		});
		$(".busquedaM").on('click',function(){
			$(".menu-mobile").velocity({ translateX: "100%"});
			$(".busquedah").show();
		});
		$(".busqueda").on('click',function(){
			$(".busquedah").show();
		});
		$(".busqueda").on('click',function(){
			$(".busquedah").show();
		});
		$(".cerrarh").on('click',function(){
			$(".busquedah").hide();
		});
		$("#emprendedores-link").on('click', function(){
			var top = $("#emprendedores").offset().top - 158;
			$('body').scrollTop(top);
		});
		$("#equipo-link").on('click', function(){
			var top = '/aceleradora/equipo-aceleradora-de-negocios-udd-ventures/'
			location.href = top;
		});
		$("#eventos-link").on('click', function(){
			var top = $("#eventos").offset().top - 158;
			$('body').scrollTop(top);
		});
		//ACCIONES DE LOS SIDEBAR
		$("header .logo").on('click', function(){
			location.href = "/";
		});
		$("#nosotros-go").on('click', function(){
			var top = $("#quehacemos").offset().top - 158;
			$('body').scrollTop(top);
		});
		$("#quienes-go").on('click', function(){
			var top = $("#redes").offset().top - 158;
			$('body').scrollTop(top);
		});
		$(document).keyup(function(event){
	        if(event.which==27)
	        {
	            $(".fadebox").hide();
	        }
	    });
	    $(".mobile-menu").on('click', function(){
	    	$(".menu-mobile").velocity({ translateX: "0"});
	    })
	    $(".menu-mobile .control").on('click', function(){
	    	$(".menu-mobile").velocity({ translateX: "100%"});
	    });
	    $("#searchinput").keyup(function(event){
	        var url = URL();
	        if(event.which==13)
	        {
	        	if(url.indexOf('/aceleradora') != -1){
					location.href= "/aceleradora/?s="+$("#searchinput").val();
				}
				else if(url.indexOf('/alumnos') != -1){
					location.href= "/alumnos/?s="+$("#searchinput").val();
				}
				else{
					location.href= "/?s="+$("#searchinput").val();
				}
	        }
	    });
	});
	
})(jQuery, this);
