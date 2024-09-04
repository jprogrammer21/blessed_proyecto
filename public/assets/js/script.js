$(function () {



  $("#validate").submit(function () {
    var datos = $(this).serialize();
    var url = $(this).attr("action");
    $.post(url, datos, function (e) {
      if (e.icono == "error") {
        swal.fire(
          e.mensaje,
          '',
          e.icono
        )
      } else {
        window.location.href = e.url;
      }
      $("#validate").trigger("reset");
    }, 'JSON');
    return false;
  });




  $("#frmupdate2a").submit(function () {
    var url = $(this).attr("action");
    var dt = $(this).serialize();
    $.post(url, dt, function (e) {
      alert(
        e.mensaje,
        '',
        e.icono,
      );
      $("#frmupdate2a").trigger("reset");
    }, 'JSON')
    return false;
  });



  $(document).on('click', '.delete', function (e) {
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
        $.get(url, '', function (e) {
          elemento.closest("tr").remove();
          Swal.fire(
            e.mensaje,
            '',
            e.icono
          )
        }, 'json');
      }
    })
    return false;

  });




  $(document).on('click', '.eliminar_c', function (e) {
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
        $.get(url, '', function (e) {
          Swal.fire(
            e.mensaje,
            '',
            e.icono
          )
          window.setTimeout(redirt, 2000);
          function redirt() {
            window.location.replace("?controller=courses&action=index");
          }
        }, 'json',);
      }
    })
    return false;

  })


  $("#parametro").keyup(function(){
    var argumento = $(this).val();
    var url  = "?controller=user&action=search";
    $.post(url,"argumentos="+argumento, function(e){
      if(argumento == ''){
        $('#table2').show();
        $('#table1').hide();
      }else{
        $('#table1').show();
        $('#table2').hide();
        $("#resultados").html(e.mensaje)
      }
    },'JSON');
  })

  $(document).on('click', '.paginacion', function(){ // 
    var url = $(this). attr("href"); //
    var items = $("#pag").val();
    $.post(url, "limite="+items, function(e){ 
        $("#result").html(e.t+ " "+e.p);

    },'json');

    return false;
})

function cargarTabla(){
  $.post("?controller=user&action=list", "", function(e){ //aca no se especifica cuantos items mandar por pagina si es 3 0 6
      $("#result").html(e.t+ " "+e.p);
  },'json');
  return false; //consumir el controlador
}
cargarTabla();

  
$(document).on('change','#pag',function(){  //responder a los cambios que se hagan en el select
  var url = $(this).attr("data-url"); 
  var items = $(this).val();
  $.post(url, "limite="+items, function(e){ //estamos mandando un parametro llamado limite
      $("#result").html(e.t+ " "+e.p);

  },'json');

  return false;
});
 





  $(function () {
   

    $("#frmupdate2").on("submit", function(e) {
      var descrip = CKEDITOR.instances['descrip-c'].getData();
      if (descrip == '') {
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
     var formData = new FormData(document.getElementById("frmupdate2"));
     formData.append("descripcion", descrip);
     //formData.append(f.attr("name"), $(this)[0].files[0]);
     $.ajax({
       url: u,
       type: "post",
       dataType: "json",
       data: formData,
       cache: false,
       contentType: false,
       processData: false
     }).done(function (res) {
       if (res.type == "success") {
         Swal.fire(
           res.message,
           "",
           res.type
         )
         setInterval(location.reload(), 6000);
       }
       else {
         Swal.fire(
           res.message,
           "",
           res.type
         )
       }

     }, JSON);
   }

   return false;

     });


    $("#formuploadajax").on("submit", function (e) {

      var content = CKEDITOR.instances['descipcion'].getData();
      if (content == '') {
        Swal.fire({
          icon: 'error',
          title: 'Por favor digite una Descripcion',
          showConfirmButton: true,
          timer: 1500
        })
      } else {
        if ($("#file-2").val() == "") {
          Swal.fire('no se ha cargado nada')
        }
        else {


          var u = $(this).attr("action");
          e.preventDefault();
          var f = $(this);
          var formData = new FormData(document.getElementById("formuploadajax"));
          formData.append("descripcion", content);
          //formData.append(f.attr("name"), $(this)[0].files[0]);
          $.ajax({
            url: u,
            type: "post",
            dataType: "json",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
          })
            .done(function (res) {
              if (res.type == "success") {
                Swal.fire(
                  res.message,
                  "",
                  res.type
                )
                CKEDITOR.instances['descipcion'].setData(" ");
                window.setTimeout(redirt, 2000);
                function redirt() {
                  var url = "?controller=courses&action=list";
                  $.post(url, '', function (e) {
                    $("#component").html(e.mensaje)
                  }, 'json',);
                  return false;
                }
                $("#formuploadajax").trigger("reset");
                document.getElementById("iborrainputfile").innerHTML = "select File";
       
              }
              else {
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
    


  });




});