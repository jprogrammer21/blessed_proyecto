<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "models/user_modell.php";
require_once "models/plan_modell.php";
require_once "models/type_modell.php";
require_once "models/plan_modell.php";
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';


class user_controller
{
  public function __Construct()
  {

    $this->view = new  structure;
  }

  public function index()
  {
    if (isset($_SESSION["id"])) {
      if ($_SESSION['role'] == "administrador") {
        $this->view->link = "users";
        $this->view->unir_contenido("user/index");
    
      
    } else{
      header("location: /proyecto_blessed?controller=home&action=profile");
  }
    } else {
      header("location: /proyecto_blessed?controller=home&action=login");
    }
  }

 

  public function regist(){

      extract($_POST);
      $ip = $_SERVER['REMOTE_ADDR'];
    $capcha = $_POST['g-recaptcha-response'];
    $secretKey = "6LflLiUkAAAAAE5VXYmQGuOpfcnPaGyLwNWMPjDi";
    $respuesta = file_get_contents(
      "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$capcha&remoteip=$ip");

     $atributos = json_decode($respuesta, TRUE); 
     if (!$atributos['success']) {
      echo  json_encode(array("mensaje" => "Validar Capchat", "icono" => "error"));
     }else{
    $rt = type_modell::reade($plan);
    if ($rt>0) {
      $r = user_modell::vali_email($email);
      if ($r > 0) {
        echo json_encode(array("mensaje" => "Este usuario Ya existe", "icono" => "error"));
      } else {
        $data["uid"] = uniqid();
        $data["password"] = htmlspecialchars($password);
        $data["email"] = $email;
        $data["rol"] = htmlspecialchars("estudiante");
        $data["user_cond"] = 1;
        $data["name"] = htmlspecialchars($name);
        $data["surname"] = htmlspecialchars($surname);
        $data["country"] = htmlspecialchars($country);
        $data["number_phone"] = $number_phone;
        $data["plans"] = $plan;
        if ( is_numeric($data["number_phone"])) {
          if (filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
            $rta = user_modell::regist($data);
          
            if ($rta > 0) {
           
              $rta2=user_modell::consult($data["uid"]);
              $rta3=type_modell::reade($data["plans"]);
              $aumento = $rta3["tp_plan_duration"];
              $fecha_actual = date("Y-m-d");
              $fecha_e=date("Y-m-d",strtotime($fecha_actual."+ $aumento month")); 
              
              $d['uid']=uniqid();
              $d['plan_start_date']=$fecha_actual;
              $d['plan_exp_date']=$fecha_e;
              $d["plan_cond"]=1;
              $d["tp_plan_id"]=$rta3["tp_plan_id"];
              $d['user_id']=$rta2["user_id"];
              $rta4=plan_modell::register($d);
              if ($rta4 > 0) {
                echo json_encode(array("mensaje" => "Registrado corrextamente","icono" => "success"));
              } else {
                echo json_encode(array("mensaje" => "No se pudo Registrar", "icono" => "error"));
              }
      
            } else {
              echo "n";
            }
          }else{
            echo json_encode(array("mensaje" => "Email incorrecto", "icono" => "error"));
          }
        } else {
          echo json_encode(array("mensaje" => "el codigo del pais o telefono debe ser un numero", "icono" => "error"));
        }
        
       
      }
    }
    else{
      echo json_encode(array("mensaje" => "plan inexistentes", "icono" => "error"));

    }
      
      
  }

}

