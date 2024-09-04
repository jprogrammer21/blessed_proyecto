<?php
$video = $this->list_chapters;
$img = $this->cours_info["img"];
$title = $this->cours_info["cours_name"];
$description = $this->cours_info["cours_descrp"];
$count = $this->count_chapters;
$limit = 300;
$zise = strlen($description);

?>
<div class="container" style="margin-top: 80px;">
    <div class="row mt-3 m-3">
        <div class="col-lg-6">
            <img class="img-bj" style="width: 100%;" src="<?php echo $img; ?>" alt="">
        </div>
        <div class="col-lg-6">
            <p class="p-des">
            <h1 class="title-course text-center" style="font-size: 'Times New Roman', Times, serif; margin-top:10px;">
                <?php echo $title; ?>
            </h1>
            <?php

            echo $description;

            ?>
            </p>

        </div>
    </div>
    <br><br>
    <h3 class="heading">Contenido del curso
        <?php echo $title; ?>
    </h3>
</div>
<div class="containers">
    <div class="containe">

        <div class="main-info content">
            <div class="containerp">
                <h3>Cantidad de capitulos</h3>
                <ul>
                    <li class="info">
                        <div class="icon">
                            <i class="bi bi-person-video3"></i>
                        </div>
                    </li>
                    <li class="info">
                        <p>
                            <?php echo $count[0];

                            ?>
                        </p>
                    </li>
                </ul>
            </div>
        </div>
        <br>






        <div class="main-info content">
            <div class="containerp">
                <h3>Cantidad de Examenes</h3>
                <ul>
                    <li class="info">
                        <div class="icon">
                            <i class="bi bi-person-video3"></i>
                        </div>
                    </li>
                    <li class="info">
                        <p>
                            <?php echo $this->numero["numberr"];

                            ?>
                        </p>
                    </li>
                </ul>
            </div>
        </div>

        <a <?php echo $this->nota == 1 ? "href='?controller=user&action=certificate&name=" . $_SESSION["name"] . $_SESSION["surname"] . "&cours= $title '" : "onclick='alerta()'"; ?> class="btn btn-primary text-white  animation-on-hover">Generar Certificado</a>
    </div>
    <div class="video-list">
        <?php

        echo $this->d;

        ?>
    </div>
</div>
<br>
<script>
    function alerta() {
        Swal.fire(
            'No cunples con lo indicado para generar tu certificado',
            'Aun no haz aprobado todos los examenes',
            'error'
        )
    }
</script>
<style>
    .block {
        background: linear-gradient(to right, #e14eca 0%, rgba(225, 78, 202, 0) 100%);
    }

    .bg-white {
        background-color: rgb(39 41 61 / 25%) !important;
        color: white;
    }

    .navbar.bg-white .navbar-nav a.nav-link {
        color: white;
    }


    .card {
        background: rgb(39 41 61 / 25%);
        border: 0;
        position: relative;
        width: 100%;
        margin-bottom: 30px;
        box-shadow: 0 1px 20px 0px rgb(0 0 0 / 10%);
    }

    .navbar {
        padding: 10px 30px 10px 15px;
        width: 100%;
        z-index: 1050;
        background: #1a1e3482;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        text-transform: capitalize;
    }

    .content {
        border-bottom: 2px solid white;
    }

    .info {
        list-style: none;
        float: left;
        font-size: 25px;
    }

    li .icon {
        margin-right: 10px;
    }

    .img {
        width: 100%;
        height: 350px;
        font-weight: normal;
    }

    .title--course {
        margin-top: 15px;
    }

    .heading {
        font-size: 'Times New Roman', Times, serif;
        font-size: 40px;
        text-align: center;
        padding: 10px;
    }

    .containers {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 15px;
        align-items: flex-start;
        padding: 5px 5%;
    }

    .containe {
        display: grid;

        gap: 15px;
        align-items: flex-start;
        padding: 5px 5%;
    }

    .containers .main-info {
        background-color: rgb(39 41 61 / 25%);
        border-radius: 5px;
        padding: 10px;
    }

    .containers .main-info video {
        width: 100%;
        border-radius: 5px;
    }

    .containers .main-info title {
        color: #333;
        font-size: 23px;
        padding-top: 15px;
        padding-bottom: 15px;

    }

    .containers .containerp-list {
        background-color: #1e1e29;
        border-radius: 5px;
        height: 520px;
        overflow-y: scroll;
    }

    .containers .video-list .vid video {
        width: 100px;
        border-radius: 5px;
    }

    .containers .video-list::-webkit-scrollbar {
        width: 7px;
    }

    .containers .video-list::-webkit-scrollbar-track {
        background-color: #ccc;
        border-radius: 50px;
    }

    .containers .video-list::-webkit-scrollbar-thumb {
        background-color: #666;
        border-radius: 50px;
    }

    .containers .video-list .vid {
        display: flex;
        align-items: center;
        gap: 15px;
        background-color: rgb(39 41 61 / 25%);
        border-radius: 5px;
        margin: 10px;
        height: 77px;
        border: 1px solid #465a7c;
    }

    @media (max-width:991px) {

        .containers {
            grid-template-columns: 1.5fr 1fr;
            padding: 10px;
        }

        .col-d {
            display: none;
        }


    }

    @media (max-width:768px) {

        .containers {
            grid-template-columns: 1fr;
        }

        .col-d {
            display: none;

        }
    }
</style>