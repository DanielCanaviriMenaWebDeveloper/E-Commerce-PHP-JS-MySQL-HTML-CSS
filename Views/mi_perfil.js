$(document).ready(function () {
	var funcion;
	verificar_sesion();

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
			}
		});
	}
});
