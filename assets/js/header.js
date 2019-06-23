$(document).ready(function(){
	$('search_text_input').focus(function(){
		if (window.matchMedia("(min-width: 800px").matches) {
			$(this).animate({width: '250px'},500)
		}
	});

	$('button_holder').on('click',function(){
		document.search_form.submit();
	})
})

function getLiveSearchUsers(value,user){

	$.post("includes/controlador/ajax_search.php", {query:value,user_logged},function(data){

		if($(".search_results_footer_empty")[0]){
			$(".search_results_footer_empty").toogleClass("search_results_footer");
			$(".search_results_footer_empty").toogleClass("search_results_footer_empty");
		}

		$('.search_results').html(data);
		$('.search_results_footer').html("<a href='search.php?q=" + value + "'>Ver todos los resultados</a>");

		if (data="") {

			$('.search_results_footer').html("");
			$('.search_results_footer').toogleClass("search_results_footer_empty");
			$('.search_results_footer').toogleClass("search_results_footer");
		}
	})
}