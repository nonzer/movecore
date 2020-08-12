<?php




if(!function_exists('genre')){
    function genre($customer){
        return ($customer->sex === 'F')? 'Mme': 'Mr';
    }
}



