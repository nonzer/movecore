<?php

if(!function_exists('generatePassword')){
    function generatePassword($lenght = 8){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $count = mb_strlen($chars);

        for ($i=0, $result=""; $i < $lenght; $i++){
            $index = rand(0, $count-1);
            $result .= mb_substr($chars, $index, 1);
        }

        return $result;
    }
}