<?php extract($this->dato) ?>

<div class="content">
  <div class="row">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h5 class="title">Editar Perfil</h5>
        </div>
        <div class="card-body">
          <form action="?controller=user&action=update_info_u" id="frm_edit_u" method="POST" autocomplete="off">
            <div class="row">
              <div class="col">
                <label>Nombre</label>
                <input type="text" class="form-control" value="<?php echo $user_name ?>" name="nombre" placeholder="Nombre" required>
              </div>
              <div class="col">
                <label>apellido</label>
                <input type="text" class="form-control" value="<?php echo $user_surname ?>" name="apellido" placeholder="Apellido" required>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label>Correo</label>
                <input type="Email" class="form-control" value="<?php echo $user_email; ?>" name="correo" placeholder="Correo" required>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-8">
                <label>pais</label>
                <input type="text" class="form-control" value="<?php echo $user_country; ?>" name="pais" placeholder="pais" required>
              </div>
              
              <div class="col">
                <label>N° telefono</label>
                <input type="number" class="form-control" value="<?php echo $user_phone; ?>" name="numero_t" placeholder="Numero" required>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>

          </form>
        </div>
      </div>

    </div>
    <div class="col-lg-4">
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
              <h5 class="title"><?php echo $user_name . " " . $user_surname; ?> </h5>
            </a>
            <p class="description">
              <?php echo $user_email; ?><br>
              <?php echo $user_country; ?><br>
              <?php echo  $user_phone; ?><br>

            </p>
          </div>
          <p></p>
          
        </div>
        <div class="card-footer">
          
        </div>
      </div>
    </div>
  </div>
</div>

<script>
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