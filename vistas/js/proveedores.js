/* -------------------------------------------------------------------------- */
/*                               Borrar Usuarios                              */
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                Cuando se haga click en lo que tiene la clase               
				  BorrarU que esta en el boton de							  */
/* -------------------------------------------------------------------------- */
 
/* -------------------------------------------------------------------------- */
/*               eliminar cuando eso pase se ejecute una funcion              */
/* -------------------------------------------------------------------------- */
$(".TB").on("click", ".BorrarP", function(){


	var Pid = $(this).attr("Pid");

	Swal.fire({
		title: '¿Estas realmente seguro?',
		text: "No podras revertir este proceso!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Sí!'
	  }).then(function(result) {
		if (result.value) {
			window.location = "index.php?url=proveedores&Pid="+Pid;
		
		}
	  })

	
	
})



/* -------------------------------------------------------------------------- */
/*                          Llamar datos para editar                          */
/* -------------------------------------------------------------------------- */

$(".TB").on("click", ".EditarP", function(){

	var Pid = $(this).attr("Pid");
	var datos = new FormData();

	datos.append("Pid", Pid);

	$.ajax({

		url: "ajax/proveedoresA.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){


			$("#familiaN").val(respuesta["familia_prov"]);
			$("#nombreE").val(respuesta["nombre_prov"]);
			$("#Pid").val(respuesta["id"]);
			$("#razonsN").val(respuesta["razon_sprov"]);
			$("#rfcE").val(respuesta["rfc"]);
			$("#act_comN").val(respuesta["act_comercial_prov"]);
			$("#atnE").val(respuesta["atn"]);
			$("#emailE").val(respuesta["email"]);
			$("#pag-webN").val(respuesta["pag_web_prov"]);
			$("#telefonoE").val(respuesta["telefono"]);
			$("#direccionE").val(respuesta["direccion"]);
			$("#cat-servicioE").html(respuesta["catalogo_servicio_prov"]);
      		$("#cat-servicioE").val(respuesta["catalogo_servicio_prov"]);
			$("#auto-pagoN").val(respuesta["autorizacion_pago_prov"]);
			$("#otrosE").val(respuesta["otros"]);
		

		}

	})

})