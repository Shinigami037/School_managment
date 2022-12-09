<?php

namespace App\Helpers;

class Helper
{

    public static function IDGenerator($model, $trow, $length = 4, $prefix, $date, $cl, $class, $name)
    {
        $data = $model::orderBy('id', 'desc')->first();
        if (!$data) {
            $og_length = $length - 1;
            $last_number = '1';
        } else {
            $code = (int)(substr($data->$trow, strlen($prefix) + 2 + strlen($cl) + strlen($class) + strlen($name)));
            $actial_last_number = ($code / 1) * 1;
            if ($actial_last_number == 0) {
                $actial_last_number += 1;
            }
            $increment_last_number = ((int)$actial_last_number) + 1;
            $last_number_length = strlen($increment_last_number);
            $og_length = $length - $last_number_length;
            $last_number = $increment_last_number;
        }
        $zeros = "";
        for ($i = 0; $i < $og_length; $i++) {
            $zeros .= "0";
        }
        return $prefix . $date . $cl . $class . $name . $zeros . $last_number;
    }
    public static function LastNumberGenerator($value, $class, $length)
    {
        $code = (int)(substr($value, 10 + strlen($class)));
        $actial_last_number = ($code / 1) * 1;
        if ($actial_last_number == 0) {
            $actial_last_number += 1;
        }
        $last_number_length = strlen($actial_last_number);
        $og_length = $length - $last_number_length;
        $zeros = "";
        for ($i = 0; $i < $og_length; $i++) {
            $zeros .= "0";
        }
        return  $zeros . $actial_last_number;
    }
}
