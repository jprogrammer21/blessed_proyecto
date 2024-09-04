<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Blessed</title>
    <link rel="stylesheet" href="view/page/css/leadmark.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <style>
        body {
            background-image: url(view/page/img/Fondo-principal2.png);
        }

        .bg {
            background-image: url(public/assets/img/logob.PNG);
            background-position: center center;
        }

        .loguin {
            background: rgba(255, 255, 255, 0.1);
            border-left: 1px solid rgba(255, 255, 255, 0.1);
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .icons {
            width: 200px;
            display: flex;
            justify-content: space-around;
            margin: auto;
        }

        .border-icon {
            height: 20px;
            width: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            border: solid thin white;
            border-radius: 50%;
            font-size: 1.5rem;
            transition: all .3s ease-in;
        }

        .border-icon:hover {
            background-color: rgb(255, 255, 255);
            cursor: pointer;
        }

        .btn-loguin {
            border: solid thin white;
            background-color: rgba(240, 248, 255, 0.6);
            font-weight: 600;
            font-size: .8rem;
            cursor: pointer;
            color: rgb(0, 0, 0);
        }

        .btn-loguin:hover {
            transform: translateY(-3%);
            box-shadow: 0 3px 10px rgba(207, 212, 222, 0.9);
        }

        .modal-colors {
            background-image: url(view/page/img/Fondo-principal2.png);
        }

        .c {
            color: #1289A7;
            font-size: 30px;
        }

        .btn-form {
            background-color: rgba(240, 248, 255, 0.6);
        }

        .btn-form:hover {
            transform: translateY(-3%);
            box-shadow: 0 3px 10px rgba(207, 212, 222, 0.9);
        }

        .close-btn {
            width: 30px;
            height: 30px;
            color: white;
            background-color: transparent !important;
            border: none;
        }

        .formulario__mensaje {
            width: 80%;
            height: 45px;
            line-height: 45px;
            background: #F66060;
            padding: 0 15px;
            border-radius: 3px;
            margin-left: 40px;
            display: none;

        }

        .formulario__mensaje-activo {
            display: block;
        }

        .formulario__men {
            width: 80%;
            height: 45px;
            line-height: 45px;
            background: #F66060;
            padding: 0 15px;
            border-radius: 3px;
            margin-left: 40px;
            display: none;
        }

        .formulario__men-activo {
            display: block;
        }

        .adve {
            font-size: 30px;
            color: white;
            margin-right: 4px;
        }
    </style>
</head>
<style>
    #spinner {
        opacity: 0;
        visibility: hidden;
        transition: opacity .5s ease-out, visibility 0s linear .5s;
        z-index: 99999;
    }

    .bg-white {
        background-color: #fff !important;
    }

    .align-items-center {
        align-items: center !important;
    }

    .justify-content-center {
        justify-content: center !important;
    }

    .vh-100 {
        height: 100vh !important;
    }

    .w-100 {
        width: 100% !important;
    }

    .translate-middle {
        transform: translate(-50%, -50%) !important;
    }

    .start-50 {
        left: 50% !important;
    }

    .top-50 {
        top: 50% !important;
    }

    .position-fixed {
        position: fixed !important;
    }

    .d-flex {
        display: flex !important;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    #spinner.show {
        transition: opacity .5s ease-out, visibility 0s linear 0s;
        visibility: visible;
        opacity: 1;
    }

    .spinnerr {
        border: 4px solid rgba(0, 0, 0, 0.1);
        width: 36px;
        height: 36px;
        border-radius: 50%;
        border-left-color: #09f;

        animation: spin 1s ease infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<div id="spinner"
    class="bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinnerr"></div>
</div>

<body>
    <div class="modal  show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-colors">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Blessed Trading Academy</h5>
                    <button type="button" class="close-btn" data-dismiss="modal" aria-hidden="true">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="modal-title" id="exampleModalLabel" style="color:white; text-align: center;">Recuperar
                        contraseña</h6>
                    <!-- FORM ONE -->
                    <form id="validate_email" action="?controller=user&action=validate_email" method="post"
                        autocomplete="off">
                        <div class="mb-4" id="oc"><br>
                            <div class="row">
                                <div class="col-2">
                                    <div style="margin-left: 28px;">
                                        <i class="bi bi-envelope c"></i>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <input type="email" class="form-control text-white rounded-0 bg-transparent"
                                        id="email" name="email" placeholder="Correo electronico" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-10" style="margin-left: 20px;">
                            <button type="submit" class="btn  btn-form">Enviar</button>
                        </div>
                    </form>

                    <!--FORM TWO -->

                    <form id="vali_code" action="?controller=user&action=validate_code" method="post" autocomplete="off"
                        style="display: none;">
                        <div class="mb-4"><br>
                            <center>
                                <div style="width: 80%; ">
                                    <span class="text-white" style="text-align: center;">Por Seguridad Blessed academy
                                        quiere verificar si eres tu el que esta iniciando sesión</span>
                                </div>
                            </center><br>
                            <div class="row">
                                <div class="col-2">
                                    <div style="margin-left: 28px;">
                                        <i class="bi bi-123 c"></i>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <input type="text" class="form-control text-white rounded-0 bg-transparent"
                                        id="token" name="token" placeholder="dijite el codigo" pattern="[0-9]{5,5}"
                                        title="la longitud del codigo debe ser de min 5 max 5 dijitos">
                                </div>
                            </div><br>
                            <div class="formulario__mensaje" id="formulario__mensaje">
                                <p><i class="bi bi-exclamation-circle adve"></i><b class="text-white">Error: Codigo
                                        errado</b> </p>
                            </div><br>
                            <div class="col-10" style="margin-left: 20px;">
                                <button type="button" class="btn btn-secondary btn-form" data-dismiss="modal"
                                    onclick="back()">atras</button>
                                <button type="submit" class="btn  btn-form">Enviar</button>
                            </div>
                    </form>
                </div>

                <!-- FORM THREE -->
                <form id="recover" action="?controller=user&action=recover_pass" method="post" autocomplete="off"
                    style="display: none;">
                    <div class="mb-4"><br>
                        <div class="formulario__men" id="formulario__men">
                            <p><i class="bi bi-exclamation-circle adve"></i><b class="text-white">Error:No coinciden las
                                    contraseñas</b> </p>
                        </div><br>
                        <div class="row">
                            <div class="col-2">
                                <div style="margin-left: 28px;">
                                    <i class="bi bi-key-fill c"></i>
                                </div>
                            </div>
                            <div class="col-10">
                                <input type="password" class="form-control text-white rounded-0 bg-transparent"
                                    id="password1" name="password1" placeholder="dijite la contraseña nueva"
                                    minlength="11" maxlength="30" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-2">
                                <div style="margin-left: 28px;">
                                    <i class="bi bi-key-fill c"></i>
                                </div>
                            </div>
                            <div class="col-10">
                                <input type="password" class="form-control text-white rounded-0 bg-transparent"
                                    id="password2" name="password2" placeholder="repita la contraseña nueva" required
                                    minlength="11" maxlength="30">
                            </div><br>
                            <div class="col-10" style="margin-left: 50px;">
                                <input type="checkbox" class="form-check-input" id="viewp" onclick="view()">
                                <label class="form-check-label text-white" for="exampleCheck1">Mostrar
                                    Contraseñas</label>
                                <input type="text" id="user_uid" name="user_uid" value="" style="display: none;">
                            </div>
                        </div>
                    </div>
                    <div class="col-10" style="margin-left: 20px;">
                        <button type="submit" class="btn btn-form">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    
    <div class="container w-75 mt-5 rounded shadow">
        <br><br>    
        <div class="row aling-item-stretch">
            <div class="col bg d-none d-lg-block col-md-5 col-lg-5 col-xl-6 rounded">

            </div>
            <div class="col loguin " >
                <h2 class="f2-bold text-center py-5 text-white">Bienvenido a Blessed Trading Academy</h2>
                
               <div>
                <form id="validate" action="?controller=user&action=validate" method="post" autocomplete="off">
                    <div class="mb-4">
                        <input type="email" class="form-control text-white rounded-0 bg-transparent" name="email"
                            placeholder="Correo electronico" required>
                    </div>
                    <div class="mb-4">

                        <input type="password" class="form-control text-white rounded-0 bg-transparent" name="password"
                            placeholder="Contraseña" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class=" btn btn-lg btn-block btn-loguin">Iniciar Sesión</button>
                    </div>
                </form>
                </div>
                <div class="my-3">
                    <div class="row">
                        <div class="col">
                            <span class="text-white">No tienes cuenta?</span>
                        </div>
                        <div class="col">
                            <span><a href="#" data-toggle="modal" data-target="#exampleModal"
                                    style="color:#1289A7;">Recuperar Contraseña</a></span>
                        </div>
                    </div>
                    <a style="color:#1289A7;"
                                    href="?controller=type&action=list_pln">Registrate</a>
                </div>
            </div>
        </div>
        <script>
            function view() {
                var p1 = document.getElementById("password1");
                var p2 = document.getElementById("password2");
                if (p1.type == 'text' && p2.type == 'text') {
                    p1.type = 'password';
                    p2.type = 'password';
                } else {
                    p1.type = 'text';
                    p2.type = 'text';
                }

            }
        </script>
        <script src="public/assets/js/core/jquery.min.js"></script>
        <script>

function spa(){
    $('#spinner').addClass("show");
    
}
            


            $("#validate_email").submit(function () {
                spa();
                var data = $(this).serialize();
                var url = $(this).attr("action");
                $.post(url, data, function (e) {
                    if (e.response == "y") {
                        Swal.fire({
                            icon: 'warning',
                            title: 'codigo  enviado',
                            text: "el codigo de verificacion a sido enviado a su correo!",
                            showConfirmButton: true,
                            timer: 1500
                        })
                        
                        window.setTimeout(vcode(), 1000);
                    } else if (e.response == "n") {
                        Swal.fire({
                            icon: 'error',
                            title: 'codigo no enviado',
                            text: 'Esta direccion de correo no esta registrada',
                            showConfirmButton: true,
                          
                        })
                    }
                    $('#spinner').removeClass("show");
                    $("#validate_email").trigger("reset");

                }, 'JSON');
                return false;
            });


            $("#vali_code").submit(function () {
                var data = $(this).serialize();
                var url = $(this).attr("action");
                $.post(url, data, function (e) {
                    if (e.response == "error") {
                        Swal.fire({
                            icon: 'error',
                            title: 'error de codigo',
                            text: 'Por favor digitar un numero',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                    else if (e.response == "n") {
                        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
                    }
                    else if (e.response == "y") {
                        $("#user_uid").val(e.u);
                        window.setTimeout(vpassword(), 1000);
                    }

                    $("#vali_code").trigger("reset");
                }, 'JSON');
                return false;
            })






            $("#recover").submit(function () {
                var pass1 = $("#password1").val();
                var pass2 = $("#password2").val();
                var user = $("#user_uid").val();
                var data = $(this).serialize();
                var url = $(this).attr("action");
                if (pass1 != pass2) {
                    document.getElementById('formulario__men').classList.add('formulario__men-activo');
                    $("#recover").trigger("reset");

                } else if (pass1 == pass2) {
                    $.post(url, data, function (e) {
                        Swal.fire(
                            e.r,
                            '',
                            e.icon
                        )
                    }, 'JSON')
                    $("#recover").trigger("reset");
                    setTimeout(refresh(), 3000);
                }
                return false;
            })



            function refresh() {
                setTimeout(function () {
                    window.location.href = "?controller=home&action=login";
                }, 3000);
            }

            function back() {
                document.getElementById('validate_email').style.display = "block";
                document.getElementById('vali_code').style.display = "none";
                document.getElementById('recover').style.display = "none";
            }

            function vcode() {

                document.getElementById('validate_email').style.display = "none";
                document.getElementById('vali_code').style.display = "block";
                document.getElementById('recover').style.display = "none";
            }

            function vpassword() {

                document.getElementById('validate_email').style.display = "none";
                document.getElementById('vali_code').style.display = "none";
                document.getElementById('recover').style.display = "block";
            }
        </script>

        <script src="view/page/js/leadmark.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="public/assets/js/script.js"></script>
        <script src="public/assets/js/core/jquery.min.js"></script>
        <script src="public/assets/js/core/popper.min.js"></script>
        <script src="public/assets/js/core/bootstrap.min.js"></script>
        <script src="public/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!--  Google Maps Plugin    -->
        <!-- Place this tag in your head or just before your close body tag. -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!-- Chart JS -->
        <script src="public/assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="public/assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="public/assets/js/black-dashboard.min.js?v=1.0.0"></script>
        <!-- Black Dashboard DEMO methods, don't include it in your project! -->
        <script src="public/assets/demo/demo.js"></script>

</body>

</html>