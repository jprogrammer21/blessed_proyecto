<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<?php
extract($this->dato);

?>
<div class="container" style="margin-top: 80px;">
    <br>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                    </p>
                    <div class="author">
                        <div class="block block-one"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three"></div>
                        <div class="block block-four"></div>
                        <a href="javascript:void(0)">
                            <img class="avatar" src="public/assets/img/avatar.PNG" alt="...">
                            <h5 class="title">
                                <?php echo $user_name . " " . $user_surname; ?>
                            </h5>
                        </a>

                    </div>
                    <p></p>
                    <div class="card-description">
                        <?php echo $user_email; ?><br>
                        <?php echo $user_country; ?><br>
                        <?php echo $user_phone; ?><br>

                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary btn-simple btn-sm" data-toggle="modal" data-target="#exampleModal">Editar</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">Mi plan</h2>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>Informacion del plan </p>
                        <footer class="blockquote-footer">Nombre: <cite title="Source Title">
                                <?php echo $tp_plan_name; ?>
                            </cite></footer>
                        <footer class="blockquote-footer">Duracion: <cite title="Source Title">
                                <?php echo $tp_plan_duration == 1 ? "$tp_plan_duration mes" : "$tp_plan_duration meses"; ?>
                            </cite></footer>
                        <footer class="blockquote-footer">Fecha de Inicio: <cite title="Source Title">
                                <?php echo $plan_start_date; ?>
                            </cite></footer>
                        <footer class="blockquote-footer">Fecha de Expiracion: <cite title="Source Title">
                                <?php echo $plan_exp_date; ?>
                            </cite></footer>
                </div>
                <div class="card-footer">
                    <?php
                    if ($this->url == 0) {
                        echo "<a href=''>
                      <div class='alert alert-primary' role='alert'>
                      no has visto ningun capitulo
                      </div>
                      </a>";
                    } else {
                        extract($this->url);
                        echo "<a href='$etiqueta'>
                    <div class='alert alert-primary' role='alert'>
                        Ir al ultimo capitulo que viste<i class='bi bi-arrow-right'></i>
                    </div>
                    </a>";
                    }

                    ?>

                    <br>
                </div>
            </div>
        </div>
    </div><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="card  card-plain">
                <div class="card-header">
                    <h4 class="card-title">Mis Cursos</h4>
                    <p>Todo lo que necesitas saber en un solo lugar</p>
                </div>
            </div>
        </div>
        <div class="col-lg-12" style="height: 400px;">
            <div class="body1">
                <div class="wrapper">
                    <div class="carousel owl-carousel">

                        <?php
                        foreach ($this->cours as $value) {
                            $dds = $value["cours_id"];
                            $uid = $value["cours_uid"];
                            $name = $value["cours_name"];
                            $img = $value["img"];
                            if (strlen($value["cours_descrp"]) > 70) {
                                $value["cours_descrp"] = substr($value["cours_descrp"], 0, 70) . ".....";
                            }
                            $desp = $value["cours_descrp"];
                            echo " <div class='card' style='width: 18rem;'>";
                            echo "  <img class='card-img-top' src='$img' alt='Card image cap'>";
                            echo " <div class='card-body'>";
                            echo "   <h5 class='card-title' style='height: 50px;'>$name</h5>";
                            echo "    <a href='?controller=courses&action=chapters_list&uid=$uid&ddsbq=$dds
                            ' class='btn btn-primary btn-simple '>Ir al curso</a> </div> </div> ";
                        }

                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-black" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar mi Informacion</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="?controller=user&action=update_info_u" id="frm_edit_u" method="POST">
                        <div class="row">
                            <div class="col">
                                <label>Nombre</label>
                                <input type="text" class="form-control" value="<?php echo $user_name ?>" name="nombre" placeholder="Nombre">
                            </div>
                            <div class="col">
                                <label>apellido</label>
                                <input type="text" class="form-control" value="<?php echo $user_surname ?>" name="apellido" placeholder="Apellido">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label>Correo</label>
                                <input type="Email" class="form-control" value="<?php echo $user_email; ?>" name="correo" placeholder="Correo">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>pais</label>
                                <input type="text" class="form-control" value="<?php echo $user_country; ?>" name="pais" placeholder="pais">
                            </div>
                           
                            <div class="col">
                                <label>N° telefono</label>
                                <input type="text" class="form-control" value="<?php echo $user_phone; ?>" name="numero_t" placeholder="Numero">
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $(".carousel").owlCarousel({
        margin: 20,
        loop: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
                nav: false
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 3,
                nav: false
            }
        }
    });

    $("#frm_edit_u").submit(function() {
        var url = $(this).attr("action");
        var dt = $(this).serialize();
        $.post(url, dt, function(e) {
            Swal.fire(
                    e.mensaje,
                    ''
                ),

                window.setTimeout(location.reload(), 3000);

        }, 'JSON')
        return false;
    });
</script>
<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

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
        font-family: 'Poppins', sans-serif;
    }

    .body1 {

        display: flex;
        align-items: center;
    }

    .wrapper {
        width: 100%;
        height: 100px;
    }

    .carousel {
        max-width: 1200px;
        margin: auto;
        padding: 0 30px;
    }

    .owl-dots {
        text-align: center;
        margin-top: 40px;
        display: none;
    }

    .owl-dot {
        height: 15px;
        width: 45px;
        margin: 0 5px;
        outline: none;
        border-radius: 14px;
        border: 2px solid #0072bc !important;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .owl-dot.active,
    .owl-dot:hover {
        background: #0072bc !important;
    }
</style>



<style>
    .card img {
        width: 100%;
        height: 150px;
    }

    .carousel .card {
        margin: 0 0.5em;
        box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
        border: none;
        border-radius: 0;
    }
</style>