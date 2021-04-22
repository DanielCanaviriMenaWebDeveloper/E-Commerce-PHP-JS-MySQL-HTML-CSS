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
        <link rel="shortcut icon" href="#">
    </head>
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
                    <form id="quickForm">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                    <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
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
        <script src="register.js"></script>
        <script src="../Util/js/jquery.validate.min.js"></script>
        <script src="../Util/js/additional-methods.min.js"></script>
        <script>
            $(function () {
                $.validator.setDefaults({
                    submitHandler: function () {
                        alert( "Form successful submitted!" );
                    }
                });
                $('#quickForm').validate({
                    rules: {
                        email: {
                            required: true,
                            email: true,
                        },
                        password: {
                            required: true,
                            minlength: 5
                        },
                        terms: {
                            required: true
                        },
                    },
                    messages: {
                        email: {
                            required: "Please enter a email address",
                            email: "Please enter a vaild email address"
                        },
                        password: {
                            required: "Please provide a password",
                            minlength: "Your password must be at least 5 characters long"
                        },
                        terms: "Please accept our terms"
                    },
                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });
            });
        </script>
    </body>
</html>
