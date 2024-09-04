<?php
require_once "models/courses_modell.php";
require_once "models/type_modell.php";
require_once "models/chapters_modells.php";
require_once "models/test_modell.php";
require_once "models/user_modell.php";
require_once "controller/validacion.php";
class chapters_controller
{
   public function __construct()
   {
      if (isset($_SESSION["id"])) {
         $this->view = new structure;
      } else {
         header("location: /proyecto_blessed?controller=home&action=login");
      }
   }
   public function index()
   {
      if (isset($_SESSION["id"])) {
         if ($_SESSION['role'] == "administrador") {
            extract($_GET);
            $this->view->datos = type_modell::read();
            $this->view->dato = courses_modell::consult($uid);
            $this->view->dt = courses_modell::to_list();
            $this->view->unir_contenido("chapters/index");
         } else {
            header("location: /proyecto_blessed?controller=home&action=profile");
         }
      } else {
         header("location: /proyecto_blessed?controller=home&action=login");
      }
   }
   public function video()
   {
      if (isset($_SESSION["id"])) {
         if ($_SESSION['role'] == "administrador") {
            $this->view->datos = chapters_modells::list_2($_GET["uid"]);
            $this->view->unir_contenido1("chapters/video2");
         } else {
            header("location: /proyecto_blessed?controller=home&action=profile");
         }
      } else {
         header("location: /proyecto_blessed?controller=home&action=login");
      }
      extract($_GET);
   }

   public function list_chapters()
   {
      if (isset($_SESSION["id"])) {
         if ($_SESSION['role'] == "administrador") {
            extract($_GET);

            $rta = chapters_modells::to_list($a);
            $consul = courses_modell::consult($uid);
            $count = chapters_modells::count($consul["cours_id"]);
            $dato = test_modell::to_list($a);
            $posi = 0;
            $tbl = " ";
            foreach ($rta as $value) {
               $idu = $value["chatp_uid"];
               $video = $value["chatp_video"];
               $name = $value["chapt_name"];
               $img = $value["img"];
               $description = $value["chapt_descrp"];
               if (strlen($description) > 70) {
                  $description = substr($description, 0, 70) . ".....";
               }
               $posi = $posi + 1;
               $tbl .= "<a href='?controller=chapters&action=video&uid=$idu'><div class='card text-center' id='cardd' style='float: left;height: 350px; width: 260px;'>";
               $tbl .= "<img class='card-img-top' src='$img' style='height: 160px;' alt='Card image cap'>";
               $tbl .= "<div class='card-body'>";
               $tbl .= "<h4 class='card-title'>$name</h4>";
               $tbl .= "<p class='card-text'>$description</p>";
               $tbl .= "</div>";
               $tbl .= "<div class='card-footer text-center'>";
               $tbl .= "<a href='?controller=chapters&action=update&idue=$idu' class='update_chart mr-1'  data-toggle='modal' data-target='#Modal2'><button class='btn btn-info btn-sm'>Editar</button>";
               $tbl .= "<a href='?controller=chapters&action=delete&idue=$idu' class='delete_chart'><button class='btn btn-info btn-sm'>Eliminar</button></a>";
               $tbl .= "</a>";
               $tbl .= "</div></div></a>";

               foreach ($dato as $value) {
                  $uidd = $value["test_uid"];
                  if ($posi == $value["test_position"]) {
                     $tbl .= "<a href='?controller=test&action=index&uid=" . $uidd . "'><div class='card text-center' id='cardd' style='float: left;height: 350px; width: 260px;'>";
                     $tbl .= "<img class='card-img-top' src='public/assets/img/exam.png' style='height: 160px;' alt='Card image cap'>";
                     $tbl .= "<div class='card-body'>";
                     $tbl .= "<h4 class='card-title'>" . $value["test_name"] . "</h4>";
                     $tbl .= "<p class='card-text'>el examen uno </p><br>";
                     $tbl .= "</div>";
                     $tbl .= "<div class='card-footer text-center'>";
                     $tbl .= "<a href='?controller=test&action=consult&uid=$uidd' class='test_edit mr-1' data-toggle='modal' data-target='#frm_update_test'><button class='btn btn-info btn-sm'>Editar</button></a>";
                     $tbl .= "<a href='?controller=test&action=delete&uid=$uidd' class='delete_chart'><button class='btn btn-info btn-sm'>Eliminar</button></a>";
                  
                     $tbl .= "</div></div> </a>";
                  }
               }
            }
            echo json_encode(array("mensaje" => $tbl, "number" => $count["number"]));
         } else {
            header("location: /proyecto_blessed?controller=home&action=profile");
         }
      } else {
         header("location: /proyecto_blessed?controller=home&action=login");
      }
   }


