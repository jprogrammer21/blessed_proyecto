<?php
require_once "models/coments_modell.php";
require_once "models/user_modell.php";
require_once "controller/validacion.php";

class comment_controller
{

   public function __construct()
   {
      if (isset($_SESSION["id"])) {
         $rtaa=user_modell::mdl_consult($_SESSION["uid"]);
        
            $this->view = new  structure;
         
   }else {
      header("location: /proyecto_blessed?controller=home&action=login");
    }
   }



   public function reg_coments()
   {
      if (isset($_SESSION["id"])) {
         if ($_SESSION['role'] == "estudiante" || $_SESSION['role'] == "administrador") {
            $rtaa=user_modell::mdl_consult($_SESSION["uid"]);
                if ($rtaa["plan_exp_date"] == date("Y-m-d")) {
                    $this->view->renew();
                }else{
         extract($_POST);
   
      $data["uid"] = uniqid();
      $data["coment"]    = validacion::validarinp($coment);
      $data["com_date"]  = date("y/m/d/");
      $data["com_condt"]  = 1;
      $data["chapters_id"]  =  htmlspecialchars($chapters_id);
      $data["user_id"]  = $_SESSION["id"];
      $r = coments_modell::reg_coments($data);
      if ($r > 0) {
         echo  "success";
      } else {
         echo "error";
      }
   }
} else{
   header("location: /proyecto_blessed?controller=home&action=profile");
}
      }
      else {
          header("location: /proyecto_blessed?controller=home&action=login");
        }
      
   }

   public function list_comment()
   { if (isset($_SESSION["id"])) {
      if ($_SESSION['role'] == "estudiante" || $_SESSION['role'] == "administrador" ) {
         $rtaa=user_modell::mdl_consult($_SESSION["uid"]);
                if ($rtaa["plan_exp_date"] == date("Y-m-d")) {
                    $this->view->renew();
                }else{
      extract($_GET);
      $id = $_GET["id"];
      $rta = coments_modell::list_coment($id);
$numero=1;

      $tbl = "";
      foreach ($rta as  $value) {
         $uid = $value["comment_uid"];
         $id = $value["coment_id"];
         $user_name = $value["user_name"];
         $date = $value["comment_date"];
         $coments = $value["comment"];
         $tbl .= "<div class='card card-chart' style='height: auto;  width: 100%   ;>";
         $tbl .= "<div class='card-header'>";
         $tbl .= "<div class='row'>";
         $tbl .= "<figure class='avatar' style='height: 50px; width:50px;  min-width: 50px; border-radius: 50%; overflow: hidden; margin-left: 12px; color:#03091e;'>";
         $tbl .= "<i class='bi bi-person' style='object-fit: cover; font-size: 50px; '></i>";
         $tbl .= "</figure>";
         $tbl .= "<div class='body' style='margin-left: 7px; margin-top:12px;'>";
         $tbl .= "<p style='font-weight: 700;'>$user_name</p>";
         $tbl .= "<p style='font-size: 15px;'>$date</p>";
         $tbl .= "</div>";
         $tbl .= "</div>";
         $tbl .= "<div class='card-body'>";
         $tbl .= "<div class='row' >";
         $tbl .= "<div class='com' style='width: 70%; float:right; margin-left: 30px;'>";
         $tbl .= "<p style='font-size: 12px;'>$coments</p>";
         $tbl .= "</div>";
         $tbl .= "</div>";
         $tbl .= "<div class='row' >";
         $tbl .= "<div style='widht:50%; margin-left:15px;'>";
         $tbl .= "<a href='?controller=comment&action=info_comments&uid=$uid' class='cresponse' data-toggle='modal' data-target='#Modalr'><i class='bi bi-reply-fill' style='margin-right:8px;'></i>Responder</a>";
         $tbl .= "</div>&nbsp;&nbsp;";
         $rta2 = coments_modell::list_res($id);
         $count = coments_modell::count_res($id);
         $tbl .="<div style='widht:50%;'>";
            $tbl.="<a class='accordion-button collapsed' style='color:#1f83e8; font-weight: 300;' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$numero' aria-expanded='false' aria-controls='collapseTwo'>$count[0]&nbsp;Respuestas</a>";
         
         $tbl .= "</div>";
         $tbl .= "</div>";
            foreach ($rta2 as $value) {
               $user = $value["user_name"];
               $date_r = $value["res_com_date"];
               $coment = $value["res_comment"];
               $tbl.="<div id='collapse$numero' class='accordion-collapse collapse' aria-labelledby='headingTwo' data-bs-parent='#accordionExample'>";
         $tbl.="<div class='accordion-body'>";
            $tbl .= "<div class='row'>";
            $tbl .= "<figure class='avatar' style='height: 50px; width:50px;  min-width: 50px; border-radius: 50%; overflow: hidden; margin-left: 12px; 		color:#03091e;'>";
            $tbl .= "<i class='bi bi-person' style='object-fit: cover; font-size: 50px; '></i>";
            $tbl .= "</figure>";
            $tbl .= "<div class='body' style='margin-left: 7px; margin-top:12px;'>";
            $tbl .= "<p style='font-weight: 700;'>$user</p>";
            $tbl .= "<p style='font-size: 15px;'>$date_r</p>";
            $tbl .= "</div>";
            $tbl .= "</div>";
            $tbl .= "<div class='row' style='margin-left: 15px;'>";
            $tbl .= "<div  class= 'comt'style='width: 70%; float:right; margin-left: 30px;'>";
            $tbl .= "<p style='font-size: 10px;'>$coment</p>";
            $tbl .= "</div>";
            $tbl .= "</div>";                      
         $tbl.="</div>";
         $tbl.="</div>";
         }
         $tbl .= "</div>";
         
         $tbl .= "</div>";
         $tbl .= "</div>";
         $numero++;
      }

      echo json_encode(array("mensaje" => $tbl));
   }
   } else{
      header("location: /proyecto_blessed?controller=home&action=profile");
  }
   }
   else {
       header("location: /proyecto_blessed?controller=home&action=login");
     }
     
   }


