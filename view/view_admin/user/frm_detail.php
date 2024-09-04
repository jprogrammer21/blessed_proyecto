<div class="content">
  <div class="card">
    <div class="card-body">
      <h4>Informacion de usuario</h4>
      <form>
        <fieldset disabled>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Nombre</label>
              <input type="email" class="form-control" value="<?php echo $this->datos["user_name"];  ?>">
            </div>
            <div class="form-group col-md-6">
              <label>Apellido</label>
              <input type="text" class="form-control" value="<?php echo $this->datos["user_surname"];  ?>">
            </div>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" value="<?php echo $this->datos["user_email"];  ?>">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>N° Telefono</label>
              <input type="text" class="form-control" value="<?php echo $this->datos["user_phone"];  ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Pais</label>
              <input type="text" class="form-control" value="<?php echo $this->datos["user_country"];  ?>">
            </div>
            <div class="form-group col-md-2">
              <label>Rol</label>
              <input type="text" class="form-control" value="<?php echo $this->datos["user_role"];  ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>plan</label>
              <input type="text" class="form-control" value="<?php echo $this->datos["tp_plan_name"];  ?>">
            </div>

            <div class="form-group col-md-4">
              <label>Fecha de inicio</label>
              <input type="text" class="form-control" value="<?php echo $this->datos["plan_start_date"];  ?>">
            </div>
            <div class="form-group col-md-4">
              <label>Fecha de expiracion</label>
              <input type="text" class="form-control" value="<?php echo $this->datos["plan_exp_date"];  ?>">
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>

</div>