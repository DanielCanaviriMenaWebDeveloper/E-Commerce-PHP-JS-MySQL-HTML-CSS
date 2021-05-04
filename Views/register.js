$(document).ready(function() {
	var funcion;
	verificar_sesion();

	function verificar_sesion() {
		funcion = "verificar_sesion";
		$.post(
			"../Controllers/UsuarioController.php",
			{ funcion },
			(response) => {
				/* console.log(response); */
				if (response != "") {
					/* Si la condición se cumple hay una sesión abierta */
					location.href = "../index.php";
				}
			}
		);
	}

    $.validator.setDefaults({
		submitHandler: function () {
			/* alert("¡Formulario enviado correctamente!"); */
			let username = $('#username').val();
			let pass = $('#pass').val();
			let nombres = $('#nombres').val();
			let apellidos = $('#apellidos').val();
			let dni = $('#dni').val();
			let email = $('#email').val();
			let telefono = $('#telefono').val();
			funcion = "registrar_usuario";
			$.post(
				"../Controllers/UsuarioController.php",
				{ funcion, username, pass, nombres, dni, telefono, apellidos, email },
				(response) => {
					response = response.trim(); // Eliminamos espacios en blanco
					/* Usamos https://sweetalert2.github.io/ para los mensajes */
					if (response == "success") {
						Swal.fire({
							position: "center",
							icon: "success",
							title: "Se ha registrado correctamente",
							showConfirmButton: false,
							timer: 2500,
						}).then(function() {
							$('#form-register').trigger('reset');
							location.href = '../Views/login.php';
						});
					} else {
						Swal.fire({
							icon: "error",
							title: "Error",
							text: "Hubo conflicto al registrarse, comuniquese con el area de sistemas",
						});
					}
				}
			);
		},
	});
	
    jQuery.validator.addMethod(
		"usuario_existente",
		function (value, element) {
			let funcion = "verificar_usuario";
			let bandera;
			/* $.post(
				"../Controllers/UsuarioController.php",
				{ funcion, value },
				(response) => {
					console.log(response);
					if(response == "success") {
						bandera = false;
					} else {
						bandera = true;
					}
				}
			);
			return bandera; */
			$.ajax({ // Usamos AJAX de forma sincrona a diferencia de post que es de forma asincrona
				type: "POST",
				url: "../Controllers/UsuarioController.php",
				data: "funcion=" + funcion + "&&value=" + value,
				async: false,
				success: function(response) {
					if (response == "success") {
						bandera = false;
					} else {
						bandera = true;
					}
				}  
			});
			/* console.log(bandera); */
			return bandera;
		},
		"* El nombre de usuario ya existe, introduzca un nombre de usuario distinto"
	);

    jQuery.validator.addMethod(
		"letras",
		function(value, element) {
			return /^[A-Za-z]+$/.test(value);
		},
		"* Este campo solo permite letras"
	);

	
	$("#form-register").validate({
		rules: {
			username: {
				required: true,
                minlength: 8,
				maxlength: 20,
				usuario_existente: true
			},
			pass: {
				required: true,
				minlength: 8,
				maxlength: 20,
			},
			pass_repeat: {
				required: true,
				equalTo: "#pass",
			},
			nombres: {
                required: true,
                letras: true
			},
			apellidos: {
                required: true,
                letras: true
			},
			dni: {
				required: true,
				digits: true,
				minlength: 8,
				maxlength: 8,
			},
			email: {
				required: true,
				email: true,
			},
			telefono: {
				required: true,
				digits: true,
				minlength: 8,
				maxlength: 8,
			},
			terms: {
				required: true,
			},
		},
		messages: {
			username: {
				required: "* Este campo es obligatorio",
				minlength:
					"* El nombre de usuario debe tener como minimo 8 caracteres",
				maxlength:
					"* El nombre de usuario debe tener como maximo 20 caracteres",
			},
			pass: {
				required: "* Este campo es obligatorio",
				minlength:
					"* La contraseña debe tener como minimo 8 caracteres",
				maxlength:
					"* La contraseña debe tener como maximo 20 caracteres",
			},
			pass_repeat: {
				required: "* Este campo es obligatorio",
				equalTo: "* Ingrese una contraseña igual a la anterior",
			},
			nombres: {
				required: "* Este campo es obligatorio",
			},
			apellidos: {
				required: "* Este campo es obligatorio",
			},
			dni: {
				required: "* Este campo es obligatorio",
				digits: "* Solo se admiten números en este campo",
				minlength: "* El DNI debe ser de solo 8 caracteres",
				maxlength: "* El DNI debe ser de solo 8 caracteres",
			},
			email: {
				required: "* Este campo es obligatorio",
				email: "* El formato no corresponde a un correo electronico",
			},
			telefono: {
				required: "* Este campo es obligatorio",
				digits: "* Solo se admiten números en este campo",
				minlength: "* El teléfono debe ser de solo 8 caracteres",
				maxlength: "* El teléfono debe ser de solo 8 caracteres",
			},
			terms: "Por favor acepte los terminos",
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
});