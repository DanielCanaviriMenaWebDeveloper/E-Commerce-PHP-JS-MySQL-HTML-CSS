$(document).ready(function () {
	var funcion;
	verificar_sesion();
	obtener_datos();

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




});
