$(document).ready(function() {
    $('#form-login').submit(e => {
        let user = $('#user').val();
        let pass = $('#pass').val();

        console.log(`Usuario: ${user} - Contraseña: ${pass}`);


        e.preventDefault(); /* Evita que se refresque la pagina */
    })
})