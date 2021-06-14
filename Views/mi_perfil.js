$(document).ready(function () {
	var funcion;

	bsCustomFileInput.init(); /* Inicia la libreria CustomFileInput que carga archivos en un formulario. */

	verificar_sesion();
	obtener_datos();
	llenar_departamentos();
	llenar_direcciones();

	$("#departamento").select2({
		placeholder: "Seleccione un departamento",
		language: {
			noResults: function () {
				return "No hay resultado";
			},
			searching: function () {
				return "Buscando...";
			},
		},
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
				direcciones.forEach((direccion) => {
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
				$("#direcciones").html(template);
			}
		);
	}

	$(document).on("click", ".eliminar_direccion", (e) => {
		/* Selecciona el primer elemento sobre el cual se da un click.  */
		let elemento = $(this)[0].activeElement;
		/* Obtiene el valor del atributo llamado dir_id, del elemento seleccionado */
		let id = $(elemento).attr("dir_id");
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
					$.post(
						"../Controllers/UsuarioDistritoController.php",
						{ funcion, id },
						(response) => {
							/* console.log(response); */
							if (response == "success") {
								swalWithBootstrapButtons.fire(
									"¡Eliminado!",
									"Su dirección ha sido eliminada.",
									"success"
								);
								llenar_direcciones();
							} else if (response == "error") {
								swalWithBootstrapButtons.fire(
									"Advertencia",
									"No se permite alteraciones en la integrida de datos!!!",
									"error"
								);
							} else {
								swalWithBootstrapButtons.fire(
									"No se pudo eliminar la dirección",
									"Error en el Sistema =( ",
									"error"
								);
							}
						}
					);
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
		$.post(
			"../Controllers/DepartamentoController.php",
			{ funcion },
			(response) => {
				/* console.log(response); */
				let departamentos = JSON.parse(response);
				/* console.log(departamentos); */
				let template = "";
				departamentos.forEach((departamento) => {
					template += `<option value="${departamento.id}">${departamento.nombre}</option>`;
				});
				/* console.log(template); */
				$("#departamento").html(template);
				$("#departamento").val("").trigger("change");
			}
		);
	}

	/* Detecta si existe algun cambio en el Select2 de id llamado departamento y ejecuta una función 
	en caso exista dicho cambio. */
	$("#departamento").change(function () {
		/* Obtenemos el id del departemento seleccionado en el select */
		let id_departamento = $("#departamento").val();
		funcion = "llenar_provincia";
		$.post(
			"../Controllers/ProvinciaController.php",
			{ funcion, id_departamento },
			(response) => {
				/* console.log(response); */
				let provincias = JSON.parse(response);
				/* console.log(provincias); */
				let template = "";
				provincias.forEach((provincia) => {
					template += `<option value="${provincia.id}">${provincia.nombre}</option>`;
				});
				/* console.log(template); */
				$("#provincia").html(template);
				$("#provincia").val("").trigger("change");
			}
		);
	});

	$("#provincia").change(function () {
		/* Obtenemos el id de la provincia seleccionada en el select */
		let id_provincia = $("#provincia").val();
		funcion = "llenar_distritos";
		$.post(
			"../Controllers/DistritoController.php",
			{ funcion, id_provincia },
			(response) => {
				/* console.log(response); */
				let distritos = JSON.parse(response);
				/* console.log(distritos); */
				let template = "";
				distritos.forEach((distrito) => {
					template += `<option value="${distrito.id}">${distrito.nombre}</option>`;
				});
				/* console.log(template); */
				$("#distrito").html(template);
			}
		);
	});

	function verificar_sesion() {
		funcion = "verificar_sesion";
		$.post(
			"../Controllers/UsuarioController.php",
			{ funcion },
			(response) => {
				/* console.log(response); */
				if (response != "") {
					/* Si la condición se cumple hay una sesión abierta */
					let sesion = JSON.parse(response);
					$("#nav_login").hide();
					$("#nav_register").hide();
					$("#usuario_nav").text(sesion.user + " #" + sesion.id);
					$("#avatar_nav").attr(
						"src",
						"../Util/img/Users/" + sesion.avatar
					);
					$("#avatar_menu").attr(
						"src",
						"../Util/img/Users/" + sesion.avatar
					);
					$("#usuario_menu").text(sesion.user);
				} else {
					$("#nav_usuario").hide();
					location.href = "login.php";
				}
			}
		);
	}

	function obtener_datos() {
		funcion = "obtener_datos";
		$.post(
			"../Controllers/UsuarioController.php",
			{ funcion },
			(response) => {
				/* console.log(response); */
				/* Como estamos recibiendo los valores en un String del lado del servidor ahora se procede a convertirlo en array para acceder a los datos. */
				let usuario = JSON.parse(response);
				/* console.log(usuario); */
				$("#username").text(usuario.username);
				$("#tipo_usuario").text(usuario.tipo_usuario);
				$("#avatar_perfil").attr(
					"src",
					"../Util/img/Users/" + usuario.avatar
				);
				$("#nombres").text(usuario.nombres + " " + usuario.apellidos);
				$("#dni").text(usuario.dni);
				$("#email").text(usuario.email);
				$("#telefono").text(usuario.telefono);
			}
		);
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
				if (response == "success") {
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
					llenar_direcciones();
				} else {
					Swal.fire({
						icon: "error",
						title: "Error",
						text:
							"Hubo conflicto al registrar la dirección, comuniquese con el área de sistemas",
					});
				}
			}
		);
		e.preventDefault(); /* Evita que se refresque la pagina */
	});

	/* Evento que permitira editar los Datos Personales de un Usuario */
	$(document).on("click", ".editar_datos", (e) => {
		funcion = "obtener_datos";
		$.post(
			"../Controllers/UsuarioController.php",
			{ funcion },
			(response) => {
				let usuario = JSON.parse(response);
				/* Obtiene en los campos dentro el Modal editar Datos de Usuario cada uno de sus valores.. */
				$("#nombres_mod").val(usuario.nombres);
				$("#apellidos_mod").val(usuario.apellidos);
				$("#dni_mod").val(usuario.dni);
				$("#email_mod").val(usuario.email);
				$("#telefono_mod").val(usuario.telefono);
			}
		);
	});

	/* Registra los datos ya validados del formulario, del modal que permite editar  Datos Personales del Usuario */
	$.validator.setDefaults({
		submitHandler: function () {
			/* alert("Todos los campos validados"); */
			funcion = "editar_datos";
			/* Como en unos de los campos nesecitamos enviar archivos al servidor 
			lo haremos usando FormData, pero solo se lo puede hacer
			mediante AJAX */
			let datos = new FormData(
				$("#form-datos")[0]
			); /* Captura todos los datos del Formulario */
			datos.append(
				"funcion",
				funcion
			); /* Incluye la variable función en el FormData llamado datos */
			$.ajax({
				type: "POST",
				url: "../Controllers/UsuarioController.php",
				data: datos,
				/* Los atributos cache, processData y contentType nos permitira enviar imágens y archivos. */
				cache: false,
				processData: false,
				contentType: false,
				success: function (response) {
					console.log(response);
					if (response == "success") {
						Swal.fire({
							position: "center",
							icon: "success",
							title: "Se ha editado sus datos correctamente",
							showConfirmButton: false,
							timer: 2000,
						}).then(function () {
							verificar_sesion();
							obtener_datos();
						});
					} else {
						Swal.fire({
							icon: "error",
							title: "Error",
							text:
								"Hubo conflicto al editar sus datos, comuniquese con el área de sistemas",
						});
					}
				},
			});
		},
	});

	/* Método perzonalizado para validar que el campo solo permita letras */
	jQuery.validator.addMethod(
		"letras",
		function (value, element) {
			/* Código que permitira que los espacios sean ignorados solo para la validación */
			let variable = value.replace(/ /g, "");
			return /^[A-Za-z]+$/.test(variable);
		},
		"* Este campo solo permite letras y no datos que contengan números"
	);

	/* Código para validar formulario en el Modal que edita Datos de Usuario*/
	$("#form-datos").validate({
		rules: {
			nombres_mod: {
				required: true,
				letras: true,
			},
			apellidos_mod: {
				required: true,
				letras: true,
			},
			dni_mod: {
				required: true,
				digits: true,
				minlength: 8,
				maxlength: 8,
			},
			email_mod: {
				required: true,
				email: true,
			},
			telefono_mod: {
				required: true,
				digits: true,
				minlength: 8,
				maxlength: 8,
			},
		},
		messages: {
			nombres_mod: {
				required: "* Este campo es obligatorio",
			},
			apellidos_mod: {
				required: "* Este campo es obligatorio",
			},
			dni_mod: {
				required: "* Este campo es obligatorio",
				digits: "* Solo se admiten números en este campo",
				minlength: "* El DNI debe ser de solo 8 caracteres",
				maxlength: "* El DNI debe ser de solo 8 caracteres",
			},
			email_mod: {
				required: "* Este campo es obligatorio",
				email: "* El formato no corresponde a un correo electronico",
			},
			telefono_mod: {
				required: "* Este campo es obligatorio",
				digits: "* Solo se admiten números en este campo",
				minlength: "* El teléfono debe ser de solo 8 caracteres",
				maxlength: "* El teléfono debe ser de solo 8 caracteres",
			},
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass("is-invalid");
			$(element).removeClass("is-valid");
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
			$(element).addClass("is-valid");
		},
	});

	/* METODOS PARA VALIDAR MODAL DE CAMBIO DE CONTRASEÑAS */
	$.validator.setDefaults({
		submitHandler: function () {
			funcion = 'cambiar_contra';
			let pass_old = $('#pass_old').val();
			let pass_new = $('#pass_new').val();
			$.post('../Controllers/UsuarioController.php', { funcion, pass_old, pass_new }, (response) => {
				/* console.log(response); */
				if (response == 'success') {
					Swal.fire({
						position: 'center',
						icon: 'success',
						title: 'Se ha cambiado tu contraseña',
						showConfirmButton: false,
						timer: 1000
					}).then(function() {
						$('#form-contra').trigger('reset');
					});
				} else if (response == 'error') {
					Swal.fire({
						icon: 'warning',
						title: 'Contraseña actual incorrecta',
						text: 'Ingrese su contraseña actual para poder cambiarla!'
					});
				} else {
					Swal.fire({
						icon: "error",
						title: "Error",
						text:
							"Hubo conflicto al cambiar su contraseña, comuniquese con el area de sistemas",
					});
				}
			});
		},
	});

	jQuery.validator.addMethod(
		"letras",
		function (value, element) {
			let variable = value.replace(/ /g, "");
			return /^[A-Za-z]+$/.test(variable);
		},
		"* Este campo solo permite letras y no datos que contengan números"
	);

	$("#form-contra").validate({
		rules: {
			pass_old: {
				required: true,
				minlength: 8,
				maxlength: 20,
			},
			pass_new: {
				required: true,
				minlength: 8,
				maxlength: 20,
			},
			pass_repeat: {
				required: true,
				equalTo: "#pass_new",
			},
		},
		messages: {
			pass_old: {
				required: "* Este campo es obligatorio",
				minlength:
					"* La contraseña debe tener como minimo 8 caracteres",
				maxlength:
					"* La contraseña debe tener como maximo 20 caracteres",
			},
			pass_new: {
				required: "* Este campo es obligatorio",
				minlength:
					"* La contraseña debe tener como minimo 8 caracteres",
				maxlength:
					"* La contraseña debe tener como maximo 20 caracteres",
			},
			pass_repeat: {
				required: "* Este campo es obligatorio",
				equalTo: "* Ingrese una contraseña igual a la anterior",
			}
		},
		errorElement: "span",
		errorPlacement: function (error, element) {
			error.addClass("invalid-feedback");
			element.closest(".form-group").append(error);
		},
		highlight: function (element, errorClass, validClass) {
			$(element).addClass("is-invalid");
			$(element).removeClass("is-valid");
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).removeClass("is-invalid");
			$(element).addClass("is-valid");
		}
	});

});
