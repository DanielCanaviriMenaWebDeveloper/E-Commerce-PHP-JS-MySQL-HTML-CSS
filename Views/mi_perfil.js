$(document).ready(function () {
	var funcion;
	verificar_sesion();
	obtener_datos();
	llenar_departamentos();
	llenar_direcciones();
		
	$('#departamento').select2({
		placeholder: 'Seleccione un departamento',
		language: {
			noResults: function () {
				return "No hay resultado";
			},
			searching: function () {
				return "Buscando...";
			}
		}
	});

	$("#provincia").select2({
		placeholder: "Seleccione una provincia",
		language: {
			noResults: function () {
				return "No hay resultado";
			},
			searching: function () {
				return "Buscando...";
			},
		},
	});

	$("#distrito").select2({
		placeholder: "Seleccione un distrito",
		language: {
			noResults: function () {
				return "No hay resultado";
			},
			searching: function () {
				return "Buscando...";
			},
		},
	});

	function llenar_direcciones() {
		funcion = "llenar_direcciones";
		$.post(
			"../Controllers/UsuarioDistritoController.php",
			{ funcion },
			(response) => {
				/* console.log(response); */
				let direcciones = JSON.parse(response);
				console.log(direcciones);
				let template = "";
				let contador = 0;
				direcciones.forEach(direccion => {
					contador = contador + 1;
					template += `
					<div class="callout callout-info">
						<div class="card-header">
							<strong>Dirección ${contador}</strong>
							<div class="card-tools">
								<button dir_id="${direccion.id}" type="button" class="eliminar_direccion btn btn-tool">
									<i class="fas fa-trash-alt"></i>
								</button>
							</div>
						</div>

						<div class="card-body">
							<h2 class="lead"><b>${direccion.direccion}</b></h2>
							<p class="text-muted text-sm"><b>Referencia: </b>${direccion.referencia}</p>
							<ul class="ml-4 mb-0 fa-ul text-muted">
								<li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> ${direccion.distrito}, ${direccion.provincia}, ${direccion.departamento}.</li>
							</ul>
						</div>
					</div>
					`;
				});
				$('#direcciones').html(template);
			}
		);
	}

	$(document).on('click', '.eliminar_direccion', (e) => {
		/* Selecciona el primer elemento sobre el cual se da un click.  */
		let elemento = $(this)[0].activeElement;
		/* Obtiene el valor del atributo llamado dir_id, del elemento seleccionado */
		let id = $(elemento).attr('dir_id');
		console.log(id);
		/* Código de sweetalert2 */
		const swalWithBootstrapButtons = Swal.mixin({
			customClass: {
				confirmButton: "btn btn-success m-3",
				cancelButton: "btn btn-danger",
			},
			buttonsStyling: false,
		});

		swalWithBootstrapButtons
			.fire({
				title: "Esta seguro de borrar esta dirección?",
				text: "¡No podrás revertir esto!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "¡Sí, bórralo!",
				cancelButtonText: "¡No, cancela!",
				reverseButtons: true,
			})
			.then((result) => {
				if (result.isConfirmed) {
					funcion = "eliminar_direccion";
					$.post('../Controllers/UsuarioDistritoController.php', {  funcion, id }, (response) => {
						console.log(response);
					}); 
					/* swalWithBootstrapButtons.fire(
						"¡Eliminado!",
						"Su dirección ha sido eliminada.",
						"success"
					); */
				} else if (result.dismiss === Swal.DismissReason.cancel) {
					swalWithBootstrapButtons.fire(
						"Cancelado",
						"Tu dirección está segura :)",
						"error"
					);
				}
			});
	});

	function llenar_departamentos() {
		funcion = "llenar_departamentos";
		$.post("../Controllers/DepartamentoController.php", { funcion }, (response) => {
			/* console.log(response); */
			let departamentos = JSON.parse(response);
			/* console.log(departamentos); */
			let template = "";
			departamentos.forEach(departamento => {
				template += `<option value="${departamento.id}">${departamento.nombre}</option>`;
			});
			/* console.log(template); */
			$('#departamento').html(template);  
			$('#departamento').val('').trigger('change');
		});
	}

	/* Detecta si existe algun cambio en el Select2 de id llamado departamento y ejecuta una función 
	en caso exista dicho cambio. */
	$('#departamento').change(function() {
		/* Obtenemos el id del departemento seleccionado en el select */
		let id_departamento = $('#departamento').val();
		funcion = "llenar_provincia"; 
		$.post("../Controllers/ProvinciaController.php", { funcion, id_departamento }, (response) => {
			/* console.log(response); */
			let provincias = JSON.parse(response);
			/* console.log(provincias); */
			let template = "";
			provincias.forEach(provincia => {
				template += `<option value="${provincia.id}">${provincia.nombre}</option>`;
			});
			/* console.log(template); */
			$('#provincia').html(template);
			$("#provincia").val("").trigger("change");  
		});
	});

	$('#provincia').change(function() {
		/* Obtenemos el id de la provincia seleccionada en el select */
		let id_provincia = $('#provincia').val();
		funcion = "llenar_distritos"; 
		$.post("../Controllers/DistritoController.php", { funcion, id_provincia }, (response) => {
			/* console.log(response); */
			let distritos = JSON.parse(response);
			/* console.log(distritos); */
			let template = "";
			distritos.forEach(distrito => {
				template += `<option value="${distrito.id}">${distrito.nombre}</option>`;
			});
			/* console.log(template); */
			$('#distrito').html(template);  
		});
	});

	function verificar_sesion() {
		funcion = "verificar_sesion";
		$.post("../Controllers/UsuarioController.php", { funcion }, (response) => {
			/* console.log(response); */
			if (response != "") {
				/* Si la condición se cumple hay una sesión abierta */
				let sesion = JSON.parse(response);
				$("#nav_login").hide();
				$("#nav_register").hide();
				$("#usuario_nav").text(sesion.user + " #" + sesion.id);
				$("#avatar_nav").attr("src", "../Util/img/" + sesion.avatar);
				$("#avatar_menu").attr("src", "../Util/img/" + sesion.avatar);
				$("#usuario_menu").text(sesion.user);
			} else {
                $("#nav_usuario").hide();
                location.href = 'login.php';
			}
		});
	}

	function obtener_datos() {
		funcion = "obtener_datos";
		$.post("../Controllers/UsuarioController.php", { funcion }, (response) => {
			/* console.log(response); */
			/* Como estamos recibiendo los valores en un String del lado del servidor ahora se procede a convertirlo en array para acceder a los datos. */
			let usuario = JSON.parse(response);
			/* console.log(usuario); */
			$('#username').text(usuario.username);
			$("#tipo_usuario").text(usuario.tipo_usuario);
			$("#avatar_perfil").attr("src", "../Util/img/" + usuario.avatar);
			$("#nombres").text(usuario.nombres + " " + usuario.apellidos);
			$("#dni").text(usuario.dni);
			$("#email").text(usuario.email);
			$("#telefono").text(usuario.telefono);

		});
	}

	/* Código que envia los campos de Agregar Dirección a ser almacenados en la BD. */
	$("#form-direccion").submit((e) => {
		funcion = "crear_direccion";
		let id_distrito = $("#distrito").val();
		let direccion = $("#direccion").val();
		let referencia = $("#referencia").val();

		$.post(
			"../Controllers/UsuarioDistritoController.php",
			{ id_distrito, direccion, referencia, funcion },
			(response) => {
				console.log(response);
				if(response == 'success') {
					Swal.fire({
						position: "center",
						icon: "success",
						title: "Se ha registrado tu dirección correctamente",
						showConfirmButton: false,
						timer: 2000,
					}).then(function () {
						$("#form-direccion").trigger("reset");
						$("#departamento").val("").trigger("change");
					});
				}else {
					Swal.fire({
						icon: "error",
						title: "Error",
						text:
							"Hubo conflicto al registrar la dirección, comuniquese con el area de sistemas",
					});
				}
			}
		);
		e.preventDefault(); /* Evita que se refresque la pagina */
	});

});
