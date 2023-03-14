<?php
    class DB{
        private static function connect_DB(){
            $server = 'localhost';
            $db='metro_lan_9';
            $us='root';
            $pas='';
            try{
                $con = new PDO("mysql:host=$server;dbname=$db;",$us,$pas,[PDO::MYSQL_ATTR_INIT_COMMAND => "set names utf8"]);
                $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $con;
            }
            catch(PDOException $e){
                $msg = $e->getMessage();
                return false;
            }
        }
        private static function get_type($val){
            switch(gettype($val)){
                case 'integer': return PDO::PARAM_INT;
                case 'boolean': return PDO::PARAM_BOOL;
                case 'NULL': return PDO::PARAM_NULL;
                default: return PDO::PARAM_STR;
            }
        }
        public static function run_query($q,$paras,$t){
            $con=DB::connect_DB();
            if($con==false){
                return false;
            }
            try{
                $h = $con->prepare($q);
                foreach($paras as $key=>$para){
                    $h->bindValue($key+1, $para,DB::get_type($para));
                }
                $h->execute();
                $r = false;
                switch($t){
                    case 1: $r=true;break;
                    case 2: $r = $h->fetchAll(PDO::FETCH_ASSOC); break;
                    case 3: $r = $con->lastInsertId();
                }
            }
            catch(PDOException $e){
                $msg = $e->getMessage();
                $r =  false;
            }
            $con = null;
            return $r;
        }
    }
?>