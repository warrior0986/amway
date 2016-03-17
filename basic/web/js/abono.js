$(function (){
	$(document).on('click', '#modal_crearAbonoB', function(){
		$("#modal_abono").modal('show')
		.find('#modal_crearAbonoB')
		.load($(this).attr('value'));
		return false;
	});
	$(".UpdAbono").click(function(){
		$("#modal_abono_update").modal('show')
		.find('#modal_actualizarAbonoB')
		.load($(this).attr('value'));		
	});
});