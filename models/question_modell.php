<?php

class question_modell
{
    public static function register($dato)
    {
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "INSERT INTO t_questions(quest_uid,questions,quest_condt,test_id,quest_response)
        VALUES
        (?,?,1,?,?)";
        $p = $c->prepare($sql);
        $v = array(
            $dato["uid"],
            $dato["question"],
            $dato["test_id"],
            $dato["response"]
        );
        return $p->execute($v);
    }

    public static function list_q($a){
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "SELECT * FROM t_questions WHERE test_id = ? AND quest_condt=1  ORDER BY RAND()";
        $p = $c->prepare($sql);
        $v = array($a);
        $p->execute($v);
        return $p->fetchAll();
        
    }

    public static function delete($ide)
    {
        $obj = new connection;
        $c = $obj->getconnection();
        $Sql = "UPDATE t_questions  set quest_condt = 2  where quest_uid = ?";
        $p = $c->prepare($Sql);
        $vec = array($ide);
        return $p->execute($vec);
    }
}