   public function info_comments()
   {
      if (isset($_SESSION["id"])) {
         if ($_SESSION['role'] == "estudiante" || $_SESSION['role'] == "administrador" ) {
            $rtaa=user_modell::mdl_consult($_SESSION["uid"]);
                if ($rtaa["plan_exp_date"] == date("Y-m-d")) {
                    $this->view->renew();
                }else{
         extract($_GET);
         $uid = $_GET["uid"];
         $rta = coments_modell::list($uid);
         $id  = $rta["coment_id"];
         $tbl = " ";
   
         
         $tbl .= "<input type='number' name='comment_id' id='comment_id' value='$id'  style='display:none;'>";
   
   
         echo json_encode(array("mensaje" => $tbl));
                }
      } else{
         header("location: /proyecto_blessed?controller=home&action=profile");
     }
      }
      else {
          header("location: /proyecto_blessed?controller=home&action=login");
        }
   }


   public function rep_coments()
   {
      if (isset($_SESSION["id"])) {
         if ($_SESSION['role'] == "estudiante" || $_SESSION['role'] == "administrador") {
            $rtaa=user_modell::mdl_consult($_SESSION["uid"]);
                if ($rtaa["plan_exp_date"] == date("Y-m-d")) {
                    $this->view->renew();
                }else{
         extract($_POST);
      $data["uid"] = uniqid();
      $data["res_comment"]    =validacion::validarinp($rep_coment);
      $data["res_com_date"]  = date("y/m/d/");
      $data["res_com_cond"]  = 1;
      $data["res_user_id"]  =  htmlspecialchars($_SESSION["id"]);
      $data["res_coment_id"]  = htmlspecialchars($comment_id);
      $data["chapters_id"]   = htmlspecialchars($chapters_id);
      $r = coments_modell::rep_coments($data);
      if ($r > 0) {
         echo  "success";
      } else {
         echo  "error";
      }
                }
   } else{
      header("location: /proyecto_blessed?controller=home&action=profile");
  }
      }
      else {
          header("location: /proyecto_blessed?controller=home&action=login");
        }
   }
}