  public function list(){
    if(isset($_POST["limite"])){
        $limite = $_POST["limite"];
    }else{
      $limite = 5;
    }
    $total = user_modell::cant();
    if($total > $limite){
        $paginas = ceil($total / $limite);
    }else{
      $paginas = 1;
    }
    if (isset($_GET["pagina"])&& is_numeric($_GET["pagina"])) {
      $pagina = $_GET["pagina"];
    } else {
      $pagina = 0;
    }
    
    $pagina_act = ($pagina / $limite)+1;
    $this->view->info = user_modell::paginacion($pagina,$limite);
    if($paginas >= 1){
      $this->view->pag = '<ul class="pagination pagination-sm ml-2">';
      for($i=1;$i<=$paginas;$i++){
				if($i != $pagina_act){
          $this->view->pag.= '<li class="page-item"><a href="?controller=user&action=list&pagina='.($limite*($i-1)).'" class="paginacion page-link">'.$i.'</a></li> ';
				}else{
					$this->view->pag .= '  <li class="page-item active" aria-current="page"><span class="page-link">'
					.$i.
					'</span></li>';
				}
        }
        $this->view->pag.="</ul>";
        $tabla ='
        <table class="table" id="table2" >
        <thead>
            <tr>
                <th></th>
                <th>Nombres</th>
                <th>apellidos</th>
                <th>Correos</th>
                <th>Acciones</th>
            </tr>
        </thead>';
        foreach ($this->view->info as $valor) {
          $id = $valor["user_uid"];
          $name = $valor["user_name"];
          $apellido = $valor["user_surname"];
          $email = $valor["user_email"];
          $e = "<a href='?controller=user&action=delete&id=$id' class='delete'><button type='button' rel='tooltip' class='btn btn-danger btn-sm btn-icon'>
        <i class='tim-icons icon-simple-remove'></i>";
        $et = "<a href='?controller=user&action=frmdetail&id=$id' style='margin-right:5px;'> <button type='button' rel='tooltip' class='btn btn-info btn-sm btn-icon'>
        <i class='tim-icons icon-single-02'></i>
    </button></a>";
          $tabla.="<tr>";
          $tabla.="<td></td>";
          $tabla.="<td>".$name."</td>";
          $tabla.="<td>".$apellido."</td>";
          $tabla.="<td>".$email."</td>";
          $tabla .="<td>"."$et"."$e"."</td>";
          $tabla.="</tr>";
        }
        $tabla.="<table/>";
        echo json_encode(array("t"=>$tabla, "p"=>$this->view->pag));
        
    }
  }
 
  
  public function search()
  {
    if (isset($_SESSION["id"])) {
      if ($_SESSION['role'] == "administrador") {
      extract($_POST);
      $data = user_modell::search_name($argumentos);
      
   
     
      $tbl = " ";
      foreach ($data as $v) {
      
        $id = $v["user_uid"];
        $e = "<a href='?controller=user&action=delete&id=$id' class='delete'><button type='button' rel='tooltip' class='btn btn-danger btn-sm btn-icon'>
        <i class='tim-icons icon-simple-remove'></i>
    </button></a>";
        $et = "<a href='?controller=user&action=frmdetail&id=$id' style='margin-right:5px;'> <button type='button' rel='tooltip' class='btn btn-info btn-sm btn-icon'>
        <i class='tim-icons icon-single-02'></i>
    </button></a>";
        $tbl .="<tr class='text-white'>";
        $tbl .="<td></td>";
        $tbl .= "<td>" . $v["user_name"] . "</td>";
        $tbl .= "<td>" . $v["user_surname"] . "</td>";
        $tbl .= "<td>" . $v["user_email"] . "</td>";
        $tbl .= "<td>" . "$et"."$e". "</td>";
        $tbl .= "</tr>";
      }
      echo json_encode(array("mensaje" => $tbl));
     
     
    } else{
      header("location: /proyecto_blessed?controller=home&action=profile");
  }
    } else {
      header("location: /proyecto_blessed?controller=home&action=login");
    }
  }

  public function frmdetail()
  {
    if (isset($_SESSION["id"])) {
      if ($_SESSION['role'] == "administrador") {
      extract($_GET);
      $this->view->datos = user_modell::mdl_Consult($id);
      $this->view->unir_contenido("user/frm_detail");
    } else{
      header("location: /proyecto_blessed?controller=home&action=profile");
  }
    } else {
      header("location: /proyecto_blessed?controller=home&action=login");
    }
  }

  public function delete()
  {
    if (isset($_SESSION["id"])) {
      if ($_SESSION['role'] == "administrador") {
        extract($_GET);
        $rta = user_modell::mdldelete($id);
        if ($rta > 0) {
          echo json_encode(array("mensaje" => "eliminado", "icono" => "success"));
        } else {
          echo json_encode(array("mensaje" => "NO eliminado", "icono" => "error"));
        }
      } else {
        header("location: /proyecto_blessed?controller=home&action=profile");
      }
    } else {
      header("location: /proyecto_blessed?controller=home&action=login");
    }
  }

  public function validate()
  {
    extract($_POST);
    $data["email"] = $email;
    $data["password"] = htmlspecialchars($password);
    if (filter_var($data["email"], FILTER_VALIDATE_EMAIL)) {
      $rta = user_modell::validate($data);
    if ($rta > 0) {
      $_SESSION["name"] = $rta["user_name"];
      $_SESSION["surname"] = $rta["user_surname"];
      $_SESSION["role"] = $rta["user_role"];
      $_SESSION["id"] = $rta["user_id"];
      $_SESSION["uid"] = $rta["user_uid"];
      $_SESSION["plan"] = $rta["tp_plan_id"];
      echo json_encode(array("mensaje" => "usuario encontrado", "icono" => "SUCCESS", "url" => "?controller=home&action=profile"));
    } else {
      echo json_encode(array("mensaje" => "usuario no encontrado", "icono" => "error"));
    }
  }else{
    echo json_encode(array("mensaje" => "Email incorrecto", "icono" => "error"));
  }
  }

