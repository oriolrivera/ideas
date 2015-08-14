$(function(){
	/**
	*Determinar valor futuro
	**/
	$("#calcValorFuturo").click(function(){
		var p = $('#p').val();
		var n = $('#n').val();
		var i = $('#i').val();

		var porcentaje = parseFloat(i)/parseFloat(100);
		var suma = parseFloat(porcentaje) + parseFloat(1);
		var elevado = Math.pow(suma,n);
		var result = parseFloat(p)*parseFloat(elevado);
		
		$("#f").val(result.toFixed(4));
		
	});//end

	$("#calcValorPresente").click(function(){
		var f = $('#f').val();
		var n = $('#n').val();
		var i = $('#i').val();

		var porcentaje = parseFloat(i)/parseFloat(100);
		var suma = parseFloat(1)+parseFloat(porcentaje);
		var elevado = Math.pow(suma,n);
		var result = parseFloat(f)/elevado.toFixed(4);

		$("#p").val(result);
	});	

	$("#calcPagosValorP").click(function(){
		var a = $('#a').val();
		var n = $('#n').val();
		var i = $('#i').val();

		var porcentaje = parseFloat(i)/parseFloat(100);
		var suma1 = parseFloat(1)+parseFloat(porcentaje);
		var elevado1 = Math.pow(suma1,n);

		var resul1 = elevado1-parseFloat(1);

		var suma2 = parseFloat(1)+parseFloat(porcentaje);
		var elevado2 = Math.pow(suma2,n);
		var resul2 = parseFloat(porcentaje)*parseFloat(elevado2);
		var subtotal = parseFloat(resul1) / parseFloat(resul2);

		var total = parseFloat(a)*parseFloat(subtotal);

		//var result = parseFloat(f)/elevado.toFixed(4);

		$("#p").val(total);
	});

	$("#calcValorPSeriespagosA").click(function(){
		var p = $('#p').val();
		var n = $('#n').val();
		var i = $('#i').val();

		var porcentaje = parseFloat(i)/parseFloat(100);
		var suma1 = parseFloat(1)+parseFloat(porcentaje);
		var elevado1 = Math.pow(suma1,n);

		var resul1 = elevado1-parseFloat(1);

		var suma2 = parseFloat(1)+parseFloat(porcentaje);
		var elevado2 = Math.pow(suma2,n);
		var resul2 = parseFloat(porcentaje)*parseFloat(elevado2);
		var subtotal = parseFloat(resul1) / parseFloat(resul2);

		var total = parseFloat(p)*parseFloat(subtotal);

		//var result = parseFloat(f)/elevado.toFixed(4);

		$("#a").val(total);
	});

	

});//end ready