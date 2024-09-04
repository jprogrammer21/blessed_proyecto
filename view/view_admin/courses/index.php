<div class="content" >
    <div class="row">
        <div class="col-md-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n3 mx-3 z-index-2">
                    <div class="bg-primary shadow-primary border-radius-lg pt-2 pb-3" style="border-radius: 10px;">
                        <center><b style=" font-size: 23px;">Cursos</b></center>
                    </div>
                </div>
                <div class="card-body">
                    <input type="button" value="Crear cursos" class="btn btn-primary animation-on-hover" data-toggle="modal" data-target="#exampleModal">
                    <br>
                        <div id="component">

                        </div>
                   


                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal modal-black fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" _mstvisible="0">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar curso</h5>

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="?controller=courses&action=insert" method="post" id="formuploadajax" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <textarea name="descripcion" id="descipcion" class="descipcion" class="form-control" cols="30" rows="10" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Elige el plan al que pertenece el curso</label>
                        <select class="form-control" id="tp_plan" name="tp_plan">

                            <?php
                            foreach ($this->datos as $v) {
                                $id = $v["tp_plan_id"];
                                $name = $v["tp_plan_name"];
                                echo " <option value='$id' style='color:black'>$name</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <label>Cargar una imagen</label>
                    <div class="content">

                        <input type="file" accept="image/png,image/jpeg" name="file-2" id="file-2" class="inputfile inputfile-2" enctype="multipart/form-data" data-multiple-caption="{count} archivos seleccionados" multiple />
                        <label for="file-2">
                            <i class="tim-icons icon-cloud-upload-94"></i>
                            <span class="iborrainputfile" id="iborrainputfile">Subir imagen</span>
                        </label>


                    </div>
                    <button type="submit" id="ok" class="btn btn-info">Enviar</button>
                </form>
            </div>

        </div>
    </div>
</div>

<script src="means/ckeditor/ckeditor.js"></script>
<script src="means/ckeditor/adapters/jquery.js"></script>
<script>
    $( 'textarea.descipcion' ).ckeditor({
       
        
    });
    
</script>

<script>
  
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
    

    


    $(document).ready(function () {
      var url = "?controller=courses&action=list";
      $.post(url, '', function (e) {
        $("#component").html(e.mensaje)
      }, 'json',);
      return false;
    });
</script>
</div>