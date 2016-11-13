(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		//DECLARAMOS LOS EVENTOS DE PAGINATION
		$("#redes .subheader .tipos").on('click',function(){
			$("#redes .subheader .active").removeClass('active');
			$(this).addClass('active');
			$("#redes .element-group").hide();
			$("#redes .activerow").removeClass('activerow');
			$("#redes .element-group[data-id='"+$(this).attr('data-id')+"']").show().addClass('activerow');
		});
		//CONTROLES
		$("#redes .left").on('click',function(){
			if($("#redes .activerow .containercol .newcol").length > 4){
				$("#redes .activerow .containercol .newcol").last().prependTo($("#redes .activerow .containercol"));
			}
		});
		$("#redes .right").on('click',function(){
			if($("#redes .activerow .containercol .newcol").length > 4){
				$("#redes .activerow .containercol .newcol").first().appendTo($("#redes .activerow .containercol"));
			}
		});
		//CLICK
		$("#redes .background").on('click',function(){
			var obj = JSON.parse($(this).attr('data'));
			var p = $('<div class="fadebox"></div>').appendTo($('body'));
			var k = $('<div class="back"></div>').appendTo(p).on('click',function(){
				$(".fadebox").remove();
			});
			var box = $('<div class="box"></div>').appendTo(p);
			var header = $('<div class="header" style="background: '+$("#redes .header").css('background')+';"><div class="closebtn">Cerrar <i class="fa fa-times"></i></div></div>').appendTo(box);
			$(".closebtn").on('click',function(){
				$(".fadebox").remove();
			});
			var body = $('<div class="body"></div>').appendTo(box);
			var content = $('<div class="contenido"></div>').appendTo(body);
			var foto = $('<div class="foto"></div>').appendTo(body);
			var contfoto = $('<div class="container-foto"></div>').appendTo(foto);
			$("<img src='"+obj.image+"' />").appendTo(contfoto);
			$("<div class='titulo'>"+obj.title+"</div>").appendTo(content);
			var contenido = $("<div class='contenido'>"+obj.content+"</div>").appendTo(content);
			var redes = $("<div class='row social_networks'>").appendTo(foto);
			$(".fadebox .box .contenido").perfectScrollbar();
			var comp = $('<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 title">COMPARTIR</div>').appendTo(redes);
			var icons = $('<div class="content social" ></div>').appendTo(redes);
			var tw = $('<i class="fa fa-twitter-square"></i>').appendTo(icons);
			var fb = $('<i class="fa fa-facebook-official"></i>').appendTo(icons);
			fb.on('click',function(){
				window.open('http://www.facebook.com/share.php?u='+obj.link+'&title='+obj.title, "", "width=800, height=400");
			});
			tw.on('click',function(){
				window.open('hhttp://twitter.com/home?status='+obj.title+'+'+obj.link,"", "width=800, height=400");
			});
			foto.clone().attr("class","fotomobile").prependTo(body);
		});
		//DECLARAMOS EL LINK BACK EN EL POST
		$("#redes .left-back").on('click',function(){
			window.history.back();
		});
	});
	
})(jQuery, this);