  public function exit()
  {
    if (isset($_SESSION["id"])) {
      session_destroy();
      header("location: /proyecto_blessed/?controller=home&action=index");
    } else {
      header("location: /proyecto_blessed?controller=home&action=index");
    }
  }



  public function certificate()
  {
    if (isset($_SESSION["id"])) {
    if ($_SESSION['role'] == "estudiante") {
      $rtaa=user_modell::mdl_consult($_SESSION["uid"]);
          if ($rtaa["plan_exp_date"] == date("Y-m-d")) {
              $this->view->renew();
          }else{
              extract($_GET);
              $this->view->name = $name;
              $this->view->cours = $cours;
              $this->view->certify();
            }
      } else {
        header("location: /proyecto_blessed?controller=home&action=profile");
      }
    } else {
      header("location: /proyecto_blessed?controller=home&action=login");
    }
  }

  public function update_info_u()
  {
    if (isset($_SESSION["id"])) {
      if ($_SESSION['role'] == "administrador" || $_SESSION['role'] == "estudiante") {
        
        extract($_POST);
        $datos["name"] = htmlspecialchars($nombre);
        $datos["surname"] = htmlspecialchars($apellido);

        $datos["email"] = $correo;
        $datos["number"] = $numero_t;
      
        $datos["country"] = htmlspecialchars($pais);
        if (is_numeric($datos["number"])) {
          if (filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
            $rta = user_modell::edit_user($datos);
            if ($rta > 0) {
              $rta_2 = user_modell::edit_user_2($datos);
    
              if ($rta_2 > 0) {
                echo json_encode(array("mensaje" => "editado correctamente "));
              } else {
                echo json_encode(array("mensaje" => "No se pudo editar "));
              }
            }
          }else{
            echo json_encode(array("mensaje" => "Email incorrecto", "icono" => "error"));
          }
        } else {
          echo json_encode(array("mensaje" => "el codigo del pais o telefono debe ser un numero", "icono" => "error"));
        }
        
      } else {
        header("location: /proyecto_blessed?controller=home&action=profile");
      }
    } else {
      header("location: /proyecto_blessed?controller=home&action=login");
    }
  }

  public function validate_email()
  {

    extract($_POST);
    $email =$_POST["email"];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $r = user_modell::vali_email($email);
   
    if ($r > 0) {

      $user_name = $r["user_name"];
      $user_email  = $r["user_email"];
      $tok =  rand(50000, 100000);

      $mail = new PHPMailer(true);
      try {

        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        
        $mail->Username   = 'jpenaranda633@gmail.com';
        $mail->Password   = 'jdxfscosuisauihw';
        $mail->Port       =  587;

        $message = '
        <!doctype html>
        <html lang="en-US">
        
        <head>
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
            <title>email</title>
          
            <style type="text/css">
                a:hover {text-decoration: underline !important;}
            </style>
        </head>
        
        <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
            <!-- 100% body table -->
            <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
                style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
                <tr>
                    <td>
                        <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                            align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="height:80px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align:center;">
                                    <a href="https://rakeshmandal.com" title="logo" target="_blank">
                                    <img width="300" src="https://i.postimg.cc/s2MVD1ZZ/lg.png" title="logo" alt="logo">
                                  </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:20px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                        style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                        <tr>
                                            <td style="height:40px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0 35px;">
                                                <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">Recuperar contraseña
                                                </h1>
                                                <p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                                    </strong>Hemos recibido una solicitud para acceder a tu cuenta de Blessed academy, '.$user_email.', a través de tu dirección de correo electrónico. Tu código de verificación de Blessed academy  es:</p>
                                                <span
                                                    style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                <p
                                                    style="color:#455056; font-size:18px;line-height:20px; margin:0; font-weight: 500;">
                                                    <strong
                                                        style="display: block;font-size: 13px; margin: 0 0 4px; color:rgba(0,0,0,.64); font-weight:normal;">Codigo</strong>'.$tok.'
                                                    
                                                </p>
        
                                              
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="height:40px;">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:20px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align:center;">
                                    <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>link de la pagina</strong> </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:80px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--/100% body table-->
        </body>
        
        </html>
        ';
        $mail->setFrom('jpenaranda633@gmail.com');
        $mail->addAddress($user_email);    
        $mail->isHTML(true);
        $mail->Subject = 'Recuperacion de contrasena';
        $mail->Body    = $message;
        $mail->AltBody = '';

        $mail->send();
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
      $data["token"]    = $tok;
      $data["user_id"]  = $r["user_id"];
      $reg   = user_modell::insert_token($data);

      echo json_encode(array("response" => "y"));
    } else {
      echo json_encode(array("response" => "n"));
    }
  }else{
    echo json_encode(array("mensaje" => "Email incorrecto", "icono" => "error"));
  }
  }