   public function register()
   {
      if (isset($_SESSION["id"])) {
         if ($_SESSION['role'] == "administrador") {


            if (isset($_FILES["file-2"]["type"])) {
               // Get Image Dimension



               $allowed_image_extension = array(
                  "png",
                  "jpg",
                  "jpeg"
               );

               // Get image file extension
               $file_extension = pathinfo($_FILES["file-2"]["name"], PATHINFO_EXTENSION);

               // Validate file input to check if is not empty
               if (!file_exists($_FILES["file-2"]["tmp_name"])) {

                  $response = array(
                     "type" => "error",
                     "message" => "Elige una imagen para subir."
                  );
                  echo json_encode($response);
               } // Validate file input to check if is with valid extension
               else if (!in_array($file_extension, $allowed_image_extension)) {
                  $response = array(
                     "type" => "error",
                     "message" => "Sube una imagen válida. Solo PNG y JPEG son permitidos."
                  );
                  echo json_encode($response);
               } // Validate image file size
               else if (($_FILES["file-2"]["size"] > 2000000)) {
                  $response = array(
                     "type" => "error",
                     "message" => "Tamaño de imagen excede los 2MB"
                  );
                  echo json_encode($response);
               } // Validate image file dimension
               else {
                  extract($_POST);

                  $basename = uniqid() . $_FILES["file-2"]["name"];
                  $video = $_FILES["file-2"]["tmp_name"];
                  $ruta_a_subir = "public/img/" . $basename;
                  move_uploaded_file($video, $ruta_a_subir);
                  $data["uid"] = uniqid();
                  $data["name_chapter"] = htmlspecialchars($name_chapter);
                  $data["chapter_desc"] = validacion::validarinp($des);
                  $data["est"] = 1;
                  $data["code_chapter"] = htmlspecialchars($code_chapter);
                  $data["course_id"] = htmlspecialchars($course_id);
                  $data["img"] = $ruta_a_subir;
                  $r = chapters_modells::register($data);
                  if ($r > 0) {
                     $response = array(
                        "type" => "success",
                        "message" => "Registro exitoso."
                     );
                     echo json_encode($response);
                  } else {
                     $response = array(
                        "type" => "error",
                        "message" => "No registrado."
                     );
                     echo json_encode($response);
                  }

               }
            }


         } else {
            header("location: /proyecto_blessed?controller=home&action=profile");
         }
      } else {
         header("location: /proyecto_blessed?controller=home&action=login");
      }
   }


