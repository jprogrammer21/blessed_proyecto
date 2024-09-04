<?php

class test_modell
{

    public static function register($dato)
    {
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "INSERT INTO t_test(test_uid,test_name,test_condt,test_cours_id,test_position)
        VALUES
        (?,?,1,?,?)";
        $p = $c->prepare($sql);
        $v = array(
            $dato["uid"],
            $dato["name"],
            $dato["id_cours"],
            $dato["position"]
        );
        return $p->execute($v);
    }

    public static function to_list($a)
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_test  where  test_cours_id = ? and test_condt=1; ";
        $p = $c->prepare($sql);
        $v = array($a);
        $p->execute($v);
        return $p->fetchAll();
    }

    public static function delete($ide)
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $Sql = "UPDATE t_test  set test_condt = 2  where test_uid = ?";
        $p = $c->prepare($Sql);
        $vec = array($ide);
        return $p->execute($vec);
    }

    public static function consult($a)
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_test  where  test_uid = ? and test_condt=1; ";
        $p = $c->prepare($sql);
        $v = array($a);
        $p->execute($v);
        return $p->fetch();
    }

    public static function count($a)
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT COUNT(test_name) AS numberr FROM t_test  where  test_cours_id = ? and test_condt=1; ";
        $p = $c->prepare($sql);
        $v = array($a);
        $p->execute($v);
        return $p->fetch();
    }

    public static function update($dato)
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $Sql = "UPDATE t_test  set test_name= ?  where test_uid = ?";
        $p = $c->prepare($Sql);
        $vec = array(
            $dato["name"],
            $dato["uid"]
        );
        return $p->execute($vec);
    }

    public static function exa_usu($dato)
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $Sql = "INSERT INTO t_test_users (tu_uid,test_id,user_id,tu_date,tu_note,tu_condt,tu_inten)
        VALUES (?,?,?,?,?,1,?)
        ";
        $p = $c->prepare($Sql);
        $vec = array(
            $dato["uid"],
            $dato["test_id"],
            $dato["user_id"],
            $dato["date"],
            $dato["note"],
            $dato["inten"]
        );
        return $p->execute($vec);
    }

    public static function exa_usu_u($dato)
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $Sql = "UPDATE t_test_users SET tu_note=?, tu_date = ?, tu_inten=? WHERE test_id=? and user_id=?";
        $p = $c->prepare($Sql);
        $vec = array(

            $dato["note"],
            $dato["date"],
            $dato["inten"],
            $dato["test_id"],
            $dato["user_id"],
        );
        return $p->execute($vec);
    }

    public static function consult_r($a)
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_test_users  where  test_id = ? and user_id = ? and tu_condt=1; ";
        $p = $c->prepare($sql);
        $v = array(
            $a["test_id"],
            $a["user_id"]
        );
        $p->execute($v);
        return $p->fetch();
    }

    public static function consult_test($a)
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_test_users  where  test_id = ? and user_id = ? and tu_condt=1";
        $p = $c->prepare($sql);
        $v = array(
            $a["test_id"],
            $a["user_id"]
        );
        $p->execute($v);
        return $p->fetch();
    }
}
