<?php


namespace App\service\nkd;


use App\Gaz;
use App\Quarter;

class ChartService
{


    public static function orderGazForChart(Array $data):array
    {
        $label_tab=[];
        $data_tab=[];
        $gaz = Gaz::all();

        foreach($gaz as $g):
            $count_value=0;

            foreach($data as $order):
                if($g->id === $order->gaz_id)
                    $count_value++;
            endforeach;
            array_push($data_tab, $count_value);
            array_push($label_tab, $g->name);
        endforeach;

        return [$label_tab, $data_tab];
    }

    /**
     * @param array $data
     * @return array
     */
    public static function clientGazForChart(Array $data):array
    {
        $label_tab=[];
        $data_tab=[];
        $gaz = Gaz::all();

        foreach($gaz as $g):
            $count_value=0;

            foreach($data as $client):
                if($g->name === $client->type_gaz)
                    $count_value++;
            endforeach;
            array_push($data_tab, $count_value);
            array_push($label_tab, $g->name);
        endforeach;

        return [$label_tab, $data_tab];
    }

    /**
     * @param array $data
     * @return array
     */
    public static function clientQuaterForChart(Array $data):array
    {
        $label_tab=[];
        $data_tab=[];
        $quaters = Quarter::all();

        foreach($quaters as $q):
            $count_value=0;

            foreach($data as $client):
                if($q->id === $client->quaters_id)
                    $count_value++;
            endforeach;
            array_push($data_tab, $count_value);
            array_push($label_tab, $q->name);
        endforeach;

//        return new class($label_tab, $data_tab){
//            public $_labelname;
//            public $_data;
//            public function __construct($labelname, $data){
//                $this->_labelname=$labelname;
//                $this->_data=$data;
//            }
//        };
        return [$label_tab, $data_tab];
    }
}