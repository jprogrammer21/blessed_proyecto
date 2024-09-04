<?php

use Dotenv\Parser\Value;

extract($this->dato);

?>

<div class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                    </p>
                    <div class="author" style=" height: 300px;">
                        <div class="block block-one"></div>
                        <img class="" src="<?php echo $img; ?>" style=" width: 330px; height: 220px; " alt="...">
                        <h5 class="title"></h5>

                        <p class="description">
                            <?php echo $cours_name; ?>
                        </p>
                    </div>
                    <p>Descripcion</p>
                    <div class="card-description">
                        <?php



                        echo $cours_descrp;


                        ?>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">Editar</button>
                    <a href="?controller=courses&action=delete&uid=<?php echo $cours_uid; ?>" class="eliminar_c"><button class="btn btn-info btn-sm">Eliminar</button></a>
                </div>
            </div>
        </div>
        <div class="col-md-8">


            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="add">
                            <button class="bcn" data-toggle="modal" data-target="#example">
                                Agregar capitulo</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="add">
                            <button class="bcn" data-toggle="modal" data-target="#test">
                                Agregar un examen</button>
                        </div>
                    </div>
                </div>
            </div>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">

                <div class="row">
                    <div class="col-md-12" id="component2">

                    </div>
                </div>
            </div>
            <div class="modal modal-black fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" _mstvisible="0">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar capitulo</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form autocomplete="off" action="?controller=chapters&action=register" method="POST" id="formuploadajax22" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" id="name_chapter" name="name_chapter" placeholder="Nombre del capitulo" required>
                                </div>
                                <div class="form-group">
                                    <label>Descripcion del capitulo</label>
                                    <textarea name="chapter_desc" class="chapter_desc" id="chapter_desc" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Codigo del capitulo</label>
                                    <input type="text" class="form-control" id="code_chapter" name="code_chapter" placeholder="code chapter" required>
                                </div>
                                <label>Cargar imagen</label>
                                <div class="content">

                                    <input type="file" accept="image/png,image/jpeg" name="file-2" id="file-2" class="inputfile inputfile-2" enctype="multipart/form-data" data-multiple-caption="{count} archivos seleccionados" multiple />
                                    <label for="file-2">
                                        <i class="tim-icons icon-cloud-upload-94"></i>
                                        <span class="iborrainputfile" id="iborrainputfile">Seleccionar imagen</span>
                                    </label>


                                </div>
                                <input type="number" value="<?php echo $cours_id ?>" name="course_id" style="display:none;">
                                <div class='modal-footer'>
                                    <button type='submit' class='btn btn-secondary'>Registrar capitulo</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>

            <div class="modal modal-black fade" id="test" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" _mstvisible="0">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Registrar examen</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form autocomplete="off" action="?controller=test&action=register" id="frmregister" method="POST">
                                <div class="form-group">
                                    <label>Nombre de examen</label>
                                    <input type="text" class="form-control" id="name_test" name="name_test" placeholder="Nombre de examen" required>
                                </div>
                                <input type="number" value="<?php echo $cours_id ?>" name="course_id" style="display:none;">
                                <input type="number" id="num" name="number" style="display:none;">
                                <div class='modal-footer'>
                                    <button type='submit' class='btn btn-secondary'>Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal modal-black fade" id="frm_update_test" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" _mstvisible="0">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar examen</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form autocomplete="off" action="?controller=test&action=edit" id="test_edit" method="POST">
                                <div class="form-group">
                                    <label>name test</label>
                                    <input type="text" class="form-control" id="name_test" name="name_test" placeholder="name test" required>
                                </div>

                                <input type="number" id="num" name="number">
                                <div class='modal-footer'>
                                    <button type='submit' class='btn btn-secondary'>update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <div class="modal modal-black fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" _mstvisible="0">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">


                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form autocomplete="off" action="?controller=courses&action=edit" method="post" id="frmupdate2" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo $cours_name; ?>" required>
                                </div>
                                <div class="form-group" id="mer">
                                    <label>Descripcion</label>
                                    <textarea name="descripcion" id="descrip-c" class="descrip-c" cols="30" rows="10" class="form-control"><?php echo $cours_descrp ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">plans select</label>
                                    <select class="form-control" id="tp_plan" name="tp_plan">

                                        <?php
                                        foreach ($this->datos as $v) {
                                            $id = $v["tp_plan_id"];
                                            $name = $v["tp_plan_name"];
                                            if ($tp_plan_id == $id) {
                                                echo " <option value='$id'  style='color:black' selected>$name</option>";
                                            } else {
                                                echo " <option value='$id'  style='color:black'>$name</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="content">
                                    <label>Cargar imagen</label> <br>

                                    <label for='file-upload' class='subir'>
                                        <i class='fas fa-cloud-upload-alt'></i>
                                        <div style='float: left;' id='info'>Subir archivo</div>
                                    </label>
                                    <input id='file-upload' onchange='cambiar()' type='file' name='file-2' accept="image/png,image/jpeg" style='display: none;' />

                                    <input type="text" name="rta_img" id="rta_img" value="<?php echo $img; ?>" style="display:none ;">
                                    <input type="text" name="uid" id="uid" value="<?php echo $cours_uid; ?>" style="display:none ;">


                                </div>
                                <button type="submit" class="btn btn-info">Actualizar</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <!-- Modal -->





            <div class='modal modal-black fade' id='Modal2' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true' _mstvisible='0'>
                <div class='modal-dialog' role='document'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel'>Actualizar</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
                                <i class='tim-icons icon-simple-remove'></i></button>
                        </div>
                        <div class='modal-body'>
                            <form autocomplete='off' id="updatechart" action='?controller=chapters&action=edit' method='post' id="updatechart" enctype="multipart/form-data">
                                <label class='form-label'>name chapter</label>
                                <input type='text' name='name_chapter' id='name_chart' class='form-control'>
                                <label class='form-label'>
                                    description chapter</label>

                                    <textarea name="descri" id="descrip-update" class="descrip-update" cols="30" rows="10" class="form-control"><?php echo $cours_descrp ?></textarea>
                                <label class='form-label'>code of chapter</label>
                                <input type='text' name='code_chapter' id='code_chapter' class='form-control'>
                                <input type='text' name='course_id' id='course_id' class='form-control' style='display:none;'>
                                <input type='text' name='chapter_uid' id='chapter_uid' class='form-control' style='display:none;'>
                                <div class="content">

                                    <input type="file" accept="image/png,image/jpeg" name="file-2" id="file-2" class="inputfile inputfile-2" enctype="multipart/form-data" data-multiple-caption="{count} archivos seleccionados" multiple />
                                    <label for="file-2">
                                        <i class="tim-icons icon-cloud-upload-94"></i>
                                        <span class="iborrainputfile" id="iborrainputfile">select File</span>
                                    </label>
                                    <input type="text" name="rta_img" id="rta_img" style="display:none ;">



                                </div>
                                <div class='modal-footer'>
                                    <button type='submit' class='btn btn-secondary'>update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <style>
        ::-webkit-scrollbar {
            display: none;
        }

        .subir {
            padding: 5px 10px;
            background: #2d64f5;
            color: #fff;
            border: 0px solid #fff;
        }

        .subir:hover {
            color: #fff;
            background: #2d64f59e;
        }
    </style>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="means/ckeditor/ckeditor.js"></script>
    <script src="means/ckeditor/adapters/jquery.js"></script>
    <script>
        $('textarea.descrip-c').ckeditor({


        });
    
    </script>
    <script>
        $('textarea.chapter_desc').ckeditor({


        });
        

        function cambiar() {
            var pdrs = document.getElementById('file-upload').files[0].name;
            document.getElementById('info').innerHTML = pdrs;
        }

        function cambia() {
            var pdrs = document.getElementById('file-uploa').files[0].name;
            document.getElementById('info-2').innerHTML = pdrs;
        }

        var z = "<?php echo $cours_id; ?>";
        var uid = "<?php echo $cours_uid; ?>";



        'use strict';

        ;
        (function(document, window, index) {
            var inputs = document.querySelectorAll('.inputfile');
            Array.prototype.forEach.call(inputs, function(input) {
                var label = input.nextElementSibling,
                    labelVal = label.innerHTML;

                input.addEventListener('change', function(e) {
                    var fileName = '';
                    if (this.files && this.files.length > 1)
                        fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
                    else
                        fileName = e.target.value.split('\\').pop();

                    if (fileName)
                        label.querySelector('span').innerHTML = fileName;
                    else
                        label.innerHTML = labelVal;
                });
            });
        }(document, window, 0));

        function c() {
            var urll = "?controller=chapters&action=list_chapters";

            $.get(urll, "a=" + z + "&" + "uid=" + uid, function(e) {
                $("#component2").html(e.mensaje);
                document.getElementById("num").value = e.number
            }, 'json', );
            return false;
        }

        $(document).ready(function() {
            window.setTimeout(c(), 1000);
        });

        $("#frmregister1").submit(function() {
            var url = $(this).attr("action");
            var dt = $(this).serialize();
            $.post(url, dt, function(e) {
                Swal.fire(
                        e.mensaje,
                        '',
                        e.icono
                    ),
                    $("#frmregister1").trigger("reset");
                window.setTimeout(c(), 1000);

            }, 'JSON')
            return false;
        });

        $("#frmregister").submit(function() {
            var url = $(this).attr("action");
            var dt = $(this).serialize();
            $.post(url, dt, function(e) {
                Swal.fire(
                        e.mensaje,
                        '',
                        e.icono
                    ),
                    $("#frmregister").trigger("reset");

                window.setTimeout(c(), 1000);

            }, 'JSON')
            return false;
        });


        $(document).on('click', '.update_chart', function(e) {
            var url = $(this).attr("href");
            var elemento = $(this);
            $.get(url, "", function(d) {
                $("#updatechart").html(d.mensaje);
            }, 'json');
            return false
        });





        $(document).on('click', '.delete_chart', function(e) {
            var url = $(this).attr("href");
            var elemento = $(this);
            Swal.fire({
                title: 'confirmar eliminacion',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'red',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'eliminar',
                cancelButtonText: 'cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.get(url, '', function(e) {
                        elemento.closest("tr").remove();
                        Swal.fire(
                            e.mensaje,
                            '',
                            e.icono
                        )
                        window.setTimeout(c(), 1000);


                    }, 'json');
                }
            })
            return false;

        });

        $(document).on('click', '.test_edit', function(e) {
            var url = $(this).attr("href");
            var elemento = $(this);

            $.get(url, "", function(d) {
                $("#test_edit").html(d.mensaje);
            }, 'json');
            return false
        });

        $("#test_edit").submit(function() {
            var url = $(this).attr("action");
            var dt = $(this).serialize();
            $.post(url, dt, function(e) {
                Swal.fire(
                        e.mensaje,
                        '',
                        e.icono
                    ),
                    window.setTimeout(c(), 1000);
            }, 'JSON')
            return false;
        });

        $("#formuploadajax22").on("submit", function(e) {


            var des = CKEDITOR.instances['chapter_desc'].getData();
            if (des == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Por favor digite una Descripcion',
                    showConfirmButton: true,
                    timer: 1500
                })
            } else {
                if ($("#file-2").val() == "") {
                    Swal.fire('no se ha cargado la imagen')
                } else {
                    var u = $(this).attr("action");
                    e.preventDefault();
                    var f = $(this);
                    var formData = new FormData(document.getElementById("formuploadajax22"));
                    formData.append("des", des);
                    //formData.append(f.attr("name"), $(this)[0].files[0]);
                    $.ajax({
                        url: u,
                        type: "post",
                        dataType: "json",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false
                    }).done(function(res) {
                        if (res.type == "success") {
                            Swal.fire(
                                res.message,
                                "",
                                res.type
                            )
                            $("#formuploadajax22").trigger("reset");
                            CKEDITOR.instances['chapter_desc'].setData(" ");
                            c();
                            document.getElementById("iborrainputfile").innerHTML = "select File";
                        } else {
                            Swal.fire(
                                res.message,
                                "",
                                res.type
                            )
                        }
                    }, JSON);
                }

            }

            return false


        });



        $("#updatechart").on("submit", function(e) {

            var des = CKEDITOR.instances['descrip-update'].getData();

            if (des == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Por favor digite una Descripcion',
                    showConfirmButton: true,
                    timer: 1500
                })
            } else {
                var u = $(this).attr("action");
                e.preventDefault();
                var f = $(this);
                var formData = new FormData(document.getElementById("updatechart"));
                formData.append("d", des);
                //formData.append(f.attr("name"), $(this)[0].files[0]);
                $.ajax({
                    url: u,
                    type: "post",
                    dataType: "json",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false
                }).done(function(res) {

                    if (res.type == "success") {
                        Swal.fire(
                            res.message,
                            "",
                            res.type
                        )

                        c();
                        document.getElementById("iborrainputfile").innerHTML = "select File";
                    } else {
                        Swal.fire(
                            res.message,
                            "",
                            res.type
                        )
                    }


                }, JSON);

            }


            return false


        });
    </script>

</div>