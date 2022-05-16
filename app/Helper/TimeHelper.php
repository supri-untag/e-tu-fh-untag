<?php

namespace Supri\ETU\UNTAG\Helper;

class TimeHelper
{
    protected $default_time;

    private  $TimeNow;
    private  $HoursNow;

    public function __construct()
    {
        $this->default_time = date_default_timezone_set('Asia/Jakarta');;
    }

    public function setTimeServer()
    {
        return $this->default_time;
    }

    public function getDate() {
        return $this->TimeNow = date('Y-m-d');

    }
    public  function hoursNow() {
        return $this->hoursNow = date('H-i');
    }
    public static function roundTime($timestamp){
        $dif = time() - strtotime($timestamp);
        $timeOnsecond = $dif;
        $minute = round($dif/60);
        $hours = round($dif/(60*60));
        $day = round($dif/(60*60*24));
        $week = round($dif/(60*60*24*7));
        $month = round($dif/(60*60*24*7*4));
        $years = round($dif/(60*60*24*7*4*12));

        if ($timeOnsecond <= 60){
            $time = $timeOnsecond." detik";
        }else if ($minute <= 60) {
            $time = $minute.' menit';
        }else if ($hours <= 24) {
            $time = $hours.' Jam';
        }else if ($day  <= 7) {
            $time = $day.' hari';
        }else if ($week  <= 4) {
            $time = $week.' minggu';
        }
        else if ($month  <= 12) {
            $time = $month.' bulan';
        } else {
            $time = $years.' older';
        }
        return $time;
    }

}