   public function update()
   {
      if (isset($_SESSION["id"])) {
         if ($_SESSION['role'] == "administrador") {
            extract($_GET);

            $ide = $_GET["idue"];
            $data = chapters_modells::list_2($ide);
            $name = $data["chapt_name"];
            $chart_desc = $data["chapt_descrp"];
            $chart_code = $data["chatp_video"];
            $course_ide = $data["chart_cours_id"];
            $uid = $data["chatp_uid"];
            $img = $data["img"];
            $tbl = "";
            $tbl .= "<label class='form-label'>Nombre del capitulo</label>";
            $tbl .= "<input type='text' name='name_chapter' id='name_chart'  class='form-control' value='$name'>";
            $tbl .= "<label class='form-label'>
         Descripcion del capitulo</label>";
            $tbl .= "<textarea name='descri' id='descrip-update' class='descrip-update'  class='descrip-update'>$chart_desc</textarea>";
            $tbl .= "<label class='form-label'>Codigo del capitulo</label>";
            $tbl .= "<input type='text' name='code_chapter' id='code_video'  class='form-control' value='$chart_code'>";
            $tbl .= "<input type='text' name='course_id' id='course_id'  class='form-control' value='$course_ide' style='display:none;' >";
            $tbl .= "<input type='text' name='chapter_uid' id='chart_uid'  class='form-control' value='$uid' style='display:none;' >";
            $tbl .= "
         <label>Cargar imagen</label> <br>

         <label for='file-uploa' class='subir'>
         <i class='fas fa-cloud-upload-alt'></i> <div style='float: left;' id='info-2'>Subir archivo</div>
     </label>
     <input id='file-uploa' accept='image/png,image/jpeg' onchange='cambia()' type='file' name='file-2' style='display: none;'/>
       
               
         <input type='text' name='rta_img' id='rta_img' value='$img' style='display:none ;'>
         ";
            $tbl .= "<div class='modal-footer'>";
            $tbl .= "<button type='submit' class='btn btn-secondary'>Actualizar</button>";
            $tbl .= "</div>";

            $tbl .= "  <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
            <script src='means/ckeditor/ckeditor.js'></script>
            <script src='means/ckeditor/adapters/jquery.js'></script>
  
      <script>
      $('textarea.descrip-update').ckeditor({


      });";



            echo json_encode(array("mensaje" => $tbl));
         } else {
            header("location: /proyecto_blessed?controller=home&action=profile");
         }
      } else {
         header("location: /proyecto_blessed?controller=home&action=login");
      }
   }
   public function edit()
   {
      if (isset($_SESSION["id"])) {
         if ($_SESSION['role'] == "administrador") {




            if ($_FILES["file-2"]["type"] != "") {
               // Get Image Dimension
               $fileinfo = @getimagesize($_FILES["file-2"]["tmp_name"]);

               $allowed_image_extension = array(
                  "png",
                  "jpg",
                  "jpeg"
               );

               // Get image file extension
               $file_extension = pathinfo($_FILES["file-2"]["name"], PATHINFO_EXTENSION);

               // Validate file input to check if is not empty
               if (!file_exists($_FILES["file-2"]["tmp_name"])) {

                  $response = array(
                     "type" => "error",
                     "message" => "Choose image file to upload."
                  );
                  echo json_encode($response);
               } // Validate file input to check if is with valid extension
               else if (!in_array($file_extension, $allowed_image_extension)) {
                  $response = array(
                     "type" => "error",
                     "message" => "Upload valid images. Only PNG and JPEG are allowed."
                  );
                  echo json_encode($response);
               } // Validate image file size
               else if (($_FILES["file-2"]["size"] > 2000000)) {
                  $response = array(
                     "type" => "error",
                     "message" => "Image size exceeds 2MB"
                  );
                  echo json_encode($response);
               } // Validate image file dimension
               else {
                  extract($_POST);
               $data["name_chapter"] = htmlspecialchars($name_chapter);
               $data["chapter_desc"] = validacion::validarinp($d);
               $data["code_chapter"] = htmlspecialchars($code_chapter);
               $data["courses_id"] = htmlspecialchars($course_id);
               $data["chapter_uid"] = htmlspecialchars($chapter_uid);
                  $basename = uniqid() . $_FILES["file-2"]["name"];
                  $video = $_FILES["file-2"]["tmp_name"];
                  $ruta_a_subir = "public/img/" . $basename;
                  move_uploaded_file($video, $ruta_a_subir);
               
               $data["img"] = $ruta_a_subir;
               $r = chapters_modells::edit($data);
                  if ($r > 0) {
                     $response = array(
                        "type" => "success",
                        "message" => "Editado con exito."
                     );
                     echo json_encode($response);
                  } else {
                     $response = array(
                        "type" => "error",
                        "message" => "no editado."
                     );
                     echo json_encode($response);
                  }
               }
            } else {

               extract($_POST);
               $data["name_chapter"] = $name_chapter;
               $data["chapter_desc"] = $d;
               $data["code_chapter"] = $code_chapter;
               $data["courses_id"] = $course_id;
               $data["chapter_uid"] = $chapter_uid;

               $ruta_a_subir = $rta_img;

               $data["img"] = $ruta_a_subir;
               $r = chapters_modells::edit($data);
               if ($r > 0) {
                  $response = array(
                     "type" => "success",
                     "message" => "Editado con exito."
                  );
                  echo json_encode($response);
               } else {
                  $response = array(
                     "type" => "error",
                     "message" => "no editado."
                  );
                  echo json_encode($response);
               }

            }


         } else {
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
            $ide = $_GET["idue"];
            $r = chapters_modells::delete($ide);
            if ($r > 0) {
               echo json_encode(array("mensaje" => "capitulo eliminado", "icono" => "success"));
            } else {
               echo json_encode(array("mensaje" => "capitulo no eliminado", "icono" => "error"));
            }
         } else {
            header("location: /proyecto_blessed?controller=home&action=profile");
         }
      } else {
         header("location: /proyecto_blessed?controller=home&action=login");
      }
   }

