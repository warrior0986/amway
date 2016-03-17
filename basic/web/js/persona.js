$(function (){
	$(document).on('click', '#modal_crearPersonaB', function(){
		$("#modal_persona").modal('show')
		.find('#modal_crearPersona')
		.load($(this).attr('value'));
		return false;
	});
});