$(document).ready(function(){
	$('#selectNumIter').change(function(){
		var valorSeleccionado = parseInt($(this).val());
	
		switch(valorSeleccionado)
		{
				case 1:
					$('#it2').fadeOut('slow');
					$('#it3').fadeOut('slow');
					$('#it4').fadeOut('slow');
					$('#it5').fadeOut('slow');
					$('#it6').fadeOut('slow');
				break;
				case 2:
					$('#it2').fadeIn('slow');
					$('#it3').fadeOut('slow');
					$('#it4').fadeOut('slow');
					$('#it5').fadeOut('slow');
					$('#it6').fadeOut('slow');
				break;
				case 3:
					$('#it2').fadeIn('slow');
					$('#it3').fadeIn('slow');
					$('#it4').fadeOut('slow');
					$('#it5').fadeOut('slow');
					$('#it6').fadeOut('slow');
				break;
				case 4:
					$('#it2').fadeIn('slow');
					$('#it3').fadeIn('slow');
					$('#it4').fadeIn('slow');
					$('#it5').fadeOut('slow');
					$('#it6').fadeOut('slow');
				break;
				case 5:
					$('#it2').fadeIn('slow');
					$('#it3').fadeIn('slow');
					$('#it4').fadeIn('slow');
					$('#it5').fadeIn('slow');
					$('#it6').fadeOut('slow');
				break;
				default:
					$('#it2').fadeIn('slow');
					$('#it3').fadeIn('slow');
					$('#it4').fadeIn('slow');
					$('#it5').fadeIn('slow');
					$('#it6').fadeIn('slow');
				break;
		}
	})

});
