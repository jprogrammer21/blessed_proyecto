<?php

use Dotenv\Parser\Value;

require_once "models/question_modell.php";
class question_controller
{

    public function __construct()
    {
        if (isset($_SESSION["id"])) {
            $this->view = new  structure;
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function register()
    {

        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "administrador") {
                extract($_POST);
                if ($num_ress >2 ){
                    for ($i = 1; $i < $num_ress; $i++) {
                        $response["ress"] = htmlspecialchars($_POST["ress$i"]);
                        $response["type"] = htmlspecialchars($_POST["type$i"]);
                        $json[$i - 1] = $response;
                    }
                    $resul = json_encode($json);
                    $dato["uid"] = uniqid();
                    $dato["question"] = htmlspecialchars($question);
                    $dato["test_id"] = htmlspecialchars($test_id);
                    $dato["response"] = $resul;
    
                    $rta = question_modell::register($dato);
    
                    if ($rta > 0) {
                        echo json_encode(array("mensaje" => "registro exitoso", "icono" => "success"));
                    } else {
                        echo json_encode(array("mensaje" => "capitulo no registrado", "icono" => "error"));
                    }
                    unset($_POST);
                }
                else {
                    echo json_encode(array("mensaje" => "deve de aver mas de una respuesta ", "icono" => "error"));
                }
               
            } else {
                header("location: /proyecto_blessed?controller=home&action=profile");
            }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function list_test()
    {
        if (isset($_SESSION["id"])) {
            extract($_POST);
            $rta = question_modell::list_q($id);
            $tbl = " ";
            $num = 1;
            foreach ($rta as $value) {
                $tbl .= "<div class='col-lg-12'>";
                $tbl .= "<div class='card'>";
                $tbl .= "<div class='card-header'>";
                $tbl .= "<h5 class='card-text'>question #$num</h5>";
                $tbl .= "<h3 class='card-title'>" . $value["questions"] . "</h3>";
                $tbl .= "</div>";
                $tbl .= "<div class='card-body'>";

                $resul = json_decode($value["quest_response"], true);
                foreach ($resul as $val) {
                    $tbl .= "<div class='form-check form-check-radio'>";
                    $tbl .= "<label class='form-check-label'>";
                    $tbl .= "<input class='form-check-input' type='radio' name='res' id='ress$num' value='" . $val["type"] . "'>";
                    $tbl .= " " . $val["ress"] . " ";
                    $tbl .= "<span class='form-check-sign'></span>";
                    $tbl .= " </label>";
                    $tbl .= " </div>";
                }

                $tbl .= "<h5 class='card-text text-right'>";

                $tbl .= "<a href='?controller=question&action=delete&uid=" . $value["quest_uid"] . "' class='delete_quest'> <button style='margin: 5px;'  class='btn btn-info btn-fab btn-icon btn-round'> <i class='tim-icons icon-trash-simple'></i> </button> </a> </h5>";
                $tbl .= " </div>";
                $tbl .= "</div>";
                $tbl .= "</div>";
                $num++;
            }

            echo json_encode(array("mensaje" => $tbl));
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function delete()
    {
        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "administrador") {
            extract($_GET);
            $rta = question_modell::delete($uid);
            if ($rta > 0) {
                echo json_encode(array("mensaje" => "Registro eliminado", "icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => "Registro no Eliminado", "icono" => "error"));
            }
            } else{
            header("location: /proyecto_blessed?controller=home&action=profile");
        }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }
}
