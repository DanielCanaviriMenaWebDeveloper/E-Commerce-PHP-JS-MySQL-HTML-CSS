$(document).ready(function() {
    var funcion;
    $('#form-login').submit(e => {
        funcion = 'login';
        let user = $('#user').val();
        let pass = $('#pass').val();

        /* console.log(`Usuario: ${user} - Contraseña: ${pass}`); */

        /* Comunicación desde login.js con usuarioController.php a travez del método post de JQuery */
        $.post('../Controllers/UsuarioController.php', { user, pass, funcion }, (response) => {
            /* console.log(response); */
            if(response == 'logueado') {
                /* alert('Se inicio sesión correctamente'); */
                toastr.success('Se inicio sesión correctamente');
            } else {
                /* alert('Ingrese un usuario o contraseña valido'); */
                toastr.error('Ingrese un usuario o contraseña valido');
            }
        })

        e.preventDefault(); /* Evita que se refresque la pagina */
    })
})