   public function chapters()
   {
      if (isset($_SESSION["id"])) {
         if ($_SESSION['role'] == "estudiante") {
            $rtaa = user_modell::mdl_consult($_SESSION["uid"]);
            if ($rtaa["plan_exp_date"] <= date("Y-m-d")) {
               $this->view->renew();
            } else {
               extract($_GET);
               $uid = $_GET["idu"];
               $this->view->chapters = chapters_modells::list_2($uid);
               $id = $_GET["acs"];
               $this->view->list_repro = chapters_modells::list_chapters($id);
               $rta = chapters_modells::to_list($id);

               $dato = test_modell::to_list($id);

               $posi = 0;
               $tbl = " ";
               $nu = 2;
               $ni = 1;
               $ruta = 0;
               $l = 1;



               foreach ($rta as $value) {
                  $uid = $value["chatp_uid"];
                  $video = $value["chatp_video"];
                  $name = $value["chapt_name"];
                  $description = $value["chapt_descrp"];
                  $dds = $value["chart_cours_id"];
                  $posi = $posi + 1;
                  $img = $value["img"];

                  if ($l == $num - 1) {
                     $uno = $l + 1;
                     $ruta_2 = "?controller=chapters&action=chapters&idu=$uid&acs=$dds&num=$uno&di=$di&udi=$udi";
                  }

                  $tbl .= "<a href='?controller=chapters&action=chapters&idu=$uid&acs=$dds&num=$nu&di=$di&udi=$udi'>";
                  if ($ni == $num) {
                     $uno = $ni + 1;
                     $ruta = "?controller=chapters&action=chapters&idu=$uid&acs=$dds&num=$uno&di=$di&udi=$udi";
                  }

                  $tbl .= "<div class='card mb-3' style='max-width: 540px;'>";
                  $tbl .= "<div class='row no-gutters'>";
                  $tbl .= "<div style='display: inline-block; position:relative'>";
                  $tbl .= "<img class='card-img-top' src='$img' style='width: 100px; height:70px;' alt='Card image cap'> ";
                  $tbl .= "<div style='display: inline-block; position:absolute; top:50%; left:50%; transform: translate(-50%, -50%) '>";
                  $tbl .= "<i class='bi bi-play-circle-fill' style='font-size: 30px; color:#242638;'></i>";
                  $tbl .= "</div>";
                  $tbl .= "</div>";
                  $tbl .= "<div style='widht: 10px; margin-left:10px;'><h3>$name</h3></div>";
                  $tbl .= "</div>";
                  $tbl .= "</div>";
                  $tbl .= "</a>";
                  $l = $l + 1;
                  $nu = $nu + 1;
                  $ni = $ni + 1;
                  foreach ($dato as $value) {
                     $uidd = $value["test_uid"];
                     if ($posi == $value["test_position"]) {
                        $tbl .= "<a href='?controller=test&action=index_ex&uid=$uidd&acs=$dds&num=$nu&acs=$dds&di=$di&udi=$udi' style='cursor:pointer;'>";
                        $tbl .= "<div class='card mb-3' style='max-width: 540px;'>";
                        $tbl .= "<div class='row no-gutters'>";
                        $tbl .= "<img class='card-img-top' src='public/assets/img/exam.png' style='width: 100px; height:70px;' alt='Card image cap'>";
                        $tbl .= "<div style='widht: 10px; margin-left:10px;'><h4>" . $value["test_name"] . "</h4></div>";
                        $tbl .= "</div>";
                        $tbl .= "</div>";
                        $tbl .= "</a>";
                        if ($l == $num - 1) {
                           $uno = $l + 1;
                           $ruta_2 = "?controller=test&action=index_ex&uid=$uidd&num=$uno&acs=$dds&di=$di&udi=$udi";
                        }
                        if ($ni == $num) {
                           $uno = $ni + 1;
                           $ruta = "?controller=test&action=index_ex&uid=$uidd&num=$uno&acs=$dds&di=$di&udi=$udi";
                        }

                        $l = $l + 1;
                        $nu = $nu + 1;
                        $ni = $ni + 1;
                     }
                  }
               }

               $this->view->d = $tbl;
               $this->view->r = $ruta;

               $dto = courses_modell::consult_ant();

               if ($dto > 0) {
                  $data["etiqueta"] = $ruta_2;
                  $data["id"] = $dto["id"];
                  $eve = courses_modell::edit_ante($data);
               } else {
                  $data["uid"] = uniqid();
                  $data["etiqueta"] = $ruta_2;
                  $data["user_id"] = $_SESSION["id"];
                  $eve = courses_modell::register_ante($data);
               }



               $this->view->unir_contenido2("chapters/video");
            }
         } else {
            header("location: /proyecto_blessed?controller=home&action=profile");
         }
      } else {
         header("location: /proyecto_blessed?controller=home&action=login");
      }
   }
}