  public function validate_code()
  {
    extract($_POST);
    $token = $_POST["token"];
    if (is_numeric($token)) {
      $r = user_modell::vali_token((int)$token);
      if ($r > 0) {
        $uie  = $r["user_uid"];
        echo json_encode(array("response" => "y", "u" => $uie));
      } else {
        echo json_encode(array("response" => "n"));
      }
    } else {
      echo json_encode(array("response" => "error"));
    }
    
  }

  public function recover_pass()
  {
    extract($_POST);
    $consul = user_modell::consult($user_uid);
    
    if($consul["token"] == null){
      echo json_encode(array("r" => "error", "icon" => "error"));
    }
    else{
    $data["password1"] = htmlspecialchars($password1);
    $data["user_cond"] = 1;
    $data["user_uid"] = htmlspecialchars($user_uid);
    $res = user_modell::update_token($user_uid);
    $rta = user_modell::recover_password($data);
    if ($rta > 0) {
      echo json_encode(array("r" => "su contrasena ha sido recuperada", "icon" => "success"));
    } else {
      echo json_encode(array("r" => "no se pudo recuperar su contrasena", "icon" => "success"));
    }
  }
  }

  public function contact()
  {
    extract($_POST);
    $name = htmlspecialchars($_POST["name"]);
    $email = $_POST["email"];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $descripcion = htmlspecialchars($_POST["descripcion"]);
    $ip = $_SERVER['REMOTE_ADDR'];
    $capcha = $_POST['g-recaptcha-response'];
    $secretKey = "6LflLiUkAAAAAE5VXYmQGuOpfcnPaGyLwNWMPjDi";
    $respuesta = file_get_contents(
      "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$capcha&remoteip=$ip");

     $atributos = json_decode($respuesta, TRUE); 
     if (!$atributos['success']) {
      echo  json_encode(array("response" => "n"));
     }else{
      $mail = new PHPMailer(true);
      try {
  
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'jpenaranda633@gmail.com';
        $mail->Password   = 'jdxfscosuisauihw';
        $mail->Port       =  587;
  
        $message = '
        <html lang="en-US">
        
        <head>
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
            <title>email</title>
          
            <style type="text/css">
                a:hover {text-decoration: underline !important;}
            </style>
        </head>
        
        <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
            <!-- 100% body table -->
            <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
                style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
                <tr>
                    <td>
                        <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                            align="center" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="height:80px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align:center;">
                                    <a href="https://rakeshmandal.com" title="logo" target="_blank">
                                    <img width="300" src="https://i.postimg.cc/s2MVD1ZZ/lg.png" title="logo" alt="logo">
                                  </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:20px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                        style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                        <tr>
                                            <td style="height:40px;">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td style="padding:0 35px;">
                                                <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">Contacto
                                                </h1>
                                                <p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                                    La Persona '.$name.' con Direccion de correo electronico '.$email.' ha Contactado a blessed club Trading Academy</strong>.</p>
                                                <span
                                                    style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                <p
                                                    style="color:#455056; font-size:18px;line-height:20px; margin:0; font-weight: 500;">
                                                    <strong
                                                        style="display: block;font-size: 13px; margin: 0 0 4px; color:rgba(0,0,0,.64); font-weight:normal;">'.$descripcion.'</strong>
                                                    
                                                </p>
        
                                                <a href="login.html"
                                                    style="background:#20e277;text-decoration:none !important; display:inline-block; font-weight:500; margin-top:24px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Login
                                                    IR a la pagina</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="height:40px;">&nbsp;</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:20px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="text-align:center;">
                                    <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>aqui ba el link de la pagina</strong> </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="height:80px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <!--/100% body table-->
        </body>
        
        </html>
        ';
        $mail->setFrom($email);
        $mail->addAddress('jpenaranda633@gmail.com');     //Add a recipient               //Name is optional
        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Comunicacion de usuarios';
        $mail->Body    = $message;
        $mail->AltBody = '';
  
        $mail->send();
        echo json_encode(array("response" => "y"));
      } catch (Exception $e) {
        echo  json_encode(array("response" => "n"));
      }
     }
    }else{
      echo json_encode(array("mensaje" => "Email incorrecto", "icono" => "error"));
    }
   
  }

  public function register2()
  {
    extract($_GET);
    $id =$_GET['parameter'];
    $this->view->id = $id;
    $this->view->plans = type_modell::read();
    $this->view->register_view();
  }

  public function renew_plans(){
      $this->view->renew();
  }
}
