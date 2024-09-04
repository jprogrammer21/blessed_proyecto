<?php 
    class chapters_modells{
        
        public static function register($data){ 
        $obj = new connection;
        $c  = $obj->getconnection();
        $sql = "INSERT INTO t_chapter(chatp_uid,chapt_name,chapt_descrp,chatp_condt,chatp_video, chart_cours_id,img)
        VALUES
        (?,?,?,?,?,?,?)";
        $p = $c->prepare($sql);
        $v = array($data["uid"],$data["name_chapter"],
                $data["chapter_desc"],$data["est"],
                $data["code_chapter"],$data["course_id"], $data["img"]);
        return $p->execute($v); 
        }

        public static function to_list($a)
        {
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_chapter  where  chart_cours_id = ? and chatp_condt = 1 ";
        $p = $c->prepare($sql);
        $v = array($a);
        $p->execute($v);
        return $p->fetchAll();
        }
        public static function list_2($ide)
        {
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT * FROM t_chapter WHERE chatp_uid = ? and chatp_condt = 1 ";
        $p = $c->prepare($sql);
        $v =array($ide);
        $p->execute($v);
        return $p->fetch();
        }

          
        public static function edit($data){ 
            $obj = new connection;
            $c  = $obj->getconnection();
            $sql = "UPDATE  t_chapter set chapt_name = ?, chapt_descrp = ?, 
            chatp_video = ?, chart_cours_id = ? , img = ?  where chatp_uid = ? ";
            $p = $c->prepare($sql);
            $v = array($data["name_chapter"],
            $data["chapter_desc"],
            $data["code_chapter"],
            $data["courses_id"],
            $data["img"],
            $data["chapter_uid"]);
            return $p->execute($v); 
            }
        public static function delete($ide){
            $obj = new connection;
            $c = $obj->getconnection();
            $Sql = "UPDATE t_chapter  set chatp_condt = 2  where chatp_uid = ?";
            $p = $c->prepare($Sql);
            $vec = array($ide);
           return $p->execute($vec);
    }

    public static function count($ide){
        $obj = new connection;
        $c = $obj->getconnection();
        $sql = "SELECT COUNT(chapt_name) AS number
        FROM t_chapter
        WHERE chart_cours_id= ? and chatp_condt = 1;";
        $p = $c->prepare($sql);
        $v =array($ide);
        $p->execute($v);
        return $p->fetch();  
    }

    public static function list_chapters($data){
        $obj = new connection();
        $c = $obj->getconnection();
        $sql = "SELECT * FROM  t_chapter  where chart_cours_id = ? AND chatp_condt = 1  ";
         $p = $c->prepare($sql);
         $v=array($data);
         $p->execute($v);
         return $p->fetchAll();
    }

    public static function count_chapters($data){
        $obj = new connection();
        $c  = $obj->getconnection();
        $sql = "SELECT count(*) FROM t_chapter where chart_cours_id = ? and chatp_condt = 1 ";
        $p = $c->prepare($sql);
        $v=array($data);
        $p->execute($v);
        return $p->fetch();

    }
}
?>