<?php 

class plan_modell{

    public static function register($data){
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "INSERT INTO t_plan(plan_uid,plan_start_date,plan_exp_date, plan_cond,tp_plan_id,user_id)
        VALUES
        (?,?,?,?,?,?)";
        $p =$c->prepare($sql);
        $v = array($data["uid"],$data["plan_start_date"],$data["plan_exp_date"],$data["plan_cond"],$data["tp_plan_id"],$data["user_id"]);
        return $p->execute($v);
    }

    public static function consult2($datos)
    {
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "SELECT * FROM t_plan  plan_exp_date WHERE  =?";
        $s = $c->prepare($sql);
        $v = array($datos);
        $s->execute($v);
        return $s->fetch();
    }
}

?>