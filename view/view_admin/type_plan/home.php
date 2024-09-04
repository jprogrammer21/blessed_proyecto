<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n3 mx-3 z-index-2">
                    <div class="bg-primary shadow-primary border-radius-lg pt-2 pb-3" style="border-radius: 10px;">
                        <center><b style=" font-size: 23px;">Planes</b></center>
                    </div>
                </div>
                <div class="card-body">
                    <a href="" class="btn btn-primary animation-on-hover" role="button" data-toggle="modal" data-target="#exampleModal">
                        Crear Planes</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="plans">

                </div>

            </div>
        </div>
    </div>
</div>
</div>

<div class="modal modal-black fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" _mstvisible="0">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Creacion de Planes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" id="frmregister" action="?controller=type&action=register" method="POST">
                    <div class="form-group">
                        <label>Nombre del Plan</label>
                        <input type="text" class="form-control" name="name_plan" placeholder="Escriba el nombre del plan" required>
                    </div>
                    <div class="form-group">
                        <label>Duracion del plan</label><br>
                        <select name="duration"   id="duration"class="form-select form-control" aria-label="Default select example">
                            <option  style="background:#222a41;" selected>Escoja el tiempo</option>
                            <option style="background:#222a41;"value="1">1 mes </option>
                            <option style="background:#222a41;"value="2">2 meses</option>
                            <option style="background:#222a41;"value="3">3 meses</option>
                            <option style="background:#222a41;"value="4">4 meses</option>
                            <option style="background:#222a41;"value="5">5 meses</option>
                            <option style="background:#222a41;"value="6">6 meses</option>
                            <option style="background:#222a41;"value="7">7 meses</option>
                            <option style="background:#222a41;"value="8">8 meses</option>
                            <option style="background:#222a41;"value="9">9 meses</option>
                            <option style="background:#222a41;"value="10">10 meses</option>
                            <option style="background:#222a41;"value="11">11 meses</option>
                            <option style="background:#222a41;"value="12">12 meses</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Precio del plan</label>
                        <input type="number" class="form-control" name="price" placeholder="Digite el precio del plan" required title="debes digitar un precio valido">
                    </div>
                    <div class="form-group" id="mer">
                        <label>Descripcion</label>
                       <textarea name="descripcion" id="descipcion" class="descipcion" cols="30" rows="10" class="form-control" ></textarea>
                    </div>
                    
                    <input type="submit" id="submit" class="btn btn-info animation-on-hover" name="create" value="Crear plan">
                </form>
            </div>

            
        
        </div>
    </div>
</div>
<script src="means/ckeditor/ckeditor.js"></script>
<script src="means/ckeditor/adapters/jquery.js"></script>
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
    $( 'textarea.descipcion' ).ckeditor({
       
        
    });

</script>
<script>
    
  $("#frmregister").submit(function() {
    var c= CKEDITOR.instances['descipcion'].getData();
    if (c == '') {
        Swal.fire({
                  
                        icon: 'error',
                        title: 'añada una descripcion',
                        showConfirmButton: false,
                        timer: 1500
                    })
       } else {
        var url = $(this).attr("action");
            var dt = $(this).serialize();
            $.post(url, dt+"&c="+c, function(e) {
                if (e.icono == "n") {
                    Swal.fire({
                        icon: 'error',
                        title: 'El precio debe ser numerico',
                        showConfirmButton: true,
                        timer: 1500
                    })
                }
               else if (e.icono == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'plan Creado con Exito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    CKEDITOR.instances['descipcion'].setData(" ");
                } else if (e.icono == "error") {
                    Swal.fire({
                        icon: 'error',
                        title: 'El plan no se creo',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                $("#frmregister").trigger("reset");
                window.setTimeout(redirt(), 1000);
            }, 'JSON')
       }
        return false;
  
});


   
    
    function redirt() {
                var url = "?controller=type&action=list_plan";
                $.post(url, '', function(e) {
                    $("#plans").html(e.mensaje)
                }, 'json', );
                return false;
            }

    $(document).ready(function() {
        var url = "?controller=type&action=list_plan";
        $.post(url, '', function(e) {
            $("#plans").html(e.mensaje)
        }, 'json', );
        return false;
    });
</script>