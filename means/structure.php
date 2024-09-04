<?php
class structure
{
    public function unir_contenido($contenido, $load = true)
    {
        if ($load == true) {
            require_once "view/view_admin/layouts/header.php";
            require_once "view/view_admin/$contenido" . ".php";
            require_once "view/view_admin/layouts/footer.php";
        } else {
            require_once "view/$contenido" . ".php";
        }
    }

    public function unir_login()
    {
        require_once "view/login".".php";
    }

    public function unir_contenido2($contenido)
    {
        require_once "view/view_admin/layouts/header.php";
        require_once "view/view_student/$contenido" . ".php";
        require_once "view/view_admin/layouts/footer.php";

       
    }

    public function unir_contenido1($contenido)
    {

        require_once "view/view_admin/layouts/header.php";
        require_once "view/view_student/$contenido" . ".php";
            require_once "view/view_admin/layouts/footer.php";
    }

    public function certify(){
        require_once "certificado/informe.php";
    }

    public function plans(){
        require_once "view/plans".".php";
    }

    public function register_view(){
        require_once "view/register.php";
    }
    
    public function renew(){
        require_once "view/renew.php";
    }
}
