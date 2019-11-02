<?php
    date_default_timezone_set('Asia/Jakarta');
    if (!function_exists('bulan')) {
        function bulan(){
            $bulan = Date('m');
            switch ($bulan) {
                case 1:
                    $bulan = "Januari";
                    break;
                case 2:
                    $bulan = "Februari";
                    break;
                case 3:
                    $bulan = "Maret";
                    break;
                case 4:
                    $bulan = "April";
                    break;
                case 5:
                    $bulan = "Mei";
                    break;
                case 6:
                    $bulan = "Juni";
                    break;
                case 7:
                    $bulan = "Juli";
                    break;
                case 8:
                    $bulan = "Agustus";
                    break;
                case 9:
                    $bulan = "September";
                    break;
                case 10:
                    $bulan = "Oktober";
                    break;
                case 11:
                    $bulan = "November";
                    break;
                case 12:
                    $bulan = "Desember";
                    break;
                default:
                    $bulan = Date('F');
                    break;
            }
            return $bulan;
        }
    }
    
    if (!function_exists('tanggal')) {
        function tanggal() {
            $tanggal = Date("Y-m-d");
            return $tanggal;
        }
    }
    
    function convert_bulan(){
        return $convert = Date("d"). " " .bulan(). " " .Date("Y H:m:s A");
    }
?>