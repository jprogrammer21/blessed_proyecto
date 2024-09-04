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

<head>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500&family=Gelasio&family=Martel:wght@200&family=Quattrocento:wght@700&family=Source+Serif+Pro:wght@300&display=swap');
    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
    <!-- page Navigation -->

    <nav class="navbar custom-navbar navbar-expand-md navbar-light fixed-top" style="background:black; height: auto" data-spy="affix" data-offset-top="10">
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
                        <a class="nav-link   join" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link join " href="?controller=user&action=exit">
                            cerrar sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br>
    <section> <br>
      <div class="textos-header">
        <h1> Blessed academy </h1>
        <h2>¡ Te informa que Debes Renovar tu plan !</h2>
        <div class="row mt-4" >
        <!-- <a href="" style="margin:auto" class="btn rounded cl_b btn-lg">Renovar el Plan</a> -->
        <a href="?controller=type&action=list_pln" style="margin:auto" class="btn rounded cl_b btn-lg">Cambiar Plan</a>
        </div>
      </div>
      <br>
    </section>

    <script src="view/page/checkout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- core  -->
    <script src="view/page/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="view/page/vendors/bootstrap/bootstrap.bundle.js"></script>

    <!-- bootstrap 3 affix -->
    <script src="view/page/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Isotope -->
    <script src="view/page/vendors/isotope/isotope.pkgd.js"></script>

    <!-- LeadMark js -->
    <script src="view/page/js/leadmark.js"></script>



</body>

</html>

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
    @media (max-width: 767px) {
        .accordion-content {
            padding: 10px 0;
        }
    }
</style>