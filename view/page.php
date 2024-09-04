
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with LeadMark landing page.">
    <meta name="author" content="Devcrud">
    <title>Bleesed</title>
    <!-- font icons -->
    <link rel="stylesheet" href="view/page/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + LeadMark main styles -->
    <link rel="stylesheet" href="view/page/css/leadmark.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="checkout.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500&family=Gelasio&family=Martel:wght@200&family=Quattrocento:wght@700&family=Source+Serif+Pro:wght@300&display=swap');
 
  </style>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    
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

<div id="spinner" class="bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
         <div class="spinnerr"></div>
    </div>



    <!-- page Navigation -->
    <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" data-spy="affix" data-offset-top="10">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="view/page/img/uplogo.PNG" alt="" style="width:200px;">
            </a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <style>
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
                        <a class="nav-link" href="#acerca">Acerca de nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#filosofia">Filosofia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonios">Testimonios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="?controller=home&action=login">
                            Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="header">
        <img class="video" src="public/assets/video/blessacademy.gif" style="width: 100%;" alt="">
          
    </header>
                        
    <section class="section" id="acerca" style="margin: auto;">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 pr-md-5 mb-4 mb-md-0">
                    <h1 style="font-family:'Gelasio', serif ; font-size: 40px;     color:#fff;">Bienvenidos a blessed club Trading Academy</h1>
                    <h6 style="font-family:'Gelasio', serif ; font-size: 20px;     color:#fff;">El mejor lugar para saber toda la verdad del Trading las crypto y el blockchain ¿Te atreves a expandir tus conocimientos? Invierte en ti, en tu prensente y futuro</h6>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="?controller=type&action=list_pln"class="btn rounded cl_b btn-lg " > Registrate</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-md-5">
                    <div class="row">
                        <img src="public/assets/video/blessedacd.gif" style="width: 100%;" alt="">
                        
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="filosofia" class="section">
        <div class="container">
            <h6 class="section-title text-center" style="font-family:'Gelasio', serif ; font-size: 40px;     color:#fff;">Filosofia</h6>
            <br>
            <div class="row justify-content-between">
                <div class="col-md-6 pr-md-5 mb-4 mb-md-0">
                    <p style="font-family:'Gelasio', serif ; font-size: 18px;     color: #fff;">Aquí te enseñaremos a lo largo del entrenamiento a tomar decisiones basadas en la razón y en la lógica para así tener mejores herramientas para cumplir tus metas financieras. Aprenderás todo acerca de la tecnología blockchain, los principios técnicos y fundamentales del trading, al igual que las herramientas necesarias para operar en el mercado de manera educada. Nuestro objetivo es educarte con el fin de estar preparado para tomar decisiones correctas a la hora de operar</p>
                    <p style="font-family:'Gelasio', serif ; font-size: 18px;     color: #fff;">Contamos con una experiencia de mas de 6 años en el negocio del trading basado en el análisis técnico y fundamental. Amplio conocimiento en las tecnologías emergentes tales como el blockchain. </p>
                </div>
                <div class="col-md-6 pl-md-5">

                    <img src="view/page/img/trad.jpeg" style="width: 100%;" alt="">

                </div>
            </div>
        </div>
    </section>
   
    <section class="section" id="testimonios">
        <div class="container">
            <h6 class="section-title text-center mb-0" style="font-family:'Gelasio', serif ; font-size: 40px;    color: #fff;">Testimonios</h6>
            <br>
            <div class="row">
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center mb-3">
                                <img class="mr-3" src="view/page/img/avatar1.png" alt="">
                                <div class="media-body">
                                    <h6 class="mt-1 mb-0" style="font-family:'Gelasio', serif ; color: #fff;">Carlos Tovar </h6>
                                    <small class="text-muted mb-0">Realtor</small>
                                </div>
                            </div>
                            <p class="mb-0" style="font-family:'Gelasio', serif ; color: #fff;">Gracias a este curso he aprendido a tomar mis propias decisiones y a cambiar la forma en la que analizo mis finanzas.</p><br>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center mb-3">
                                <img class="mr-3" src="view/page/img/avatar2.png" alt="">
                                <div class="media-body">
                                    <h6 class="mt-1 mb-0" style="font-family:'Gelasio', serif ; color: #fff;">Alejandro Marquez </h6>
                                    <small class="text-muted mb-0">Contador</small>
                                </div>
                            </div>
                            <p class="mb-0" style="font-family:'Gelasio', serif ; color:#fff;">Estas clases me han dado la oportunidad de cambiar mi perspectiva sobre el dinero y el trabajo como por ejemplo trabajar inteligentemente y no “duro” .</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-3 my-md-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center mb-3">
                                <img class="mr-3" src="view/page/img/avatar3.png" alt="">
                                <div class="media-body">
                                    <h6 class="mt-1 mb-0" style="font-family:'Gelasio', serif ; color: #fff;">Patricia Morales </h6>
                                    <small class="text-muted mb-0">Comerciante </small>
                                </div>
                            </div>
                            <p class="mb-0" style="font-family:'Gelasio', serif ; color: #fff;">Una de las mejores inversiones que he hecho ya que se adquiere el conocimiento necesario para tomar decisiones sin depender de alguien mas como referencia .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Testmonial Section -->

    <section id="preguntas">
        <div class="container">
        <h6 class="section-title text-center mb-0" style="font-family:'Gelasio', serif ; font-size: 40px;    color:#fff;">Preguntas frecuentes</h6>
            <div id="container-main">
                <div class="accordion-container">
                    <a href="" onclick="return false" class="accordion-titulo">1. ¿El curso incluye señales o posiciones?<span class="toggle-icon"></span></a>
                    <div class="accordion-content">
                        <p>  R// No, en Blessed Club Trading Academy nos encargaremos de educarte profesionalmente para que no necesites “comprar” señales o posiciones </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <a href="" onclick="return false" class="accordion-titulo">2. ¿El curso es en vivo?<span class="toggle-icon"></span></a>
                    <div class="accordion-content">
                        <p>  R// No, el curso es pre-grabado con seguimiento en vivo.  </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <a href="" onclick="return false" class="accordion-titulo">3. ¿Cuánto tiempo dura la suscripción?<span class="toggle-icon"></span></a>
                    <div class="accordion-content">
                        <p>  R// Tu membrecía te dará acceso a tu cuenta por 7 meses. En estos 7 meses tendrás que completar el curso y todas las evaluaciones a tu propio ritmo según tu horario lo permita. </p>
                    </div>
                </div>
                <div class="accordion-container">
                    <a href="" onclick="return false" class="accordion-titulo">4. ¿Cuáles métodos de pagos aceptan?<span class="toggle-icon"></span></a>
                    <div class="accordion-content">
                        <p>  R// Criptomonedas y tarjeta de débito/crédito.   </p>
                    </div>
                </div>

                
            </div>
        </div>



    </section>
    <!-- Contact Section -->
    <section id="contact" class="section has-img-bg pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 my-3">

                <img class="mb-4" style="width: 100%;" src="view/page/img/uplogo.png" alt="">

                    <h6 class="mb-0">Correo </h6>
                    <p class="mb-4">info@website.com</p>
                    
                    <h6 class="mb-0">Siguenos</h6>
                    <p class="mb-0" style="font-size: 20px ;"><a href=""><i class="bi bi-discord"></a></i> <a href="https://www.instagram.com/jkiguaran/?hl=es-la"><i class="bi bi-instagram"></i></a> <a href="https://www.youtube.com/@jkiguaran"><i class="bi bi-youtube"></i></a> </p>
                </div>
                <div class="col-md-7">
                    <form id="cont" action="?controller=user&action=contact" method="post" autocomplete="off" >
                        <h4 class="mb-4">Contáctanos</h4>
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control text-white rounded-0 bg-transparent" id="name" name="name" placeholder="Nombre" required pattern="[A-Za-z]+">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="email" class="form-control text-white rounded-0 bg-transparent" 
                                id="email" name="email" placeholder="Correo" required>
                            </div>
                            
                            <div class="form-group col-12">
                                <textarea id="descripcion" name="descripcion" cols="30" rows="4" class="form-control text-white rounded-0 bg-transparent" placeholder="Mensaje" required pattern="[A-Za-z]+"></textarea>

                            </div>
                            <div class="form-group col-12">
                            <div class="g-recaptcha" data-sitekey="6LflLiUkAAAAAHyU8NKk5NHDK2OnUWVnVo2u2LzW"></div>
                            </div>
                            <div class="form-group col-12 mb-0">
                                <button type="submit" class="btn cl_b rounded w-md mt-3" data-toggle="modal" data-target="#exampleModal">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Page Footer -->
            <footer class="mt-5 py-4 border-top border-secondary">
                    <div class="copyright">
            ©
           2023 Hecho por
            programmersJJ para Blessed
          </div>
            </footer>

        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="view/page/vendors/jquery/jquery-3.4.1.js"></script>
    

    <script>
        function spa(){
    $('#spinner').addClass("show");
    
}
    $("#cont").submit(function() {
        spa();
        var data = $(this).serialize();
        var url = $(this).attr("action");
        $.post(url, data, function(e){
            
            if(e.response == "y"){
                Swal.fire({
                            icon: 'success',
                            title: 'Mensaje enviado con exito',
                            text: "Su mensaje sera revisado pronto",
                            showConfirmButton: true,
                         
                        })
                        $('#spinner').removeClass("show");
                $("#cont").trigger("reset");
            }else{
                Swal.fire({
                            icon: 'error',
                            title: 'Mensaje no enviado',
                            text: 'Digite correctamente los campos',
                            showConfirmButton: true,
                           
                        })
                        $('#spinner').removeClass("show");
                $("#cont").trigger("reset");
            }
          
        }, 'JSON')
        return false;
            });
        
    </script>
    <script src="view/page/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
    <script src="view/page/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope -->
    <script src="view/page/vendors/isotope/isotope.pkgd.js"></script>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- LeadMark js -->
    <script src="view/page/js/leadmark.js"></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer>
