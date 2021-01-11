<?php

namespace App\Services;

class CheckFormData
{
    public static function checkGender($data)
    {
        if ($data->gender === 0) {
            return "男性";
        }
        if ($data->gender === 1) {
            return "女性";
        }
    }

    public static function checkAge($data)
    {
        if ($data->age === 1) {
            return "～19歳";
        }
        if ($data->age === 2) {
            return "20～29歳";
        }
        if ($data->age === 3) {
            return "30～39歳";
        }
        if ($data->age === 4) {
            return "40～49歳";
        }
        if ($data->age === 5) {
            return "50～59歳";
        }
        if ($data->age === 6) {
            return "60歳～";
        }

    }


}
