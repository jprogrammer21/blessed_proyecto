<?php
require_once "models/user_modell.php";
require_once "models/courses_modell.php";
class home_controller{

    public function __Construct(){
            $this->view= new structure();
        
       
    }

    public function index(){
        $this->view->unir_contenido("page",false);
    
    }
    public function login(){
        if(isset($_SESSION["id"])){
            header("location: /proyecto_blessed?controller=home&action=profile");
        }else{
            $this->view->unir_login();
          }
    }

   
    public function profile(){
        if(isset($_SESSION["id"])){
            if($_SESSION["role"]=="administrador"){
                $this->view->link="home";
                $this->view->dato=user_modell::mdl_consult($_SESSION["uid"]);
                $this->view->unir_contenido("home/profile");

            }
            else if($_SESSION["role"]=="estudiante"){
                $rtaa=user_modell::mdl_consult($_SESSION["uid"]);
                if ($rtaa["plan_exp_date"] <= date("Y-m-d")) {
                    $this->view->renew();
                }
                else{
                $this->view->dato=user_modell::mdl_consult($_SESSION["uid"]);
                $this->view->cours=courses_modell::list_cours_user();
                $rta=courses_modell::consult_ant();
                if($rta>0){
                    $this->view->url=$rta;
                }
                else{
                    $this->view->url=0;
                }
               
                $this->view->unir_contenido2("home/index");
                }
                
            }
            
        }else{
            header("location: /proyecto_blessed?controller=home&action=login");
          }
       }

      
    
}