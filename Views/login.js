$(document).ready(function() {
    var funcion;
    verificar_sesion();

    function verificar_sesion() {
        funcion = 'verificar_sesion';
        $.post(
            '../Controllers/UsuarioController.php',
            { funcion },
            (response) => {
                /* console.log(response); */
                if (response != '') { /* Si la condición se cumple hay una sesión abierta */
                    location.href = '../index.php';
                }
            }
        );
    }

    /* Evento submit para poder loguearse */
    $('#form-login').submit(e => {
        funcion = 'login';
        let user = $('#user').val();
        let pass = $('#pass').val();

        /* console.log(`Usuario: ${user} - Contraseña: ${pass}`); */

        /* Comunicación desde login.js con usuarioController.php a travez del método post de JQuery */
        $.post('../Controllers/UsuarioController.php', { user, pass, funcion }, (response) => {
            console.log(response);
            if(response == 'logueado') {
                /* alert('Se inicio sesión correctamente'); */
                toastr.success('Se inicio sesión correctamente');
                location.href = '../index.php';
            } else {
                /* alert('Ingrese un usuario o contraseña valido'); */
                toastr.error('Ingrese un usuario o contraseña valido');
            }
        });

        e.preventDefault(); /* Evita que se refresque la pagina */
    });
});