<?php
require_once "models/courses_modell.php";
require_once "models/chapters_modells.php";
require_once "models/user_modell.php";
require_once "models/type_modell.php";
require_once "models/test_modell.php";
require_once "controller/validacion.php";
class courses_controller
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
                $this->view->link = "cours";
                $this->view->datos = type_modell::read();
                ;
                $this->view->unir_contenido("courses/index");
            } else {
                header("location: /proyecto_blessed?controller=home&action=profile");
            }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function index_us()
    {

        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "estudiante") {
                $rtaa = user_modell::mdl_consult($_SESSION["uid"]);
                if ($rtaa["plan_exp_date"] <= date("Y-m-d")) {
                    $this->view->renew();
                } else {
                    $dato = courses_modell::to_list_c();
                    $tbl = "";
                    foreach ($dato as $v) {
                        if (strlen($v["cours_descrp"]) > 70) {
                            $v["cours_descrp"] = substr($v["cours_descrp"], 0, 70) . ".....";
                        }
                        $uid = $v["cours_uid"];
                        $dds = $v["cours_id"];
                        $tbl .= "<div class='col' ><div class='card text-center ' id='cardd' style='height: 350px;margin: auto;margin-bottom: 30px;'><a href='?controller=courses&action=chapters_list&uid=$uid&ddsbq=$dds' class=''>";
                        $tbl .= "<img class='card-img-top' src='" . $v["img"] . "' alt='Card image cap' >";
                        $tbl .= "<div class='card-body'>";
                        $tbl .= "<h4 class='card-title'>" . $v["cours_name"] . "</h4>";
                        
                        $tbl .= "</div> </a></div></div> ";
                    }
                    $this->view->datos = $tbl;
                    $this->view->unir_contenido2("courses/index");
                }
            } else {
                header("location: /proyecto_blessed?controller=home&action=profile");
            }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function list()
    {
        if (isset($_SESSION["id"])) {

            $dato = courses_modell::to_list();
            $tbl = "";
            foreach ($dato as $v) {
                $tbl .= "<a href='?controller=chapters&action=index&uid=" . $v["cours_uid"] . "'><div class='card text-center' id='cardd' style='float: left;height: 320px;'>";
                $tbl .= "<img class='card-img-top' src='" . $v["img"] . "' alt='Card image cap' >";
                $tbl .= "<div class='card-body'>";
                $tbl .= "<h4 class='card-title'>" . $v["cours_name"] . "</h4>";

                $tbl .= "</div> </div> </a>";
            }
            echo json_encode(array("mensaje" => $tbl));
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function insert()
    {

        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "estudiante") {
                $rtaa = user_modell::mdl_consult($_SESSION["uid"]);
                if ($rtaa["plan_exp_date"] <= date("Y-m-d")) {
                    $this->view->renew();
                } else {
                    header("location: /proyecto_blessed?controller=home&action=profile");
                }
            } else {
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
                        $basename = uniqid() . $_FILES["file-2"]["name"];
                        $video = $_FILES["file-2"]["tmp_name"];
                        $ruta_a_subir = "public/img/" . $basename;
                        move_uploaded_file($video, $ruta_a_subir);
                        $data["uid"] = uniqid();
                        $data["name"] = htmlspecialchars($name);
                        $data["description"] =  validacion::validarinp($descripcion);
                        $data["tp_plan"] = htmlspecialchars($tp_plan);
                        $data["img"] = $ruta_a_subir;
                        $r = courses_modell::register($data);
                        if ($r > 0) {
                            $response = array(
                                "type" => "success",
                                "message" => "Registro exitoso."
                            );
                            echo json_encode($response);
                        } else {
                            $response = array(
                                "type" => "error",
                                "message" => "no registrado."
                            );
                            echo json_encode($response);
                        }

                    }
                } else {
                    $response = array(
                        "type" => "error",
                        "message" => "no a cargado una imagen."
                    );
                    echo json_encode($response);
                }
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
                $r = courses_modell::delete($uid);
                if ($r > 0) {
                    echo json_encode(array("mensaje" => "registro eliminado con exito", "icono" => "success"));
                } else {
                    echo json_encode(array("mensaje" => "error no fue eliminar el registro", "icono" => "error"));
                }
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
                        if ($_FILES["file-2"]["name"] == "") {
                            $ruta_a_subir = $rta_img;
                        } else {

                            $basename = uniqid() . $_FILES["file-2"]["name"];
                            $video = $_FILES["file-2"]["tmp_name"];
                            $ruta_a_subir = "public/img/" . $basename;
                            move_uploaded_file($video, $ruta_a_subir);
                        }
                        $data["name"] = htmlspecialchars($name);
                        $data["description"] = validacion::validarinp($descripcion);
                        $data["tp_plan"] = htmlspecialchars($tp_plan);
                        $data["img"] = $ruta_a_subir;
                        $data["uid"] = htmlspecialchars($uid);
                        $r = courses_modell::edit($data);
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

                    $ruta_a_subir = $rta_img;

                    $data["name"] = htmlspecialchars($name);
                    $data["description"] = validacion::validarinp($descripcion);
                    $data["tp_plan"] = htmlspecialchars($tp_plan);
                    $data["img"] = $ruta_a_subir;
                    $data["uid"] = htmlspecialchars($uid);
                    $r = courses_modell::edit($data);
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

    public function consult()
    {
        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "administrador") {
                extract($_GET);
                $pl = type_modell::read();
                $r = courses_modell::consult($uid);
                $idr = $r["tp_plan_id"];

                $tbl = "<div class='modal-dialog' role='document'>";
                $tbl .= " <div class='modal-content'>";
                $tbl .= "<div class='modal-header'>";
                $tbl .= "<h5 class='modal-title' id='exampleModalLabel'>cours edit Uid=" . $r["cours_uid"] . "</h5>";

                $tbl .= "<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>";
                $tbl .= "        <i class='tim-icons icon-simple-remove'></i>
                    </button>
                </div>";
                $tbl .= "<div class='modal-body'>";
                $tbl .= "  <form autocomplete='off' action='?controller=courses&action=insert' method='post' id='formuploadajax' enctype='multipart/form-data'>";
                $tbl .= "    <div class='form-group'>";
                $tbl .= "      <label>name</label>";
                $tbl .= "     <input type='text' class='form-control' id='name' value='" . $r["cours_name"] . "' name='name' placeholder='Name' required>
                        </div>";
                $tbl .= " <div class='form-group'>";
                $tbl .= "     <label>description</label>";
                $tbl .= "     <textarea name='description' class='form-control'  id='description' cols='30' rows='10' required> " . $r["cours_descrp"] . "</textarea>
                        </div>";
                $tbl .= " <div class='form-group'>";
                $tbl .= "     <label for='exampleFormControlSelect1'>Example select</label>";
                $tbl .= "     <select class='form-control' id='tp_plan' name='tp_plan'>";
                foreach ($pl as $v) {
                    $id = $v["tp_plan_id"];
                    $name = $v["tp_plan_name"];
                    if ($id == $idr) {
                        $tbl .= "<option value='$id' selected  style='color:black'>$name</option>";
                    } else {
                        $tbl .= " <option value='$id'  style='color:black'>$name</option>";
                    }
                }

                $tbl .= " </select>
                        </div>";
                $tbl .= "<button type='submit' class='btn btn-info'>Submit</button>
                    </form>
                </div>
    
            </div>
        </div>";
                if ($r > 0) {
                    echo json_encode(array("mensaje" => $tbl));
                } else {
                    echo json_encode(array("mensaje" => "error no fue encontrado el registro"));
                }
            } else {
                header("location: /proyecto_blessed?controller=home&action=profile");
            }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function to_list_name()
    {
        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "administrador") {
                extract($_POST);
                $r = courses_modell::consult_name($name);

                foreach ($r as $v) {
                    $uid = $v["cours_uid"];
                    $img = $v["img"];
                    $des = $v["cours_descrp"];
                    $name = $v["cours_name"];
                    $tbl = "<a href='?controller=chapters&action=index&uid=$uid'><div class='card text-center' id='cardd' style='float: left;height: 350px;  '>";
                    $tbl .= "<img class='card-img-top' src='$img' alt='Card image cap' >";
                    $tbl .= "<div class='card-body'>";
                    $tbl .= "<h4 class='card-title'>Card title</h4>";
                    $tbl .= "<p class='card-text'>$des</p><br>";

                    $tbl .= "</div> </div> </a>";
                }
                echo json_encode(array("mensaje" => $tbl));
            } else {
                header("location: /proyecto_blessed?controller=home&action=profile");
            }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function chapters_list()
    {
        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "estudiante") {
                $rtaa = user_modell::mdl_consult($_SESSION["uid"]);
                if ($rtaa["plan_exp_date"] == date("Y-m-d")) {
                    $this->view->renew();
                } else {
                    extract($_GET);
                    $ide = $_GET["uid"];
                    $this->view->cours_info = courses_modell::consult($ide);
                    $id = $_GET["ddsbq"];
                    $this->view->list_chapters = chapters_modells::list_chapters($id);
                    $this->view->count_chapters = chapters_modells::count_chapters($id);
                    $rta = chapters_modells::to_list($id);
                    $consul = courses_modell::consult($ide);
                    $count = chapters_modells::count($consul["cours_id"]);
                    $dato = test_modell::to_list($id);
                    $this->view->numero = test_modell::count($consul["cours_id"]);
                    ;
                    $posi = 0;
                    $tbl = " ";
                    $nu = 2;

                    foreach ($rta as $value) {
                        $uid = $value["chatp_uid"];
                        $video = $value["chatp_video"];
                        $name = $value["chapt_name"];
                        $description = $value["chapt_descrp"];
                        $dds = $value["chart_cours_id"];
                        $posi = $posi + 1;

                        $img = $value["img"];
                        $tbl .= "<a href='?controller=chapters&action=chapters&idu=$uid&acs=$dds&num=$nu&di=$id&udi=$ide' style='cursor:pointer;'>";

                        $tbl .= "<div class='vid'>";
                        $tbl .= "<div style='display: inline-block; position:relative'>";
                        $tbl .= "<img class='card-img-top' src='$img' style='width: 100px; height:70px;' alt='Card image cap'> ";
                        $tbl .= "<div style='display: inline-block; position:absolute; top:50%; left:50%; transform: translate(-50%, -50%) '>";
                        $tbl .= "<i class='bi bi-play-circle-fill' style='font-size: 40px; color:#242638;'></i>";
                        $tbl .= "</div>";
                        $tbl .= "</div>";
                        $tbl .= "<h3>$name</h3>";
                        $tbl .= "</div>";
                        $tbl .= "</a>";
                        $nu = $nu + 1;
                        foreach ($dato as $value) {
                            $uidd = $value["test_uid"];
                            if ($posi == $value["test_position"]) {


                                $tbl .= "<a href='?controller=test&action=index_ex&uid=$uidd&num=$nu&acs=$dds&di=$id&udi=$ide' style='cursor:pointer;'>";

                                $tbl .= "<div class='vid'>";
                                $tbl .= "<img class='card-img-top' src='public/assets/img/exam.png' style='width: 100px; height:70px;' alt='Card image cap'> ";
                                $tbl .= "</iframe>";
                                $tbl .= "<h3>" . $value["test_name"] . "</h3>";
                                $tbl .= "</div>";
                                $tbl .= "</a>";
                                $nu = $nu + 1;
                            }
                        }
                    }

                    $nota = 0;

                    foreach ($dato as $value) {
                        $a["user_id"] = $_SESSION["id"];
                        $a["test_id"] = $value["test_id"];
                        $test = test_modell::consult_test($a);


                        if ($test != false) {
                            if ($test["tu_note"] > 6) {
                                $nota++;
                            }
                        }
                    }


                    if ($nota == count($dato)) {
                        $this->view->nota = 1;
                    } else {
                        $this->view->nota = 0;
                    }


                    $this->view->d = $tbl;
                    $this->view->unir_contenido2("courses/list");
                }
            } else {
                header("location: /proyecto_blessed?controller=home&action=profile");
            }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }
}