</script>
</body>

</html>


<script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>
<script>
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
    #container-main {
        margin: 40px auto;
        width: 95%;
        min-width: 320px;
        max-width: 960px;
    }

    #container-main h1 {
        font-size: 40px;
        text-shadow: 4px 4px 5px #16a085;
    }

    .accordion-container {
        width: 100%;
        margin: 0 0 20px;
        clear: both;
    }

    .accordion-titulo {
        position: relative;
        display: block;
        padding: 20px;
        font-size: 24px;
        font-weight: 300;
        background: rgb(6 5 5 / 70%);
        color: #fff;
        text-decoration: none;
    }

    .accordion-titulo.open {
        background: rgb(6 5 5 / 70%);
        color: #fff;
    }

    .accordion-titulo:hover {
        background: var(--purple);
        color: rgb(6 5 5 / 70%);
    }

    .accordion-titulo span.toggle-icon:before {
        content: "+";
    }

    .accordion-titulo.open span.toggle-icon:before {
        content: "-";
    }

    .accordion-titulo span.toggle-icon {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 38px;
        font-weight: bold;
    }

    .accordion-content {
        display: none;
        padding: 20px;
        overflow: auto;
    }

    .accordion-content p {
        margin: 0;
        color:#fff ;
        font-size: medium;
    }

    .accordion-content img {
        display: block;
        float: left;
        margin: 0 15px 10px 0;
        width: 50%;
        height: auto;
    }


    @media (max-width: 767px) {
        .accordion-content {
            padding: 10px 0;
        }
    }
</style>