<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Start your development with LeadMark landing page.">
<meta name="author" content="Devcrud">
<title>Bleesed</title>
<!-- font icons -->
<link rel="stylesheet" href="view/page/vendors/themify-icons/css/themify-icons.css">
<!-- Bootstrap + LeadMark main styles -->
<link rel="stylesheet" href="view/page/checkout.css">
<link rel="stylesheet" href="view/page/css/leadmark.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<head>

    <style>
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
            padding: 20px;
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

        @media (max-width:570px) {
            .icons {
                width: 100px;
                padding: 1px;
            }

            .border-icon {
                height: 10px;
                width: 10px;
                margin-left: 3px;
            }

            .mtm {
                font-size: 20px;
            }
        }
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
*, *::before, *::after {
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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500&family=Gelasio&family=Martel:wght@200&family=Quattrocento:wght@700&family=Source+Serif+Pro:wght@300&display=swap');
    </style>
    
</head>
<div id="spinner" class="bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinnerr"></div>
    </div>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <!-- page Navigation -->
    <br><br><br>
    <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" style="background:black; height: auto;" data-spy="affix" data-offset-top="10">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="view/page/img/uplogo.PNG" alt="" style="width:200px;">
            </a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=" st">
                    <style>
                        .st {
                            display: inline-block;
                            width: 1.5em;
                            height: 1.5em;
                            vertical-align: middle;
                            content: "";
                            background: no-repeat center center;
                            background-size: 100% 100%;
                            background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba(158, 3, 255, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
                        }

                        line {
                            width: 100px;
                            height: 50px;
                            background-color: aqua;
                        }
                    </style>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=type&action=list_pln">planes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?controller=home&action=login">
                            Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>

    <main class="container loguin">
        <h2 class="f2-bold text-center py-5 text-white mtm">Bienvenido a Blessed Trading Academy</h2>
        <form action="?controller=user&action=regist" id="frmreg" method="post" class="" autocomplete="off">
            <div class="form-body">
                <div class="fila">
                    <div>
                        
                        <div class="form-group col-md-12">
                        <label class="form-label" for="name">Nombre *</label>
                            <input type="text" class="form-control text-white rounded-0 bg-transparent placeh" name="name" id="name" placeholder="Digite el nombre de usuario" required>
                        </div>
                    </div>

                    <div>
                        <div class="form-group col-md-12">
                        <label class="form-label" for="last-country">Pais *</label>
                            <input type="text" class="form-control text-white rounded-0 bg-transparent placeh" name="country" id="country" placeholder="Digite su pais de residencia" required>
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-12">
                        <label class="form-label" for="last-number">Numero de telefono *</label>
                            <input type="number" class="form-control text-white rounded-0 bg-transparent placeh" name="number_phone" id="number_phone" placeholder="Digite su numero de telefono" required>
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-12">
                        <label class="form-label" for="mail">Correo electrónico *</label>
                            <input type="text" class="form-control text-white rounded-0 bg-transparent placeh" name="email" id="email" placeholder="Digite su email" required>
                        </div>
                    </div>
                </div>

                <div class="fila">
                    <div>
                            <div class="form-group col-md-12">
                            <label class="form-label" for="apelidos">Apellidos *</label>
                                <input type="text" class="form-control text-white rounded-0 bg-transparent placeh" name="surname" id="surname" placeholder="Digite sus apellidos" required>
                            </div>
                        </div>

                        <div>
                            
                            <div class="form-group col-md-12">
                            <label class="form-label" for="id-plan">Elija un plan *</label>
                            <select name="plan" id="plan" class="form-control">
                                <?php
                                foreach ($this->plans as  $value) {

                                    $tp_plan_name = $value["tp_plan_name"];
                                    $tp_plan_uid = $value["tp_plan_uid"];
                                    $retVal = ($this->id == $tp_plan_uid) ? "<option style='background:#3d1a1e;' class='text-white' selected value='$tp_plan_uid'>$tp_plan_name</option>" : "<option style='background:#3d1a1e;' class='text-white' value='$tp_plan_uid'>$tp_plan_name</option>";
                                    echo $retVal;
                                }
                                ?>

                            </select>
                            </div>
                        </div>
                        <div>
                        <div class="form-group col-md-12">
                        <label class="form-label" for="password">Contraseña *
                            <span class="subtitle">(Mínimo 8 caracteres)</span></label>
                            <input type="password" class="form-control text-white rounded-0 bg-transparent placeh" name="password" id="password"  required>
                        </div>
                    </div>
                    <div>
                        <div class="form-group col-md-12">
                        <div class="g-recaptcha" data-sitekey="6LflLiUkAAAAAHyU8NKk5NHDK2OnUWVnVo2u2LzW"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class=" btn btn-lg btn-block btn-loguin">Registrarse</button>
            </div>
<br>
        </form>
    </main>

    <style>
        /* :: Layout :: */
        .container {
            width: min(1030px, 90%);
            margin-inline: auto;
        }

        .form-header {
            text-align: center;
            margin-bottom: 25px;
        }

        /* :: Modules :: */
        .form-icon {
            max-width: 90px;
            margin-bottom: 28px;
        }

        .form-title {
            font-size: 22px;
            margin: 0 auto 16px;
        }

        .form-subtitle {
            font-size: 18px;
            margin-block: 0;
        }

        .benefits {
            list-style-type: none;
            text-align: left;
            margin-top: 30px;
        }

        .benefits-item {
            margin-bottom: 16px;
        }

        .benefits-icon {
            font-size: 20px;
            margin-right: 5px;
        }

        .form-body {
            background-color: var(--beige);
            padding: 20px 15px;
            border-radius: 8px;
        }

        .form-label {
            margin-bottom: 12px;
            display: block;
            font-weight: bold;
            color: white;
        }

        .input-text {
            background-color: var(--white);
            box-sizing: border-box;
            padding: 15px 12px;
            font-family: "Montserrat", sans-serif;
            border-radius: 8px;
            margin-bottom: 30px;
            border: 2px solid transparent;
        }

        .input-text:focus-visible,
        .input-text:focus {
            border: 2px solid var(--brown);
        }

        .form-legend {
            margin-bottom: 25px;
        }

        .form-footer>*:not(:last-child) {
            margin-bottom: 25px;
        }

        .form-check {
            font-size: 14px;
        }

        /* :: State :: */
        .highlighted {
            font-weight: 600;
        }

        /* :: Mediaqueries :: */
        @media screen and (min-width: 700px) {
            .form-body {
                display: flex;
                gap: 60px;
                justify-content: space-between;
                padding: 28px 30px;
            }

            .form-body>div {
                width: 50%;
            }

            .benefits {
                display: flex;
                justify-content: space-between;
                gap: 15px;
                margin-top: 40px;
            }

            .benefits-item {
                width: 33%;
                margin-bottom: 0;
                text-align: center;
            }
        }
    </style>


    </style>
    <script src="view/page/checkout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- core  -->
    <script src="view/page/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="view/page/vendors/bootstrap/bootstrap.bundle.js"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- bootstrap 3 affix -->
    <script src="view/page/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope -->
    <script src="view/page/vendors/isotope/isotope.pkgd.js"></script>

    <!-- LeadMark js -->
    <script src="view/page/js/leadmark.js"></script>
    


</body>

</html>

<script>

function spa(){
    $('#spinner').addClass("show");
    
}
    $("#frmreg").submit(function() {
        spa()
        var dt = $(this).serialize();
        var ruta = $(this).attr("action");
        $.post(ruta, dt, function(e) {
            Swal.fire(
                e.mensaje,
                "",
                e.icono
            )
            $('#spinner').removeClass("show");
            $("#frmreg").trigger("reset");
        }, 'JSON')
        return false;
    })

    $(".accordion-titulo").click(function() {

        var contenido = $(this).next(".accordion-content");

        if (contenido.css("display") == "none") { //open		
            contenido.slideDown(250);
            $(this).addClass("open");
        } else { //close		
            contenido.slideUp(250);
            $(this).removeClass("open");
        }

    });
</script>
<style>
    @media (max-width: 767px) {
        .accordion-content {
            padding: 10px 0;
        }
    }
</style>