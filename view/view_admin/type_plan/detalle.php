<?php

$ui = $this->datas["tp_plan_uid"];
$d = $this->datas["tp_plan_duration"];
$cont = 0;
?>
<div class="content">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n3 mx-3 z-index-1">
        </div>
        <div class="card-body"><br>
          <div class="row">
            <div class="col-lg-2 text-center img-fluid img-thumbnai"><img src="public/assets/img/logo1.jpg" style="height: 150px; " alt=""></div>
            <div class="col-lg-10">
              <center>
                <table class="table table-bordered">
                  <tr>
                    <td style="margin-right:25px;">Nombre</td>
                    <td><?php echo $this->datas["tp_plan_name"]; ?></td>
                  </tr>
                  <tr>
                    <td>Duracion</td>
                    <td><?php echo $this->datas["tp_plan_duration"]; ?></td>
                  </tr>
                  <tr>
                    <td>Precio</td>
                    <td><?php echo $this->datas["tp_plan_price"]; ?></td>
                  </tr>
                </table>
                <center>
            </div>
          </div>


        </div>
      </div>
      <div class="container" style="float: left; margin-bottom: 20px;">

      </div>
      <div class="container">
        <div class="card">
          <div id="ocul" class="card-body">
            <form autocomplete="off" id="frmupdate" action="?controller=type&action=update" method="POST">
              <input style="display:none;" type="text" class="form-control" name="tp_uid" value="<?php echo $this->datas["tp_plan_uid"]; ?>" required>
              <div class="form-group">
                <label>Nombre del Plan</label>
                <input type="text" class="form-control" name="name_plan" value="<?php echo $this->datas["tp_plan_name"]; ?>" required>
              </div>
              <div class="form-group">
                <label>Duracion del plan</label><br>
                <select name="duration" id="duration" class="form-select form-control" aria-label="Default select example">
                  <option style="background:#1f0d26;" value="1" <?php echo $d == 1 ?   'selected' :  ""; ?>>1 mes</option>
                  <option style="background:#1f0d26;" value="2" <?php echo $d == 2 ?   'selected' :  ""; ?>>2 meses</option>
                  <option style="background:#1f0d26;" value="3" <?php echo $d == 3 ?   'selected' :  ""; ?>>3 meses</option>
                  <option style="background:#1f0d26;" value="4" <?php echo $d == 4 ?   'selected' :  ""; ?>>4 meses</option>
                  <option style="background:#1f0d26;" value="5" <?php echo $d == 5 ?   'selected' :  ""; ?>>5 meses</option>
                  <option style="background:#1f0d26;" value="6" <?php echo $d == 6 ?   'selected' :  ""; ?>>6 meses</option>
                  <option style="background:#1f0d26;" value="7" <?php echo $d == 7 ?   'selected' :  ""; ?>>7 meses</option>
                  <option style="background:#1f0d26;" value="8" <?php echo $d == 8 ?   'selected' :  ""; ?>>8 meses</option>
                  <option style="background:#1f0d26;" value="9" <?php echo $d == 9 ?   'selected' :  ""; ?>>9 meses</option>
                  <option style="background:#1f0d26;" value="10" <?php echo $d == 10 ?   'selected' :  ""; ?>>10 meses</option>
                  <option style="background:#1f0d26;" value="11" <?php echo $d == 11 ?   'selected' :  ""; ?>>11 meses</option>
                  <option style="background:#1f0d26;" value="12" <?php echo $d == 12 ?   'selected' :  ""; ?>>12 meses</option>
                </select>
              </div>
              <div class="form-group">
                <label>Precio del plan </label>
                <input type="text" class="form-control" name="price" value="<?php echo $this->datas["tp_plan_price"]; ?>" required pattern="[0-9]+" title="debes digitar un precio valido">
              </div>
              <div class="form-group">
                <label>Descripcion</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"><?php echo $this->datas["tp_plan_description"]; ?></textarea>
              </div>
              <div class="row">
                <input type="submit" class="btn btn-primary animation-on-hover mr-3 ml-3"  name="update" value="Actualizar">

                <a href='?controller=type&action=delete&idue=<?php echo $ui; ?>' class='delete_plans'><button class='btn btn-default animation-on-hover'>Eliminar</button></a>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="card" style="height: 500px;"><br><br>
        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
          <div class="row">
            <?php
            foreach ($this->cours as $v) {
              $cont++;
              $img = $v["img"];
              $name = $v["cours_name"];
              echo "<div class='co-md-12' style='margin-left:15px;'>";
              echo "<div class='card'style='width:  300px; height:400px;' id='plan' style='margin-top:10px;'>";
              echo "<img  src='$img' class='card-img-top'alt='' height='230'>";
              echo "<center><h4 class='text-white' style=margin-top:5px;'>$name</h4></center>";
              echo "<div class='card-body'>";
              echo "</div>";
              echo "</div>";
              echo "</div>";
            }
            echo "<div class='card-header' style='position:absolute;top:0; color:white; '> <b> los cursos asignados a este plan son $cont </b></div>";

            ?>
          </div>
        </div>
      </div>
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
</style>

<script src="means/ckeditor/ckeditor.js"></script>
<script src="means/ckeditor/adapters/jquery.js"></script>
<script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
<script>
                        CKEDITOR.replace( 'descripcion',{
  
     
    } );
                </script>
<script>

  $(document).on('click', '.delete_plans', function(e) {
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
          window.setTimeout(redirt, 2000);

          function redirt() {
            window.location.replace("?controller=type&action=index");
          }
        }, 'json');
      }
    })
    return false;

  });
  $("#frmupdate").submit(function() {
    var content = CKEDITOR.instances['descripcion'].getData();
    if (content == '') {
      Swal.fire({
        icon: 'error',
        title: 'añada una descripcion',
        showConfirmButton: false,
        timer: 1500
      })
    } else {
      var url = $(this).attr("action");
      var dt = $(this).serialize();
      $.post(url, dt + "&c=" + content, function(e) {
        if (e.icono == "n") {
          Swal.fire({
            icon: 'error',
            title: 'El precio debe ser numerico',
            showConfirmButton: true,
            timer: 1500
          })
        } else if (e.icono == "success") {
          Swal.fire({
            icon: 'success',
            title: 'plan actualizado con Exito',
            showConfirmButton: false,
            timer: 1500
          })
          window.setTimeout(redirt(), 1000);
        } else if (e.icono == "error") {
          Swal.fire({
            icon: 'error',
            title: 'El plan no se pudo actualizar',
            showConfirmButton: false,
            timer: 1500
          })
        }
        $("#frmupdate").trigger("reset");

      }, 'JSON')
    }

    return false;

  });


  function redirt() {
    window.location.replace("?controller=type&action=index");
  }
</script>