(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		var EXTEND_search_ext = 1;
		var EXTEND_search_local = 1;
		//DECLARAMOS LOS EVENTOS DE PAGINATION
		$(".EXTEND_search .btn_result").on('click', function(){
			$(".btn_result").removeClass("active");
			$(this).addClass("active");
			$(".result-cont").hide();
			$("."+$(this).attr('data')).show();
		});
		//BOTONES ARROW
		$(".EXTEND_search .pagination .left_arrow").on('click', function(){
			if($(this).attr("data") == "ext"){
				if(EXTEND_search_ext > 1){
					EXTEND_search_ext--;
					$("#EXTEND_search_ext").html(EXTEND_search_ext);
					$(".result_ext .result_page").hide();
					$(".result_ext .result_page[data='"+EXTEND_search_ext+"']").show();
				}
			}
			else if($(this).attr("data") == "local"){
				if(EXTEND_search_local > 1){
					EXTEND_search_local--;
					$("#EXTEND_search_local").html(EXTEND_search_local);
					$(".result_local .result_page").hide();
					$(".result_local .result_page[data='"+EXTEND_search_local+"']").show();
				}
			}
		});
		$(".EXTEND_search .pagination .right_arrow").on('click', function(){
			if($(this).attr("data") == "ext"){
				if(EXTEND_search_ext < $(this).attr("max")){
					EXTEND_search_ext++;
					$("#EXTEND_search_ext").html(EXTEND_search_ext);
					$(".result_ext .result_page").hide();
					$(".result_ext .result_page[data='"+EXTEND_search_ext+"']").show();
				}
			}
			else if($(this).attr("data") == "local"){
				if(EXTEND_search_local < $(this).attr("max")){
					EXTEND_search_local++;
					$("#EXTEND_search_local").html(EXTEND_search_local);
					$(".result_local .result_page").hide();
					$(".result_local .result_page[data='"+EXTEND_search_local+"']").show();
				}
			}
		});
		$(".result_ext").show();
	});
	
})(jQuery, this);
