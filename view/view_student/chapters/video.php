<?php
$video = $this->chapters["chatp_video"];
$id   =  $this->chapters["chapt_id"];
$name = $this->chapters["chapt_name"];

extract($_GET)


?>

<br>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<div class="container-fluid" style="margin-top: 80px;">
    <div class="row">
        <div class="col-lg-8">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
                <div style="padding:53.49% 0 0 0;position:relative; "><iframe src="https://player.vimeo.com/video/<?php echo $video; ?>?h=a044ccdcd1&amp;badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;" title="Meet - mys-sxco-crf - Opera 2022-03-04 20-44-49.mp4"></iframe>
                </div>
                <script src="https://player.vimeo.com/api/player.js"></script>
                <br>
                <div class="card " id="scrollspyHeading1">
                    <div class="card-header">

                        <h3 class="card-title"><i class="tim-icons icon-tv-2"></i> <?php echo $name; ?></h3>
                        <div class="row">
                            <div class="col-md-8"><a class="btn btn-info btn-simple btn-sm" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample" style="margin-right:10px;">
                                    Lista de reproducion
                                </a></div>
                            <div class="col-md-4">
                                <?php
                                if ($this->r == 0) {
                                    echo "<a href='?controller=courses&action=chapters_list&uid=$udi&ddsbq=$di' class='btn btn-primary btn-simple btn-sm' style='float: right;'> Terminaste el curso </a>";
                                } else {
                                    echo "<a href=' $this->r' class='btn btn-primary btn-simple btn-sm'> Pasar Al Siguiente <i class='bi bi-arrow-right'></i></a>";
                                }
                                ?>
                            </div>



                        </div>



                    </div>
                    <div class="card-body">

                        <p class="Header 5" style="margin-left: 10px;"><?php echo $this->chapters["chapt_descrp"]; ?> </p>



                        <div class="chart-area">



                            <!-- Modal -->
                            <div class="modal modal-black fade" id="Modalr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Responder Comentario</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                                <i class="tim-icons icon-simple-remove"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        <form id="response" action="?controller=comment&action=rep_coments" method="post">
                                                <textarea class="editor2" name="rep_coments" id="editor2" cols="30" rows="10"></textarea>
                                                <div id="prue">
                                                </div>

                                                <input type="number" name="chapters_id" id="chapters_id" value="<?php echo $id ?>" style="display:none;">
                                                <button type="submit" class="btn btn-default btn-sm" style="float: right;">Responder</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-lg-4">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
                <div class="card card-chart bg-2df" id="mt" style="height: 80px;">
                    <div class="boder">

                        <textarea class="coment" name="coment" id="coment" placeholder="Escribe tu Comentario o Pregunta" onclick="mostrar()"></textarea>
                    </div>
                </div>

                <div class="card card-chart" id="mts" style="height: auto; display:none; ">
                <form id="registerc" action="?controller=comment&action=reg_coments" method="post">
                        <textarea class="editor" name="coments" id="editor" cols="30" rows="10" style="margin-bottom: 2px;"></textarea>
                        <input type="number" name="chapters_id" id="chapters_id" value="<?php echo $id ?>" style="display:none;">
                <input type="submit" class="btn btn-info btn-simple btn-sm" value="publicar">
                </form>

                </div>

                <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">





                    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">

                        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
                            <div id="componente3">

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div class="offcanvas offcanvas-start" style='background-image: url("view/page/img/Fondo-principal2.png"); ' tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">

        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <h3 class="offcanvas-title" id="offcanvasExampleLabel">Lista de reproducion</h3>
        <div class="video-list">
            <?php
            echo $this->d;
            ?>
        </div>
    </div>
</div>


