<div class="content">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n3 mx-3 z-index-2">
                    <div class="bg-primary shadow-primary border-radius-lg pt-2 pb-3" style="border-radius: 10px;">
                        <center><b style=" font-size: 23px;">Usuarios</b></center>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <input autocomplete="off" type="text" class="form-control" id="parametro" name="parametro" placeholder="Buscar usuarios">
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <select class="form-control" name="pag" id="pag" data-url="?controller=user&action=list">
                                    <option style="background:#1d0e34;" value="5">5</option>
                                    <option style="background:#1d0e34;" value="10">10</option>
                                    <option style="background:#1d0e34;" value="15">15</option>
                                    <option style="background:#1d0e34;" value="20">20</option>
                                    <option style="background:#1d0e34;" value="25">25</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <table class=" table-responsive table" id="table1" style="display:none;">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombres</th>
                            <th>apellidos</th>
                            <th>Correos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="resultados">

                    </tbody>
                </table>

                <div class="table-responsive" id="result">

                </div>





            </div>
        </div>
    </div>
</div>
</div>