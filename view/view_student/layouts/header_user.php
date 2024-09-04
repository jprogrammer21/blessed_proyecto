<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="public/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="public/assets/img/favicon.png">
  <title>
    Home
  </title>
  <!--     Fonts and icons     -->

  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <!-- Nucleo Icons -->


  <link href="public/assets/css/nucleo-icons.css" rel="stylesheet">
  <link href="public/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <link rel="stylesheet" href="public/assets/css/styles.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="public/assets/demo/demo.css" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="background-image: url(view/page/img/Fondo-principal2.png);" class="">

  <nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
      <div class="navbar-wrapper">


      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="?controller=home&action=profile">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?controller=courses&action=index_us">Cursos</a>
          </li>

          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <div class="photo">
                <img src="https://cdn.pixabay.com/photo/2017/02/25/22/04/user-icon-2098873_960_720.png"
                  alt="Profile Photo">
              </div>
              <b class="caret d-none d-lg-block d-xl-block"></b>
            </a>
            <ul class="dropdown-menu dropdown-navbar bg-default">
              <li class="nav-link"><a href="?controller=user&action=exit"
                  class="nav-item dropdown-item text-white">Salir</a></li>
            </ul>
          </li>
          <li class="separator d-lg-none"></li>
        </ul>
      </div>
    </div>
  </nav>