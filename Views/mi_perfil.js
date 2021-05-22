$(document).ready(function () {
	var funcion;
	verificar_sesion();
	obtener_datos();
	llenar_departamentos();
		
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
