<?php 

        class coments_modell{
            
            public static function reg_coments($data){
                $obj =  new connection();
                $c   = $obj->getconnection();
                $sql = "INSERT INTO t_comments(comment_uid,comment,comment_date,coment_condt,com_chapters_id,com_user_id)
                Values
                (?,?,?,?,?,?)";
                $p= $c->prepare($sql);
                $v = array($data["uid"],$data["coment"],$data["com_date"],$data["com_condt"],$data["chapters_id"],$data["user_id"]);
                return $p->execute($v);
            }

            public static function list_coment($idu){
                $obj = new connection();
                $c = $obj->getconnection();
                $sql = "SELECT * FROM  t_chapter  inner join t_comments on com_chapters_id =   chapt_id  INNER JOIN t_user ON com_user_id = user_id  where chapt_id = ?";
                 $p = $c->prepare($sql);
                 $v=array($idu);
                 $p->execute($v);
                 return $p->fetchAll();
            }

            public static function list($uid){
                $obj = new connection();
                $c = $obj->getconnection();
                $sql = "SELECT * FROM   t_comments   where comment_uid = ?";
                 $p = $c->prepare($sql);
                 $v=array($uid);
                 $p->execute($v);
                 return $p->fetch();
            }

            public static function rep_coments($data){
                $obj =  new connection();
                $c   = $obj->getconnection();
                $sql = "INSERT INTO t_res_coment(res_com_uid,res_comment,
                                                res_com_date,res_com_cond,
                                                res_user_id,res_coment_id,res_chapters_id)
                Values
                (?,?,?,?,?,?,?)";
                $p= $c->prepare($sql);
                $v = array($data["uid"],$data["res_comment"],
                           $data["res_com_date"],$data["res_com_cond"], 
                           $data["res_user_id"],$data["res_coment_id"],$data["chapters_id"]);
                return $p->execute($v);
            }

            public static function list_res($id){
                $obj = new connection();
                $c = $obj->getconnection();
                $sql = "SELECT res_comment, res_com_date,user_name
                FROM  t_res_coment INNER JOIN t_user ON res_user_id = user_id
                INNER JOIN t_comments ON res_coment_id = coment_id
                WHERE res_coment_id = ?";
                 $p = $c->prepare($sql);
                 $v=array($id);
                 $p->execute($v);
                 return $p->fetchAll();
            }

            public static function count_res($id){
                $obj = new connection();
                $c   = $obj->getconnection();
                $sql = "SELECT COUNT(*) from t_res_coment WHERE res_coment_id = ?";
                $p = $c->prepare($sql);
                $v = array($id);
                $p->execute($v);
                return $p->fetch();
            }

        }


?>