<!-- Modal -->



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



    .btn-reaction {
        background-color: transparent;
        border-radius: 11px;
        border: solid 1px;
        color: #007bc2;
        font-size: 15px;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    .boder {
        height: 80px;
        border: 10px solid #24385b;
        border-radius: 8px;
    }

    .boder2 {
        height: auto;
        border: 10px solid #24385b;
        border-radius: 8px;
    }

    .clo {
        background-color: #24385b;
    }

    .bg-2df {
        cursor: pointer;
        background-color: #03091e;
    }



    .coment {
        cursor: pointer;
        width: 100%;
        height: 100%;
        border: 1px solid #637b9d;
        border-radius: 8px;
        background-color: #27293d;
    }

    .coment:active {
        border: none;
        outline: none;
    }
</style>
<script src="public/assets/js/core/jquery.min.js"></script>
<script src='means/ckeditor/ckeditor.js'></script>
<script src='means/ckeditor/adapters/jquery.js'></script>
<script>
    $('textarea.editor').ckeditor({


});
$('textarea.editor2').ckeditor({


});


    function mostrar() {

        var coments = document.getElementById('mts').style.display = "block";
        var coment = document.getElementById('mt').style.display = "none";
    }
</script>


<script>
    var id_coment = "<?php echo $id; ?>";
</script>


<script>
    function hide() {
        document.getElementById('coment').style.display = "block";
        document.getElementById('coments').style.display = "none";
    }





    function c() {


        var url = "?controller=comment&action=list_comment";
        $.get(url, "id=" + id_coment, function(e) {
            $("#componente3").html(e.mensaje);
        }, 'json', );
        return false;
    }

    $(document).on('click', '.cresponse', function(e) {
        var url = $(this).attr("href");
        var elemento = $(this);

        $.get(url, "", function(d) {
            $("#prue").html(d.mensaje);

        }, 'json');
        c();
        return false;
    });

    $("#registerc").on("submit", function(e) {
                        var des = CKEDITOR.instances['editor'].getData();
                        if (des == '') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Por favor digite un Comentario',
                                showConfirmButton: true,
                                timer: 1500
                                    })
                        } else {
                           
                        var u = $(this).attr("action");
                        e.preventDefault();
                        var f = $(this);
                        var formData = new FormData(document.getElementById("registerc"));
                        formData.append("coment", des);
                        //formData.append(f.attr("name"), $(this)[0].files[0]);
                        $.ajax({
                            url: u,
                            type: "post",
                            dataType: "html",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false
                        }).done(function(res) {
                                if (res == "success") {
                                    Swal.fire({
                                            position: 'bottom-end',
                                            icon: 'success',
                                            title: 'comentario publicado con exito',
                                            showConfirmButton: false,
                                            timer: 1500
                                            })
                                            CKEDITOR.instances['editor'].setData(" ");
                                }  else {
                                    Swal.fire({
                                            position: 'bottom-end',
                                            icon: 'error',
                                            title: 'comentario no publicada',
                                            showConfirmButton: false,
                                            timer: 1500
                                            })
                                }
                                window.setTimeout(c(), 1000);
                                }, JSON);
                        }
                            return false;
                        });


                        $("#response").on("submit", function(e) {
                        var des = CKEDITOR.instances['editor2'].getData();
                        if (des == '') {
                            Swal.fire({
                                icon: 'error',
                                title: 'Por favor digite un Comentario',
                                showConfirmButton: true,
                                timer: 1500
                                    })
                        } else {
                           
                        var u = $(this).attr("action");
                        e.preventDefault();
                        var f = $(this);
                        var formData = new FormData(document.getElementById("response"));
                        formData.append("rep_coment", des);
                        //formData.append(f.attr("name"), $(this)[0].files[0]);
                        $.ajax({
                            url: u,
                            type: "post",
                            dataType: "html",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false
                        }).done(function(res) {
                                if (res == "success") {
                                    Swal.fire({
                                            position: 'bottom-end',
                                            icon: 'success',
                                            title: 'comentario publicado con exito',
                                            showConfirmButton: false,
                                            timer: 1500
                                            })
                                            CKEDITOR.instances['editor'].setData(" ");
                                }  else {
                                    Swal.fire({
                                            position: 'bottom-end',
                                            icon: 'error',
                                            title: 'comentario no publicada',
                                            showConfirmButton: false,
                                            timer: 1500
                                            })
                                }
                                window.setTimeout(c(), 1000);
                                }, JSON);
                        }
                            return false;
                        });


    $(document).ready(function() {
        window.setTimeout(c(), 1000);

    });
</script>