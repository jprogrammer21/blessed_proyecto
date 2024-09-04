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
            <a class="nav-link" href="?controller=home&action=login">
              Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br><br>
  <main>
    <section> <br>
      <div class="textos-header">
        <h1>¡ Llego el momento !</h1>
        <h2>Es hora de cambiar la forma de ver tus finanzas</h2>
      </div>
      <br>
    </section>
    <div class="container">
      <div class='row'>
        <?php

        foreach ($this->plans as $value) {
          $id = $value["tp_plan_id"];
          $title = $value["tp_plan_name"];
          $price = $value["tp_plan_price"];
          $duration = $value["tp_plan_duration"];
          $description = $value["tp_plan_description"];
          $uid = $value["tp_plan_uid"];
          $price2 = number_format($price);
          echo "<div class='col'>";
          echo "<div class='plan-card'>";
          echo "<input type='text' value='$id' style='display:none;'>";
          echo "<h2 class='text-white'>$title<span></span></h2>";
          echo "<div class='etiquet-price'>";
          echo "<p>$price2</p>";
          echo "<div></div>";
          echo "</div>";
          echo "<div class='benefits-list'>";
          echo "<ul>";
          echo "<li><span>";
          echo ($duration == 1) ? "$duration Mes" : "$duration Meses";
          echo "</span></li>";
          echo "<li><span> <div class='dropdown'>
          <button class='btn btn-secondary dropdown-toggle' style='background: none;
          border: none;' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            Descripcion
          </button>
          <div class='dropdown-menu'  style='background-image: url(view/page/img/Fondo-principal2.png);' aria-labelledby='dropdownMenuButton'>
            <div class='dropdown-item' style='color:#fff'>$description</div>
            
          </div>
        </div>";
          echo "</span>";
          echo "</li>";
          echo "</ul>";

          echo "</div>";
          echo "<div class='button-get-plan'>";
          echo "<a href='?controller=user&action=register2&parameter=$uid' class='uno'>
                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512' class='svg-rocket'>";
          echo " <path d='M156.6 384.9L125.7 353.1C117.2 345.5 114.2 333.1 117.1 321.8C120.1 312.9 124.1 301.3 129.8 288H24C15.38 288 7.414 283.4 3.146 275.9C-1.123 268.4-1.042 259.2 3.357 251.8L55.83 163.3C68.79 141.4 92.33 127.1 117.8 127.1H200C202.4 124 204.8 120.3 207.2 116.7C289.1-4.07 411.1-8.142 483.9 5.275C495.6 7.414 504.6 16.43 506.7 28.06C520.1 100.9 516.1 222.9 395.3 304.8C391.8 307.2 387.1 309.6 384 311.1V394.2C384 419.7 370.6 443.2 348.7 456.2L260.2 508.6C252.8 513 243.6 513.1 236.1 508.9C228.6 504.6 224 496.6 224 488V380.8C209.9 385.6 197.6 389.7 188.3 392.7C177.1 396.3 164.9 393.2 156.6 384.9V384.9zM384 167.1C406.1 167.1 424 150.1 424 127.1C424 105.9 406.1 87.1 384 87.1C361.9 87.1 344 105.9 344 127.1C344 150.1 361.9 167.1 384 167.1z'>
                </path>";
          echo "</svg>";
          echo "<span>¡Registrate!</span>";
          echo "</a>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }
        ?>
      </div>
    </div>

    </div>
  </main>

  
  <!-- End of Page Footer -->
  </div>
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