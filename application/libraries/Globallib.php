<?php
class Globallib {

    var $CI;

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->load->library('session');
        $this->CI->load->model('settings/global_config_model', 'global_config_model');
    }

    function getAllowList($session_level) {
        $segs = $this->CI->uri->segment_array();
        // $segs = $this->CI->router->fetch_class();//."/".$this->CI->router->fetch_method();

        $arr = $segs[1] . "/" . $segs[2];

        $allowed = $this->CI->global_config_model->getPermissionsByIdMenu($session_level, $arr);
        $data['write_permission'] = ($allowed->user_add == "Y" ? $data['write_permission'] = $allowed->user_add : $data['write_permission'] = "");
        $data['update_permission'] = ($allowed->user_edit == "Y" ? $data['update_permission'] = $allowed->user_edit : $data['update_permission'] = "");
        $data['delete_permission'] = ($allowed->user_delete == "Y" ? $data['delete_permission'] = $allowed->user_delete : $data['delete_permission'] = "");
        $data['read_permission'] = ($allowed->user_view == "Y" ? $data['read_permission'] = $allowed->user_view : $data['read_permission'] = "");
        $data['link'] = $allowed->menu_link;

        return $data;
    }

//    function getAllowList($sign) {
//        $segs = $this->CI->uri->segment_array();
//        $session_level = $this->CI->session->userdata('userlevel');
//        $arr = "index.php/" . $segs[1] . "/" . $segs[2] . "/";
//        $allowed = $this->CI->globalmodel->getPermission($arr, $session_level);
//        //print_r($allowed);
//        if ($session_level == "") {
//            $reaction = "T";
//        } else {
//            if ($sign == "all") {
//                if ($allowed->view == "Y" || $allowed->add == "Y" || $allowed->edit == "Y" || $allowed->delete == "Y") {
//                    $reaction = "Y";
//                } else {
//                    $reaction = "T";
//                }
//            }
//            if ($sign == "view") {
//                $reaction = $allowed->view;
//            }
//            if ($sign == "add") {
//                $reaction = $allowed->add;
//            }
//            if ($sign == "del") {
//                $reaction = $allowed->delete;
//            }
//            if ($sign == "edit") {
//                $reaction = $allowed->edit;
//            }
//        }
//
//        return $reaction;
//    }

    function getUser() {
        $u = $this->CI->session->userdata('username');
        return $u;
    }

    function getUserById() {
        $u = $this->CI->session->userdata('userId');
        return $u;
    }

    function restrictLink($str) {
        $session_level = $this->CI->session->userdata('userlevel');
        $allowed = $this->CI->globalmodel->getPermission($str, $session_level);
        return $allowed;
    }

    function write_header($str) {
        for ($a = 0; $a < count($str); $a++) {
            echo "<th nowrap>$str[$a]</th>";
        }
    }

    function ubah_format($harga) {
        $s = number_format($harga, 2, ',', '.');
        return $s;
    }

    function ubah_format_awal($harga) {
        $s = explode(".", $harga);
        $k = implode($s, "");
        $k = explode(",", $k);
        $s = implode($k, ".");
        return $s;
    }

    function ubah_tanggal($tanggalan) {
        list ($tanggal, $bulan, $tahun) = explode("-", $tanggalan);
        $tgl = $tahun . "-" . $bulan . "-" . $tanggal;
        return $tgl;
    }

    function ubah_format_tanggal($tanggalan) {
        list ($tahun, $bulan, $tanggal) = explode("-", $tanggalan);
        $tgl = $tanggal . "-" . $bulan . "-" . $tahun;
        return $tgl;
    }

    function print_track() {
        $segs = $this->CI->uri->segment_array();
        if (count($segs) >= 2) {
            $arr = "index.php/" . $segs[1] . "/" . $segs[2] . "/";
            return $this->findRoot($arr);
        }
    }

    function findRoot($url) {
        $first = $this->CI->globalmodel->getName($url);
        if (substr($first->root, 0, 9) != "ddsubmenu") {
            $string = $first->root . " > " . $first->nama;
            $second = $this->CI->globalmodel->getName2($first->root);
            if (substr($second->root, 0, 9) == "ddsubmenu") {
                $fourth = $this->CI->globalmodel->getRoot($second->root);
                $string = $fourth->nama . " > " . $string;
            }
        } else {
            $string = $first->nama;
            $fourth = $this->CI->globalmodel->getRoot($first->root);
            $string = $fourth->nama . " > " . $string;
        }
        return $string;
    }

    function standard_date($tgl, $jam) {
        $tgl = 'DATE_RFC822';
        $jam = time();
    }

    function bulan($bln) {
        switch ($bln) {
            case 1:
                return "Januari";
                break;
            case 2:
                return "Februari";
                break;
            case 3:
                return "Maret";
                break;
            case 4:
                return "April";
                break;
            case 5:
                return "Mei";
                break;
            case 6:
                return "Juni";
                break;
            case 7:
                return "Juli";
                break;
            case 8:
                return "Agustus";
                break;
            case 9:
                return "September";
                break;
            case 10:
                return "Oktober";
                break;
            case 11:
                return "November";
                break;
            case 12:
                return "Desember";
                break;
        }
    }

    function terbilang($satuan) {
        $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh",
            "delapan", "sembilan", "sepuluh", "sebelas");
        if ($satuan < 12)
            return " " . $huruf[$satuan];
        elseif ($satuan < 20)
            return $this->terbilang($satuan - 10) . " belas";
        elseif ($satuan < 100)
            return $this->terbilang($satuan / 10) . " puluh" .
                    $this->terbilang($satuan % 10);
        elseif ($satuan < 200)
            return "seratus" . $this->terbilang($satuan - 100);
        elseif ($satuan < 1000)
            return $this->terbilang($satuan / 100) . " ratus" .
                    $this->terbilang($satuan % 100);
        elseif ($satuan < 2000)
            return "seribu" . $this->terbilang($satuan - 1000);
        elseif ($satuan < 1000000)
            return $this->terbilang($satuan / 1000) . " ribu" .
                    $this->terbilang($satuan % 1000);
        elseif ($satuan < 1000000000)
            return $this->terbilang($satuan / 1000000) . " juta" .
                    $this->terbilang($satuan % 1000000);
        elseif ($satuan >= 1000000000)
            echo"hasil terbilang tidak dapat di proses, nilai terlalu besar";
    }

}

?>