<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registro | Ecommerce</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../Util/css/css/all.min.css">
        <!-- icheck bootstrap -->
        <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="../Util/css/adminlte.min.css">
        <link rel="stylesheet" href="../Util/css/toastr.min.css">
        <link rel="stylesheet" href="../Util/css/sweetalert2.min.css">
        <link rel="shortcut icon" href="#">
    </head>

    <!-- Modal - Terminos de Servicio-->
    <!-- El atributo id nos sirve para poder llamar el modal -->
    <div class="modal fade" id="terminos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Terminos y condiciones</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>No vendemos tus datos personales a los anunciantes ni compartimos información que te identifique directamente (como tu nombre, dirección de correo electrónico u otra información de contacto) con los anunciantes, a menos que nos des tu permiso expreso. </li>

                            <li>Trabajamos continuamente para optimizar nuestros servicios y desarrollar nuevas funciones que mejoren nuestros Productos para ti y nuestra comunidad.</li>

                            <li>Si determinamos que incumpliste nuestras Condiciones o Políticas en reiteradas oportunidades o de una manera notoria o grave, incluidas en particular nuestras Normas comunitarias, podemos suspender o inhabilitar definitivamente el acceso a tu cuenta.</li>
                        </ul>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.Modal - Terminos de Servicio -->

    <body class="hold-transition login-page">
        <div class="mt-5">
            <div class="login-logo">
                <img src="../Util/img/AdminLTELogo.png" alt="" class="profile-user-img img-fluid img-circle">
                <a href="../index.php"><b>Ecommerce</b>2021</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Regístrarse</p>

                    <form id="form-register">

                        <div class="card-body">
                            <div class="row">
                                <!-- Nombre de Usuario -->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="username">Nombre de Usuario</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Ingrese nombre de usuario">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <!-- Contraseña -->
                                    <div class="form-group">
                                        <label for="pass">Contraseña</label>
                                        <input type="password" name="pass" class="form-control" id="pass" placeholder="Ingrese contraseña">
                                    </div>
                                    <!-- Nombres -->
                                    <div class="form-group">
                                        <label for="nombres">Nombre(s)</label>
                                        <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Ingrese nombre(s)">
                                    </div>
                                    <!-- DNI -->
                                    <div class="form-group">
                                        <label for="dni">DNI</label>
                                        <input type="text" name="dni" class="form-control" id="dni" placeholder="Ingrese DNI">
                                    </div>
                                    <!-- Teléfono -->
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Ingrese Teléfono">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- Repetir Contraseña -->
                                    <div class="form-group">
                                        <label for="pass-repeat">Repetir Contraseña</label>
                                        <input type="password" name="pass_repeat" class="form-control" id="pass_repeat" placeholder="Ingrese de nuevo su contraseña">
                                    </div>
                                    <!-- Apellidos -->
                                    <div class="form-group">
                                        <label for="apellidos">Apellido(s)</label>
                                        <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Ingrese apellido(s)">
                                    </div>
                                    <!-- Correo Electrónico -->
                                    <div class="form-group">
                                        <label for="email">Correo Electrónico</label>
                                        <input type="text" name="email" class="form-control" id="email" placeholder="Ingrese correo electrónico">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <!-- Terminos de Servicio -->
                                    <div class="form-group mb-0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="terms" class="custom-control-input" id="terms">
                                            <label class="custom-control-label" for="terms">Estoy de acuerdo con los <a href="#" data-toggle="modal" data-target="#terminos">Terminos de Servicio</a>.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-lg bg-gradient-primary">Registrarme</button>
                        </div>
                        <!-- /.card-footer -->
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        
        <!-- jQuery -->
        <script src="../Util/js/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../Util/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../Util/js/adminlte.min.js"></script>
        <script src="../Util/js/toastr.min.js"></script>
        <script src="../Util/js/jquery.validate.min.js"></script>
        <script src="../Util/js/additional-methods.min.js"></script>
        <script src="../Util/js/sweetalert2.min.js"></script>
        <script src="register.js"></script>
    </body>
</html>
