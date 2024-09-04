<?php
require_once "models/type_modell.php";
require_once "controller/validacion.php";
class type_controller
{

    public function __construct()
    {
      
            $this->view = new  structure;
       
    }

    public function index()
    {
        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "administrador") {
                $this->view->link = "plans";
                $this->view->unir_contenido("type_plan/home");
            } else {
                header("location: /proyecto_blessed?controller=home&action=profile");
            }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function list_plan()
    {
        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "administrador") {
                $r = type_modell::read();
                $comp = " ";
                foreach ($r as  $value) {
                    $ui = $value["tp_plan_uid"];
                    $type_name = $value['tp_plan_name'];
                    $duration = $value['tp_plan_duration'];
                    $price = number_format($value['tp_plan_price']);
                    $comp .= "<a href='?controller=type&action=detail&idue=$ui'>";
                    $comp .= "<div class='card'  id='cardd' style='width: 300px; float:left; margin-left:10px;'>";
                    $comp .= "<img class='card-img-top' src='public/assets/img/logoc.jpg' alt='Card image cap' height='230'>";
                    $comp .= "<div class='card-body'>";
                    $comp .= "<center><table style='color:white;'>";
                    $comp .= "<tr>";
                    $comp .= "<th><b>Name:</b></th>";
                    $comp .= "<th><b>$type_name</b></th>";
                    $comp .= "<tr>";
                    $comp .= "<tr>";
                    $comp .= "<th><b>time:</b></th>";
                    $comp .= "<th><b>";
                    $comp .= ($duration == 1) ? "$duration Mes" : "$duration Meses" ;
                    $comp .= "</b></th>";
                    $comp .= "<tr>";
                    $comp .= "<tr>";
                    $comp .= "<th><b> Price: </b></th>";
                    $comp .= "<th><b>$price</b></th>";
                    $comp .= "<tr>";
                    $comp .= "</table></center>";
                    $comp .= "</div>";
                    $comp .= "</div>";
                }

                echo json_encode(array("mensaje" => $comp));
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
            $data["tp_uid"] = uniqid();
            $data["name_plan"]  = htmlspecialchars($name_plan);
            $data["duration"]   = htmlspecialchars($duration);
            $data["price"]     = $price;
            $data["conditions"] = 1;
            $data["descripcion"]  = validacion::validarinp($c);
           if (is_numeric($data["price"])) {
            $r = type_modell::register($data);
            if ($r > 0) {
                echo json_encode(array("icono" => "success"));
            } else {
                echo json_encode(array("icono" => "error"));
            }
           } else {
            echo json_encode(array("icono" => "n"));
           }
           
        } else{
            header("location: /proyecto_blessed?controller=home&action=profile");
        }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }
    public function detail()
    {
        if (isset($_SESSION["id"])) {
            if ($_SESSION['role'] == "administrador") {
            $ide = $_GET["idue"];
            $this->view->cours =  type_modell::corus_plan($ide);
            $this->view->datas = type_modell::load($ide);
            $this->view->unir_contenido("type_plan/detalle");
        } else{
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
            extract($_POST);
            $data["name_plan"]  = htmlspecialchars($name_plan);
            $data["duration"]   = htmlspecialchars($duration);
            $data["price"]     = $price;
            $data["tp_uid"] = htmlspecialchars($tp_uid);
            $data["descripcion"]  = validacion::validarinp($c);
            if (is_numeric($data["price"])) {
            $r = type_modell::update($data);
            if ($r > 0) {
                echo json_encode(array("icono" => "success"));
            } else {
                echo json_encode(array("icono" => "error"));
            }
        } else {
            echo json_encode(array("icono" => "n"));
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
            $ide = $_GET["idue"];
            $r = type_modell::delete($ide);
            if ($r > 0) {
                echo json_encode(array("mensaje" => "plan eliminado", "icono" => "success"));
            } else {
                echo json_encode(array("mensaje" => "plan no eliminado", "icono" => "error"));
            }
        } else{
            header("location: /proyecto_blessed?controller=home&action=profile");
        }
        } else {
            header("location: /proyecto_blessed?controller=home&action=login");
        }
    }

    public function list_pln()
    {

        $this->view->plans = type_modell::read();
        $this->view->plans();
    }

    public function consulta()
    {
    
            extract($_GET);

            $rta = type_modell::load($id);
        
    }
}
