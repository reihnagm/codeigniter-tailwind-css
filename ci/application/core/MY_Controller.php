<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Master_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function __remove_mask()
    {
        return str_replace("-", "", str_replace("_", "", $string));
    }

    public function __remove_currency($string)
    {
        return str_replace(".", "", str_replace("Rp ", "", $string));
    }

    public function __fnumber($string)
    {
        return number_format($string, 0, ",", ".");
    }

    public function __fnumber_currency($string)
    {
        return "Rp " . number_format($string, 0, ",", ".");
    }

    public function __get_user_name_session()
    {
        $login_session = $this->session->userdata("login_session");
        return $login_session["name"];
    }

    public function __get_user_password_session()
    {
        $login_session = $this->session->userdata("login_session");
        return $login_session["password"];
    }

    function terbilang($x)
    {
        $bilangan =
        [
            "",
            "Satu",
            "Dua",
            "Tiga",
            "Empat",
            "Lima",
            "Enam",
            "Tujuh",
            "Delapan",
            "Sembilan",
            "Sepuluh",
            "Sebelas"
        ];

        if ($x < 12)
            return " " . $bilangan[$x];
        elseif ($x < 20)
            return $this->terbilang($x - 10) . " Belas";
        elseif ($x < 100)
            return $this->terbilang($x / 10) . " Puluh" . $this->terbilang(fmod($x, 10));
        elseif ($x < 200)
            return " Seratus" . $this->terbilang($x - 100);
        elseif ($x < 1000)
            return $this->terbilang($x / 100) . " Ratus" . $this->terbilang(fmod($x, 100));
        elseif ($x < 2000)
            return " Seribu" . $this->terbilang($x - 1000);
        elseif ($x < 1000000)
            return $this->terbilang($x / 1000) . " Ribu" . $this->terbilang(fmod($x, 1000));
        elseif ($x < 1000000000)
            return $this->terbilang($x / 1000000) . " Juta" . $this->terbilang(fmod($x, 1000000));
        else
            return $this->terbilang($x / 1000000000) . " Milyar" . $this->terbilang(fmod($x, 1000000000));
    }




}
