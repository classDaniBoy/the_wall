$(document).ready(function() {

	// Cuando se hace click en loggearse esconde el formulario de registrarse
	$("#signup").click(function() {
		$("#first").slideUp("slow", function(){
			$("#second").slideDown("slow");
		});
	});

	// Cuando se hace click en registrarse esconde el formulario de loggearse
	$("#signin").click(function() {
		$("#second").slideUp("slow", function(){
			$("#first").slideDown("slow");
		});
	});
});