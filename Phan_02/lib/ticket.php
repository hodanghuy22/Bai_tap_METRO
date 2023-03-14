<?php
    class Ticket{
        public static function datVe($id_tuyen, $ga_len, $ga_xuong, $soluong, $sdt, $thanhtien){
            return DB::run_query('INSERT INTO `ticket`( `id_tuyen`, `ga_len`, `ga_xuong`, `soluong`, `sdt`, `thanhtien`, `ngay_dat`) VALUES (?,?,?,?,?,?,now())',[$id_tuyen, $ga_len, $ga_xuong, $soluong, $sdt, $thanhtien],1);
        }
        public static function getTicket($phone){
            if($phone==''){
                return DB::run_query('SELECT `id_ticket`, route.ten_tuyen, s1.ten_ga "ga_len", s2.ten_ga "ga_xuong", `soluong`, `sdt`, `thanhtien`, `ngay_dat` FROM `ticket` 
                JOIN route on route.id_tuyen = ticket.id_tuyen
                JOIN station s1 on s1.id_ga = ga_len
                JOIN station s2 on s2.id_ga = ga_xuong
                WHERE 1
                ORDER BY id_ticket',[],2);
            }
            return DB::run_query('SELECT `id_ticket`, route.ten_tuyen, s1.ten_ga "ga_len", s2.ten_ga "ga_xuong", `soluong`, `sdt`, `thanhtien`, `ngay_dat` FROM `ticket` 
            JOIN route on route.id_tuyen = ticket.id_tuyen
            JOIN station s1 on s1.id_ga = ticket.ga_len
            JOIN station s2 on s2.id_ga = ticket.ga_xuong
            WHERE ticket.sdt like ?
            ORDER by ticket.id_ticket',[$phone],2);
        }
    }
?>