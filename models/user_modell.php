<?php

class user_modell
{
    

    public static function regist($data){
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "INSERT INTO t_user(user_uid,user_password,user_email,user_role,
        user_cond, user_name,user_surname,user_country,user_phone)
        VALUES
        (?,?,?,?,?,?,?,?,?)";
        $p = $c->prepare($sql);
        $v = array($data["uid"], hash('sha256',$data["password"]),
        $data["email"],$data["rol"],$data["user_cond"],$data["name"],
        $data["surname"],$data["country"],$data["number_phone"]);
        return $p->execute($v);
    }

    public static function search_name($argumento){
        $obj = new connection;
        $c   = $obj->getconnection();
        $sql = " SELECT * FROM t_user WHERE  
        user_surname like '$argumento%' or 
        user_name   like '$argumento%'  and user_cond = 1 ";
        $p = $c->prepare($sql);
        $p->execute();
        return $p->fetchALL();
    }

    // public static function list(){
    //     $obj = new connection;
    //     $c   = $obj->getconnection();
    //     $sql = " SELECT * FROM t_user WHERE  user_cond = 1 ";
    //     $p = $c->prepare($sql);
    //     $p->execute();
    //     return $p->fetchALL();
    // }

    public static function cant()
    {
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "SELECT * FROM t_user  WHERE user_cond = 1";
        $s = $c->prepare($sql);
        $s->execute();
        return $s->rowCount();
    }
    public static function paginacion($pagina,$limite){
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "SELECT * FROM t_user WHERE user_cond = 1 LIMIT :iniciar,:xpagina ";
        $s = $c->prepare($sql);
        $s->bindParam(':iniciar', $pagina,PDO::PARAM_INT);
        $s->bindParam(':xpagina', $limite,PDO::PARAM_INT);
        $s->execute();
        return $s->fetchALL();
    }
    public static function mdl_consult($datos)
    {
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "SELECT * FROM t_user INNER JOIN  t_plan ON t_user.user_id = t_plan.user_id INNER JOIN t_type_plan ON t_plan.tp_plan_id =t_type_plan.tp_plan_id WHERE t_user.user_uid=?";
        $s = $c->prepare($sql);
        $v = array($datos);
        $s->execute($v);
        return $s->fetch();
    }

    public static function mdldelete($datos)
    {
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "UPDATE t_user set user_cond =2 WHERE user_uid = ?";
        $s = $c->prepare($sql);
        $v = array($datos);
        return $s->execute($v);
    }

    public static function validate($data)
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_user  INNER JOIN t_plan ON t_user.user_id = t_plan.user_id
        where user_email = ? and  user_password = ?";
        $p  = $c->prepare($sql);
        $v = array($data["email"], hash('sha256', $data["password"]));
        $p->execute($v);
        return $p->fetch();
    }

    public static function edit_user($datos)
    {
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "UPDATE t_user set user_name =? , user_surname =?  WHERE user_uid = ?";
        $s = $c->prepare($sql);
        $v = array(
            $datos["name"],
            $datos["surname"],
            $_SESSION["uid"]
        );
        return $s->execute($v);
    }

    public static function edit_user_2($datos)
    {
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "UPDATE t_user set user_country =? , user_email =?,  user_phone = ?  WHERE user_id = ?";
        $s = $c->prepare($sql);
        $v = array(
            $datos["country"],
            $datos["email"],
            $datos["number"],
            $_SESSION["id"]
        );
        return $s->execute($v);
    }

    public static function vali_email($email){
    $obj = new connection;
    $c   = $obj->getconnection();
    $sql = "SELECT * FROM t_user where user_email = ? and user_cond = 1";
    $p  = $c->prepare($sql);
    $v  = array($email);
    $p->execute($v);
    return $p->fetch();
    }


    public static function insert_token($data){
        $obj = new connection;
        $c   = $obj->getconnection();
        $sql = "UPDATE t_user SET token = ? WHERE user_id = ?";
        $p = $c->prepare($sql);
        $v = array($data["token"],$data["user_id"]);
        return $p->execute($v);
    }


    public static function vali_token($token){
        $obj = new connection;
        $c   = $obj->getconnection();
        $sql = "SELECT * FROM  t_user  where token = ?";
        $p  = $c->prepare($sql);
        $v  = array($token);
        $p->execute($v);
        return $p->fetch();
    }
    public static function update_token($data){
        $obj = new connection;
        $c   = $obj->getconnection();
        $sql = "UPDATE t_user SET token = null  WHERE user_uid = ?";
        $p = $c->prepare($sql);
        $v = array($data);
        return $p->execute($v);
    }

    public static function recover_password($data){
        $obj = new connection;
        $c   = $obj->getconnection();
        $sql = "UPDATE t_user SET  user_password = ?, user_cond = ?  WHERE user_uid = ?";
        $p = $c->prepare($sql);
        $v = array( hash('sha256', $data["password1"]) ,$data["user_cond"],$data["user_uid"]);
        return $p->execute($v);
    }

    public static function consult($datos)
    {
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "SELECT * FROM t_user  WHERE user_uid=?";
        $s = $c->prepare($sql);
        $v = array($datos);
        $s->execute($v);
        return $s->fetch();
    }

   
}
