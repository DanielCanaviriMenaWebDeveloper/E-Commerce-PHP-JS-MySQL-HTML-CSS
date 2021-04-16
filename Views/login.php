<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Ecommerce</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../Util/css/css/all.min.css">
        <!-- icheck bootstrap -->
        <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="../Util/css/adminlte.min.css">
        <link rel="stylesheet" href="../Util/css/toastr.min.css">
        <link rel="shortcut icon" href="#">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="../Util/img/AdminLTELogo.png" alt="" class="profile-user-img img-fluid img-circle">
                <a href="../index.php"><b>Ecommerce</b>2021</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Regístrese para iniciar su sesión</p>

                    <form id="form-login">
                        <div class="input-group mb-3">
                            <input id="user" type="text" class="form-control" placeholder="User" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input id="pass" type="password" class="form-control" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="social-auth-links text-center mb-3">
                            <button type="submit" href="#" class="btn btn-block btn-primary">
                                Iniciar sesión
                            </button>
                        </div>
                        <!-- /.social-auth-links -->
                    </form>

                    <p class="mb-1">
                        <a href="">Olvidé mi contraseña</a>
                    </p>
                    <p class="mb-0">
                        <a href="" class="text-center">Registrarse</a>
                    </p>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
        <!-- /.login-box -->

        <!-- jQuery -->
        <script src="../Util/js/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../Util/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../Util/js/adminlte.min.js"></script>
        <script src="../Util/js/toastr.min.js"></script>
        <script src="login.js"></script>
    </body>
</html>
