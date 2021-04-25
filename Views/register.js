$(document).ready(function() {
    $.validator.setDefaults({
		submitHandler: function () {
			alert("Form successful submitted!");
		},
    });
    jQuery.validator.addMethod("letras",
    function(value, element) {
        return /^[A-Za-z]+$/.test(value);
    }
    ,"* Este campo solo permite letras");
	$("#form-register").validate({
		rules: {
			username: {
				required: true,
                minlength: 7,
				maxlength: 20,
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
})