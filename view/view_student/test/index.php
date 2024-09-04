<?php

extract($this->dato);
extract($this->h);


?>

<div class="container" style="margin-top: 80px;">


    <!-- Modal -->
    <div class="modal fade modal-black  " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="height:10% ;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Examen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="?controller=test&action=reg_exa_usu" method="post" id="frmexam">

                        <?php
                        $tbl = " ";
                        $num = 1;
                        $rta = $this->rta;
                        foreach ($rta as $value) {
                            $tbl .= "<div class='col-lg-12'>";
                            $tbl .= "<div class='card'>";
                            $tbl .= "<div class='card-header'>";
                            $tbl .= "<h5 class='card-text'>question #$num</h5>";
                            $tbl .= "<h3 class='card-title'>" . $value["questions"] . "</h3>";
                            $tbl .= "</div>";
                            $tbl .= "<div class='card-body'>";
                            $nu = 0;
                            $resul = json_decode($value["quest_response"], true);
                            foreach ($resul as $val) {
                                $nu++;
                                $v = $val["type"];
                                $tbl .= "<div class='form-check form-check-radio'>";
                                $tbl .= "<label class='form-check-label'>";
                                $tbl .= "<input class='form-check-input ' type='radio' name='res$num' id='res$num-$nu' value='" . $val["type"] . "'>   ";
                                $tbl .= " " . $val["ress"] . " ";
                                $tbl .= "<span class='form-check-sign'></span>";
                                $tbl .= " </label>";
                                $tbl .= " </div>";
                            }
                            $tbl .= "<input type='number' style='display:none;' id='res$num' value='$nu' ></div>";
                            $tbl .= "</div>";
                            $tbl .= "</div>";

                            $num++;
                        }

                        echo $tbl;
                        ?>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-info">Enviar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row m-4">
        <div class="col-lg-12">
            <div class="card ">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="public/assets/img/pbg.jpg" style="height: 100%;" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title" style="font-size: 40px;"> <?php echo $test_name;  ?></h5>
                            <p class="card-text" style="font-size: 20px;">Es hora de demostra todo lo aprendido en clases.</p>
                            <p class="card-text">Tienes tantos intestos como quieras para realizar el examen. <br>
                                El examen consta de <?php echo $num - 1; ?> preguntas<br>

                            <p class="card-text" id="inte"> </p>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-info animation-on-hover" data-toggle="modal" data-target="#exampleModal" onclick="time()" type="button">Enpezar el examen</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12" id="alert_ex">

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <?php
            if ($this->r == 0) {
                echo "<a href='?controller=courses&action=chapters_list&uid=$udi&ddsbq=$di' class='btn btn-primary btn-simple' style='float: right;'> Terminaste el curso </a>";
            } else {
                echo "<a href=' $this->r' class='btn btn-primary btn-simple' style='float: right;'> Pasar Al Siguiente <i class='bi bi-arrow-right'></i></a>";
            }
            ?>

        </div>
    </div>


</div>
<br><br>
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
</style>
<script src="public/assets/js/core/jquery.min.js"></script>
<script>
    function red() {
        var urll = "?controller=test&action=consult_r";

        $.post(urll, "id=" + <?php echo $test_id; ?>, function(e) {
            $("#alert_ex").html(e.mensaje);
            $("#inte").html(e.inte);
        }, 'json', );
        return false;

    }

    $(document).ready(function() {
        var urll = "?controller=test&action=consult_r";

        $.post(urll, "id=" + <?php echo $test_id; ?>, function(e) {
            $("#alert_ex").html(e.mensaje);
            $("#inte").html(e.inte);
        }, 'json', );
        return false;


    });



    num = <?php echo $num; ?>;

    $("#frmexam").submit(function() {

        for (let index = 1; index < num; index++) {

            enl = "res" + index
            console.log("esta en " + enl);
            var numero = document.getElementById(enl).value;
            co = parseInt(numero) + 1;
            n = 0
            for (let i = 1; i < co; i++) {
                var en = "#res" + index + "-" + i;
                if ($(en).prop('checked')) {
                    console.log('checkbox' + i + ' esta Seleccionado');
                    n++;
                } else {
                    console.log('checkbox' + i + 'no esta Seleccionado');
                }

            }
            if (n <= 0) {
                console.log(index);
                Swal.fire('No as contestado la pregunta' + index)
                index = 100;
            }
            console.log("// // " + index);
            if (index == <?php echo $num - 1; ?>) {
                var url = $(this).attr("action");
                var dt = $(this).serialize();
                $.post(url, dt + "&num=<?php echo $num - 1; ?>" + "&" + "test_id=<?php echo $test_id; ?>", function(e) {
                    red();
                    Swal.fire(
                        e.mensaje,
                        '',
                        e.icono
                    )
                    $("#frmregister1").trigger("reset");

                }, 'JSON')

            }

        }



        return false;


    });
</script>