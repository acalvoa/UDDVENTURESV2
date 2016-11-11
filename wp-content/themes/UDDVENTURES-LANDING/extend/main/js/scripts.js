(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away
		$.ENTORNO = "";
		$(".EXTEND_main .link").on('click',function(){
			location.href = $(this).attr('link-data');
		});
	});
	
})(jQuery, this);
