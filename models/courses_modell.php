<?php

class courses_modell
{
    public static function register($data)
    {
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "INSERT INTO t_courses(cours_uid,cours_name,cours_descrp,cours_condt,tpc_plan_id,img)
        VALUES
        (?,?,?,1,?,?)";
        $p = $c->prepare($sql);
        $v = array(
            $data["uid"],
            $data["name"],
            $data["description"],
            $data["tp_plan"],
            $data["img"]
        );
        return $p->execute($v);
    }

    public static function to_list()
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_courses WHERE cours_condt = 1 ";
        $p = $c->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }

    public static function to_list_c()
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_courses WHERE cours_condt = 1 and tpc_plan_id =". $_SESSION["plan"] ;
        $p = $c->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }

    public static function delete($ide)
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $Sql = "UPDATE t_courses set cours_condt = 2  where cours_uid = ?";
        $p = $c->prepare($Sql);
        $vec = array($ide);
        return $p->execute($vec);
    }

    public static function consult($dato){
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_courses WHERE cours_uid = ? and cours_condt = 1";
        $p = $c->prepare($sql);
        $v=array($dato);
        $p->execute($v);
        return $p->fetch();
    }

    public static function edit($data){
        $obj = new connection;
        $c = $obj->getconnection();
        $Sql = "UPDATE t_courses set cours_name=?, cours_descrp= ? , tpc_plan_id=? , img=?  where cours_uid = ?";
        $p = $c->prepare($Sql);
        $vec = array(
            $data["name"],
        $data["description"],
        $data["tp_plan"],
        $data["img"],
        $data["uid"]
    );
        return $p->execute($vec);
    }
    
    public static function consult_name($dato){
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_courses WHERE cours_name like  ? ";
        $p = $c->prepare($sql);
        $v=array($dato);
        $p->execute($v);
        return $p->fetchAll();
    }

    public static function list_cours_user(){
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_courses WHERE tpc_plan_id = ? and cours_condt = 1  ";
        $p = $c->prepare($sql);
        $v=array($_SESSION["plan"]);
        $p->execute($v);
        return $p->fetchAll();
    }

    public static function register_ante($data)
    {
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "INSERT INTO t_ant_cap(uid,etiqueta,user_id)
        VALUES
        (?,?,?)";
        $p = $c->prepare($sql);
        $v = array(
            $data["uid"],
            $data["etiqueta"],
            $data["user_id"],
        );
        return $p->execute($v);
    }

    public static function edit_ante($data){
        $obj = new connection;
        $c = $obj->getconnection();
        $Sql = "UPDATE t_ant_cap set etiqueta=? where id = ?";
        $p = $c->prepare($Sql);
        $vec = array(
            $data["etiqueta"],
            $data["id"],
    );
        return $p->execute($vec);
    }

    public static function consult_ant(){
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_ant_cap WHERE user_id = ".$_SESSION["id"] ;
        $p = $c->prepare($sql);
        $p->execute();
        return $p->fetch();
    }


}
