<?php 

class type_modell{

    public static function register($data){
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "INSERT INTO t_type_plan(tp_plan_uid,tp_plan_name,tp_plan_duration,tp_plan_price,tp_plan_cond,tp_plan_description)
        VALUES
        (?,?,?,?,?,?)";
        $p =$c->prepare($sql);
        $v = array($data["tp_uid"],$data["name_plan"],$data["duration"],$data["price"],$data["conditions"],$data["descripcion"]);
        return $p->execute($v);
    }

    public static function read(){
        $obj = new connection;
        $c   = $obj->getconnection();
        $sql = "SELECT * from t_type_plan where tp_plan_cond = 1";
        $p   = $c->prepare($sql);
        $p->execute();
        return $p->fetchAll();
    }
    public static function load($ide){
        $obj = new connection;
        $c   = $obj->getconnection();
        $sql = "SELECT *from t_type_plan where tp_plan_uid = ?";
        $p   = $c->prepare($sql);
        $v   = array($ide);
        $p->execute($v);
        return $p->fetch();

    }

    public static function update($data){
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "UPDATE t_type_plan set tp_plan_name = ?, tp_plan_duration = ?, tp_plan_price = ?, tp_plan_description = ? where tp_plan_uid = ?";
        $p =$c->prepare($sql);
        $v = array($data["name_plan"],$data["duration"],$data["price"],$data["descripcion"],$data["tp_uid"]);
        return $p->execute($v);
    }

    public static function delete($ide){
            $obj = new connection;
            $c = $obj->getconnection();
            $Sql = "UPDATE t_type_plan set tp_plan_cond = 2  where tp_plan_uid = ?";
            $p = $c->prepare($Sql);
            $vec = array($ide);
           return $p->execute($vec);
    }

    public static function corus_plan($ide){
            $obj = new connection;
            $c = $obj->getconnection();
            $Sql = "SELECT  cours_name,cours_descrp, tpc_plan_id,img,tp_plan_id,tp_plan_description from t_courses inner join  t_type_plan on tp_plan_id = tpc_plan_id where tp_plan_uid = ? and  cours_condt = 1 ";
            $p = $c->prepare($Sql);
            $v = array($ide);
            $p->execute($v);
            return $p->fetchAll();
    }

    
    public static function reade($data){
        $obj = new connection;
        $c   = $obj->getconnection();
        $sql = "SELECT * from t_type_plan where tp_plan_uid = ?";
        $p   = $c->prepare($sql);
        $v = array($data);
        $p->execute($v);
        return $p->fetch();
    }
}   

?>