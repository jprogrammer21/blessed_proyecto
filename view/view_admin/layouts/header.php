<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="public/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="public/assets/img/favicon.png">
  <title>
    Blessed
  </title>
  <!--     Fonts and icons     -->

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->
  <link href="public/assets/css/nucleo-icons.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="public/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <link rel="stylesheet" href="public/assets/css/styles.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <script src="https://player.vimeo.com/api/player.js"></script>
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>

  <style>

  </style>
</head>

<body class="">


 
  <div class="wrapper">
           <?php if (
             $_SESSION["role"] == "administrador" || $_SESSION["role"] == "
              administrator"
           ) { ?>
      <div class="sidebar">
        <!--
          Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
      -->
        <div class="sidebar-wrapper">
          <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-mini">
              Ceo
            </a>
            <a href="javascript:void(0)" class="simple-text logo-normal">
              jhon
            </a>
          </div>

          <ul class="nav">
            <li class="<?php echo $this->link == "home" ? "active" : ""; ?> ">
              <a href="?controller=home&action=profile">
                <i class="bi bi-house"></i>
                <p>Inicio</p>
              </a>
            </li>
            <li class=" <?php echo $this->link == "users" ? "active" : ""; ?>">
              <a href="?controller=user&action=index">
                <i class="bi bi-people-fill"></i>
                <p>Usuario</p>
              </a>
            </li>
            <li class=" <?php echo $this->link == "plans" ? "active" : ""; ?>">
              <a href="?controller=type&action=index">
                <i class="bi bi-list-task"></i>
                <p>Planes</p>
              </a>
            </li>
            <li class="<?php echo $this->link == "cours" ? "active" : ""; ?> ">
              <a href="?controller=courses&action=index">
                <i class="bi bi-book"></i>
                <p>Cursos</p>
              </a>
            </li>

          </ul>
       
      </div>
      
    </div>
    <?php } ?>
    <div class="main-panel" style="background-image: url(view/page/img/Fondo-principal2.png);">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute"
        style="background-image: url(view/page/img/Fondo-principal2.png);">
        <div class="container-fluid">
       
          <div class="navbar-wrapper">
          <?php if (
             $_SESSION["role"] == "administrador" || $_SESSION["role"] == "
              administrator"
           ) { ?>
            <div class="navbar-toggle d-inline">
              
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)"></a>
            <?php } ?>
          </div>
          
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>

          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
            <?php if (
             $_SESSION["role"] == "estudiante" 
           ) { ?>
            <li class="nav-item">
            <a class="nav-link" href="?controller=home&action=profile">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controller=courses&action=index_us">Cursos</a>
          </li>
          <?php } ?>
            <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" style="color:white;" data-toggle="dropdown">
              <div class="photo">
              <i class="bi bi-person-circle" style="font-size:20px;"></i>
              </div>
              <b class="caret d-none d-lg-block d-xl-block"></b>
            </a>
            <ul class="dropdown-menu dropdown-navbar"  style="background-image: url(view/page/img/Fondo-principal2.png);">
              <li class="nav-link"><a href="?controller=user&action=exit"
                  class="nav-item dropdown-item text-white">Salir</a></li>
            </ul>
          </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      