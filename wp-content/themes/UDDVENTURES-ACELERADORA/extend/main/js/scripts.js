(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		$.ENTORNO = "/aceleradora/"
		var elementos = $(".slider-element");
		var bounces = $(".bounces")
		$(elementos[0]).css({'opacity':1, 'z-index':8});
		$(bounces[0]).addClass('active');
		var face = 0;
		function change_vitrina(){
			if(face < (elementos.length-1)){
				$(elementos[face]).css({'opacity':0, 'z-index':0});
				$(bounces[face]).removeClass('active');
				$(elementos[++face]).css({'opacity':1, 'z-index':8});
				$(bounces[face]).addClass('active');
			}
			else{
				$(elementos[face]).css({'opacity':0, 'z-index':0});
				$(bounces[face]).removeClass('active');
				face = 0;
				$(elementos[face]).css({'opacity':1, 'z-index':8});
				$(bounces[face]).addClass('active');
			}
		}
		//INTERVALO AUTOMATICO
		var interval = setInterval(function(){
			change_vitrina();
		}, 5000);
		//BOTONES DEL SLIDER
		$(".slider_flecha[dir='der']").on('click', function(){
			$(elementos[face]).css({'opacity':0, 'z-index':0});
			$(bounces[face]).removeClass('active');
			if(face == (elementos.length-1)){
				face = 0;
			} 
			else{
				face++;
			}
			$(elementos[face]).css({'opacity':1, 'z-index':8});
			$(bounces[face]).addClass('active');
			clearInterval(interval);
			interval = setInterval(function(){
				change_vitrina();
			}, 5000);
		});
		$(".slider_flecha[dir='izq']").on('click', function(){
			$(elementos[face]).css({'opacity':0, 'z-index':0});
			$(bounces[face]).removeClass('active');
			if(face == 0){
				face = (elementos.length-1);
			} 
			else{
				face--;
			}
			$(elementos[face]).css({'opacity':1, 'z-index':8});
			$(bounces[face]).addClass('active');
			clearInterval(interval);
			interval = setInterval(function(){
				change_vitrina();
			}, 5000);
		});
		$(".slider-element").on('click', function(){
			if($(this).attr('url') != ''){
				location.href = $(this).attr('url');
			}
		});
		$(".bounces").on('click', function(){
			var ite = $(this).attr('ite');
			$(elementos[face]).css({'opacity':0, 'z-index':0});
			$(bounces[face]).removeClass('active');
			face = ite;
			$(elementos[face]).css({'opacity':1, 'z-index':8});
			$(bounces[face]).addClass('active');
			clearInterval(interval);
			interval = setInterval(function(){
				change_vitrina();
			}, 5000);
		});
	});
})(jQuery, this);
