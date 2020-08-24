<?php


namespace App\service\nkd;


use App\Gaz;
use App\Order;
use App\Quarter;
use Illuminate\Support\Collection;

class ChartService
{

    /**
     * IMPORTANT : All dataTab MUST BE IN  ORDER by $key, $label_tab and $value_tab
     * very important for Chart, delete all double proprely in the 2 tabs on Matching values
     * @param array $label_tab
     * @param array $value_tab
     * @return array
     */
    private static function deleteDoubleForChart(array $label_tab, array $value_tab):array
    {

        for($i=0; $i < count($label_tab); $i++)
        {
            if(isset($label_tab[$i+1]) && $label_tab[$i] === $label_tab[$i+1]){
                unset($value_tab[$i+1]);
            }
        }

        // remove double
        $label_tab = array_unique($label_tab);

        // tres important change les index et les met en ordre croissant <3 <3
        $label_tab = array_values($label_tab);
        $value_tab = array_values($value_tab);

        return [$label_tab, $value_tab];
    }



    /**
     * @param array $data Order tab
     * @return array
     */
    public static function benefitForChart(array $data, Collection $objectCollections=null):array
    {
        $label_tab=[];
        $data_tab=[];

        if($objectCollections===null){
            $dates = Order::orderBy('date_order')->get('date_order', 'id', 'quantity'); // Dates tab, optimised

        }else{
            $dates = $objectCollections; // Order table for get dates Tab
        }

        foreach($dates as $date):
            $sum_value=0;

            foreach($data as $order):
                if($date->date_order === $order->date_order){
                    $sum_value += sales_benefit($order);
                }
            endforeach;

            array_push($data_tab, $sum_value);
            array_push($label_tab, $date->date_order);
        endforeach;

        return ChartService::deleteDoubleForChart($label_tab, $data_tab);
    }


    /**
     * @param array $data Orders tab
     * @return array
     */
    public static function orderGazForChart(array $data):array
    {
        $label_tab=[];
        $data_tab=[];
        $gaz = Gaz::all(); // Gaz table

        foreach($gaz as $g):
            $count_value=0;

            foreach($data as $order):
                if($g->id === $order->gaz_id)
                    $count_value++;
            endforeach;
            array_push($data_tab, $count_value);
            array_push($label_tab, $g->name.'-'.$g->weight);
        endforeach;

        return ChartService::deleteDoubleForChart($label_tab, $data_tab);
    }

    /**
     * @param array $data Clients tab
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

        return ChartService::deleteDoubleForChart($label_tab, $data_tab);
    }

    /**
     * @param array $data client tab
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

        /**
         * You can return an object
         */
//        return new class($label_tab, $data_tab){
//            public $_labelname;
//            public $_data;
//            public function __construct($labelname, $data){
//                $this->_labelname=$labelname;
//                $this->_data=$data;
//            }
//        };

        return ChartService::deleteDoubleForChart($label_tab, $data_tab);
    }
}