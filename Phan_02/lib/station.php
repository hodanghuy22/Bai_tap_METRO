<?php
    class Staion{
        public static function getStationByRoute($id){
            return DB::run_query('SELECT station.`id_ga`, `ten_ga`,sr1.stt,
            sr2.id_tuyen "tuyen_thuoc_ve" FROM `station`
            JOIN station_route sr1 on sr1.id_ga = station.id_ga and sr1.id_tuyen = ?
            JOIN station_route sr2 ON sr2.id_ga = 
            station.id_ga
            ORDER by sr1.stt',[$id],2);
        }
        public static function getStation($id){
            return DB::run_query('SELECT sr1.`id_ga`, `ten_ga`, sr1.stt FROM `station` 
            JOIN station_route sr1 ON sr1.id_ga = station.id_ga
            WHERE sr1.id_tuyen = ?
            ORDER by sr1.stt',[$id],2);
        }
    }
?>