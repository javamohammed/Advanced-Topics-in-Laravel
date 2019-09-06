<?php
namespace App\strMixins;

class StrMixins {

    public function partNumber()
    {
        return function($number){
            return 'ABC-'.substr($number, 0, 3).'-'.substr($number, 3);
        };
    }
    public function prefixNumber()
    {
        return function ($number, $prefix = 'MPO') {
            return $prefix . '-' . $number;
        };
    }
}

