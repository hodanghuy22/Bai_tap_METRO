<?php
    class Route{
        public static function getAllRoute(){
            return DB::run_query('SELECT `id_tuyen`, `ten_tuyen`, `thoi_gian_hoat_dong`, `chieu_dai`, `gia_min`, `gia_ve` FROM `route` WHERE 1',[],2);
        }
    }
?>