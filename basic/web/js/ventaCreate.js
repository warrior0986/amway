$(function(){

	$(document).on('change', '.ddlventaDetalle', function(){
		var idProductoSeleccionado=(this.id.match(/\d+/)[0]);
		var idProducto= $('#ventadetalle-'+idProductoSeleccionado+'-producto_id').val();
		$.ajax({
			url: baseurl+"/venta/unitario",
			data: {'id' : idProducto},
			type: 'GET',
			dataType: 'json',
			success: function(data){
				$("#ventadetalle-"+idProductoSeleccionado+"-vr_unitario").val(data);
				
			},

		})
	});

	$(document).on('change', '.vr_total_input', function(){
		var detalles=$(".vr_detalle_input");
		var descuentos=$(".vr_descuento_input");
		var totales=$(".vr_total_input");

		var vr_total_detalles=0;
		detalles.each(function(index, element){
			vr_total_detalles=parseInt(vr_total_detalles)+parseInt(element.value);
		});
		$("#venta-vr_total").val(vr_total_detalles);

		var vr_total_descuentos=0;
		descuentos.each(function(index, element){
			vr_total_descuentos=parseInt(vr_total_descuentos)+parseInt(element.value);
		});
		$("#venta-vr_descuento").val(vr_total_descuentos);		

		var vr_total_pagar=0;
		totales.each(function(index, element){
			vr_total_pagar=parseInt(vr_total_pagar)+parseInt(element.value);
		});
		$("#venta-total_pagar").val(vr_total_pagar);
	});

	$(document).on('blur',".cantidad_input",function(){
		var idDetalle=(this.id.match(/\d+/)[0]);
		var cantidad=$("#ventadetalle-"+idDetalle+"-cantidad").val();
		var vr_unitario=$("#ventadetalle-"+idDetalle+"-vr_unitario").val();
	
		if (vr_unitario==undefined)
		{
			vr_unitario=0;
		}
		if (cantidad==undefined)
		{
			cantidad=0;
		}
		var vr_detalle=cantidad*vr_unitario;
		$("#ventadetalle-"+idDetalle+"-vr_detalle").val(vr_detalle);
		

	});
	$(document).on('click', '.remove-item', function(){
		$(".vr_total_input").change();
	});
	$(document).on('blur','.porc_descuento_input',function(){
		var idDetalle=(this.id.match(/\d+/)[0]);
		var vr_detalle=$("#ventadetalle-"+idDetalle+"-vr_detalle").val();
		var porc_descuento=$("#ventadetalle-"+idDetalle+"-porc_descuento").val();
		if (vr_detalle==undefined)
		{
			vr_detalle=0;
		}
		if (porc_descuento==undefined)
		{
			porc_descuento=0;
		}
		var vr_descuento=vr_detalle*porc_descuento/100;

		$("#ventadetalle-"+idDetalle+"-vr_descuento").val(vr_descuento);
		$("#ventadetalle-"+idDetalle+"-total_detalle").val(vr_detalle-vr_descuento);
		$("#ventadetalle-"+idDetalle+"-total_detalle").change();
	});
});