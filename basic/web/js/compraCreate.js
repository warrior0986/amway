$(function(){
	var puntos=0;
	var puntosdetalle=0;
	$(document).on('blur',".cantidad_input_c",function(){//pierde foco la cantidad del detalle
		var idDetalle=(this.id.match(/\d+/)[0]);
		var cantidad=$("#compradetalle-"+idDetalle+"-cantidad").val();
		var vr_unitario=$("#compradetalle-"+idDetalle+"-vr_unitario").val();
	
		if (vr_unitario==undefined)
		{
			vr_unitario=0;
		}
		if (cantidad==undefined)
		{
			cantidad=0;
		}
		var vr_detalle=cantidad*vr_unitario;
		puntosdetalle=puntos*cantidad;
		
		$("#compradetalle-"+idDetalle+"-puntos_detalle").val(puntosdetalle);
		$("#compradetalle-"+idDetalle+"-vr_detalle").val(vr_detalle);
		$(".compra_detalle_input").change();

	});
	$(document).on('change', '.compra_detalle_input', function(){//conteo de puntos de los detalles
		var puntos_totales=$('.compra_detalle_input');
		var valor_detalles=$('.vr_detalle_input');
		var cantidad_total_puntos=0;
		var vr_total_detalles=0;
		puntos_totales.each(function(index, element){
			cantidad_total_puntos=parseInt(cantidad_total_puntos)+parseInt(element.value);
		});
		$("#compra-puntos").val(cantidad_total_puntos);
		valor_detalles.each(function(index, element){
			vr_total_detalles= parseInt(vr_total_detalles)+parseInt(element.value);
		});
		$("#compra-vr_compra").val(vr_total_detalles);
		if(parseInt(cantidad_total_puntos)<222)
		{
			$('#compra-porc_descuento').val('25');
		}
		else
		{
			$('#compra-porc_descuento').val('35');	
		}
		var porcentaje=$("#compra-porc_descuento").val();
		console.log(porcentaje)
		var valor_descuento=parseInt(vr_total_detalles)*parseInt(porcentaje)/100;
		var total_pagar= parseInt(vr_total_detalles) - parseInt(valor_descuento);

		$("#compra-vr_descuento").val(valor_descuento);
		$("#compra-total_pagar").val(total_pagar);

	});
	$(document).on('click', '.add-item', function(){//reinicio de variables
		puntosdetalle=0;
		puntos=0;
	});

	$(document).on('change', '.ddlcompraDetalle', function(){//consulta de datos del producto
		var idProductoSeleccionado=(this.id.match(/\d+/)[0]);
		var idProducto= $('#compradetalle-'+idProductoSeleccionado+'-producto_id').val();
		$.ajax({
			url: baseurl+"/compra/unitario",
			data: {'id' : idProducto},
			type: 'GET',
			dataType: 'json',
			success: function(data){
				
				$("#compradetalle-"+idProductoSeleccionado+"-vr_unitario").val(data["vr_publico"]);
				puntos=data["puntos"];
				
			},

		})
	});
	// $(document).on('blur','.porc_descuento_input',function(){
	// 	var idDetalle=(this.id.match(/\d+/)[0]);
	// 	var vr_detalle=$("#compradetalle-"+idDetalle+"-vr_detalle").val();
	// 	var porc_descuento=$("#compradetalle-"+idDetalle+"-porc_descuento").val();
	// 	if (vr_detalle==undefined)
	// 	{
	// 		vr_detalle=0;
	// 	}
	// 	if (porc_descuento==undefined)
	// 	{
	// 		porc_descuento=0;
	// 	}
	// 	var vr_descuento=vr_detalle*porc_descuento/100;

	// 	$("#compradetalle-"+idDetalle+"-vr_descuento").val(vr_descuento);
	// 	$("#compradetalle-"+idDetalle+"-total_detalle").val(vr_detalle-vr_descuento);
	// });
});