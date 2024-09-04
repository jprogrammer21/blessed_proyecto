<?php
require_once "models/test_modell.php";
require_once "models/question_modell.php";
require_once "models/chapters_modells.php";
require_once "models/courses_modell.php";
require_once "models/user_modell.php";

class test_controller
{

    public function __construct()
    {
        if (isset($_SESSION["id"])) {
            $this->view = new  structure;
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function index()
    {
        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "administrador") {
                extract($_GET);
                $this->view->dato = test_modell::consult($uid);

                $this->view->unir_contenido("test/index");
            } else {
                header("location: /proyecto_blessed?controller=home&action=profile");
            }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }


    public function index_ex()
    {
        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "estudiante") {
                $rtaa=user_modell::mdl_consult($_SESSION["uid"]);
                if ($rtaa["plan_exp_date"] <= date("Y-m-d")) {
                    $this->view->renew();
                }else{
                extract($_GET);
                $this->view->dato = test_modell::consult($uid);
                $datos = test_modell::consult($uid);
                $this->view->rta = question_modell::list_q($datos["test_id"]);
                $h["di"] = $di;
                $h["udi"] = $udi;

                $this->view->h = $h;



                $iid  = $_GET["acs"];

                $rta = chapters_modells::to_list($iid);

                $dato = test_modell::to_list($iid);

                $posi = 0;
                $tbl = " ";
                $nu = 2;
                $ni = 1;
                $ruta = 0;
                $l = 1;


                foreach ($rta as $value) {
                    $uid = $value["chatp_uid"];

                    $dds = $value["chart_cours_id"];
                    $posi = $posi + 1;



                    $tbl .= "<a href='?controller=chapters&action=chapters&idu=$uid&acs=$dds&num=$nu&di=$di&udi=$udi'>";
                    if ($l == $num - 1) {
                        $uno = $l + 1;
                        $ruta_2 = "?controller=chapters&action=chapters&idu=$uid&acs=$dds&num=$uno&di=$di&udi=$udi";
                    }
                    if ($ni == $num) {
                        $uno = $ni + 1;
                        $ruta = "?controller=chapters&action=chapters&idu=$uid&acs=$dds&num=$uno&di=$di&udi=$udi";
                    }



                    $l = $l + 1;
                    $nu = $nu + 1;
                    $ni = $ni + 1;
                    foreach ($dato as  $value) {
                        $uidd = $value["test_uid"];
                        if ($posi == $value["test_position"]) {

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


                $this->view->unir_contenido2("test/index");
                }
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
            extract($_POST);
            $dato["uid"] = uniqid();
            $dato["name"] = htmlspecialchars($name_test);
            $dato["id_cours"] = htmlspecialchars($course_id);
            $dato["position"] = htmlspecialchars($number);
            $rta = test_modell::register($dato);
            if ($rta > 0) {
                echo json_encode(array("mensaje" => "registro exitoso", "icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => " no registrado", "icono" => "error"));
            }
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
            $rta = test_modell::delete($uid);
            if ($rta > 0) {
                echo json_encode(array("mensaje" => "registro eliminado", "icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => " no eliminado", "icono" => "error"));
            }
        } else{
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
            $rta = test_modell::consult($uid);
            $name = $rta["test_name"];
            $uid = $rta["test_uid"];
            $tbl = " ";


            $tbl .= "<div class='form-group'>";
            $tbl .= "<label>Nombre del examen</label>";
            $tbl .= "<input type='text' class='form-control' id='name_test' value='$name' name='name_test' placeholder='name test' required>";
            $tbl .= "</div>";
            $tbl .= "<input type='text' class='form-control' id='uid' value='$uid' name='uid' style='display:none' required>";
            $tbl .= "<div class='modal-footer'>";
            $tbl .= "<button type='submit' class='btn btn-secondary'>Actualizar</button>";
            $tbl .= "</div>";


            echo json_encode(array("mensaje" => $tbl));
        } else{
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
            extract($_POST);
            $dato["name"] = htmlspecialchars($name_test);
            $dato["uid"] = htmlspecialchars($uid);
            $rta = test_modell::update($dato);

            if ($rta > 0) {
                echo json_encode(array("mensaje" => "Registro editado", "icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => "Registro no editado", "icono" => "error"));
            }
        } else{
            header("location: /proyecto_blessed?controller=home&action=profile");
        }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function reg_exa_usu()
    {
        if (isset($_SESSION["id"])) {
        
            extract($_POST);

            $nota = 0;
            for ($i = 1; $i < $num + 1; $i++) {
                $var = "res" . $i;

                $numero = $_POST["$var"];
                $nota = $nota + $numero;
            }

            $nota = $nota / $num;
            $definitiva = $nota * 10;

            $dato["uid"] = uniqid();
            $dato["test_id"] = htmlspecialchars($test_id);
            $dato["date"] = date('Y-m-d');
            $dato["user_id"] =  htmlspecialchars($_SESSION["id"]);
            $dato["note"] = $definitiva;
            $dato["inten"] = 1;

            $rt = test_modell::consult_r($dato);

            if ($rt > 0) {
                $i = $rt["tu_inten"] + 1;
                $dato["inten"] = $i;
                $rta = test_modell::exa_usu_u($dato);
            } else {
                $rta = test_modell::exa_usu($dato);
            }



            if ($rta > 0) {
                echo json_encode(array("mensaje" => "examen resuelto ", "icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => "no se pudo resolver el examen", "icono" => "error"));
            }
        
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function consult_r()
    {
        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "estudiante") {
            extract($_POST);
            $dato["test_id"] = $id;
            $dato["user_id"] = $_SESSION["id"];

            $rta = test_modell::consult_r($dato);



            if ($rta > 0) {
                $inte = $rta["tu_inten"];
                if ($rta["tu_note"] > 6.0) {
                    $ress = "<div class='alert alert-success' role='alert'>
                has ganado el examen con una nota de " . round($rta["tu_note"], 2) . "
              </div>";
                } else {
                    $ress = "<div class='alert alert-danger' role='alert'>
                has perdido el examen con una nota de " . round($rta["tu_note"], 2) . " vuelve a intertarlo
              </div>";
                }
                echo json_encode(array("mensaje" => $ress, "inte" => "Numero de intentos realizados $inte"));
            } else {
                $ress = "<div class='alert alert-info' role='alert'>
            Aun no has resuelto el examen
          </div>";
                echo json_encode(array("mensaje" => $ress, "inte" => "Numero de intentos realizados 0 "));
            }
        } else{
            header("location: /proyecto_blessed?controller=home&action=profile");
        }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }
}
