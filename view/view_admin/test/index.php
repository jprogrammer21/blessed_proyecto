<?php
extract($this->dato);
?>

<div class="content">
    <h1>
        <?php echo $test_name;  ?>
    </h1>
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="add">
                    <button class="bcn" data-toggle="modal" data-target="#example">
                        Crear preguntas</button>

                </div>
            </div>
        </div>
    </div>

    <div class="row" id="test_c">


    </div>

</div>

<!-- Modal -->
<div class="modal modal-black fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" _mstvisible="0">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar pregunta</h5>

                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="tim-icons icon-simple-remove"></i>
                </button>
            </div>
            <div class="modal-body">
                <form autocomplete="off" action="?controller=question&action=register" id="frmregister1" method="POST">
                    <div class="form-group">
                        <label>Pregunta</label>
                        <input type="text" class="form-control" id="question" name="question" placeholder="Escriba la pregunta" required>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <button type="button" class="btn btn-info btn-fab btn-icon btn-round" onclick="c()">
                            <i class="tim-icons icon-simple-add"></i>
                        </button>
                        <label style="height:2.375r ; padding: 10px;">Agregar una respuesta</label>
                    </div>
                    <div class="form-group" id="ress">

                    </div>


                    <div class='modal-footer'>
                        <button type='submit' class='btn btn-secondary'>Registrar</button>
                    </div>

                    

                </form>

            </div>
        </div>
    </div>
</div>


<script>
    num = 1;
    test_id = "<?php echo $test_id; ?>"

    function h(){
        num = 1;
        
    }

    function c() {

        div = document.getElementById("ress");
        div_b = document.createElement("div");
        div_b.id = "form" + num;
        div_b.className = "form-row";

        div.appendChild(div_b);

        div_c1 = document.createElement("div");
        div_c1.className = "form-group col-md-9";

        div_c2 = document.createElement("div");
        div_c2.className = "form-group col-md-3";

        div_b.appendChild(div_c1);
        div_b.appendChild(div_c2);

        label1 = document.createElement("label");
        label1.textContent = "Respuesta";

        label2 = document.createElement("label");
        label2.textContent = "Tipo";

        input_1 = document.createElement("input");
        input_1.id = "ress" + num;
        input_1.name = "ress" + num;
        input_1.className = "form-control";
        input_1.required = 'true';

        select_1 = document.createElement("select");
        select_1.id = "type" + num;
        select_1.name = "type" + num;
        select_1.Content = "<option value='0'> fake </option> <option value='1'> real </option>";
        select_1.className = "form-control";



        div_c1.appendChild(label1);
        div_c1.appendChild(input_1);

        div_c2.appendChild(label2);
        div_c2.appendChild(select_1);

        op1 = document.createElement("option");
        op1.textContent = "Falso";
        op1.style = "color:black";
        op1.value = 0;

        op2 = document.createElement("option");
        op2.textContent = "Verdadero";
        op2.style = "color:black";
        op2.value = 1;

        select_1.appendChild(op1);
        select_1.appendChild(op2);







        num++;



    }

    function b() {

        var urll = "?controller=question&action=list_test";
        $.post(urll, "id=" + test_id, function(e) {
            $("#test_c").html(e.mensaje);
        }, 'json', );
        return false;
    }


    $("#frmregister1").submit(function() {


        var url = $(this).attr("action");
        var dt = $(this).serialize();
        $.post(url, dt + "&num_ress=" + num + "&test_id=" + test_id, function(e) {
            Swal.fire(
                    e.mensaje,
                    '',
                    e.icono
                ),
               
                window.setTimeout(b(), 2000);
         
            if(e.icono != "error"){
                $("#frmregister1").trigger("reset");
                $("#ress").html("")
                h()
            }
        }, 'JSON')
        return false;

        
    });

    $(document).on('click', '.delete_quest', function(e) {
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
                        window.setTimeout(b(), 1000);


                    }, 'json');
                }
            })
            return false;

        });




    $(document).ready(function() {
        var urll = "?controller=question&action=list_test";

        $.post(urll, "id=" + test_id, function(e) {
            $("#test_c").html(e.mensaje);
        }, 'json', );
        return false;
    });
</script>