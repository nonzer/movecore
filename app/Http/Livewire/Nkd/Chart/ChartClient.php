<?php

namespace App\Http\Livewire\Nkd\Chart;

use App\City;
use App\Customer;
use App\Order;
use App\service\nkd\ChartService;
use Livewire\Component;

class ChartClient extends Component
{
    public $clients;
    public $dataClients;
    public $cities;
    public $gaz;
    public $benefits;

    public $dateend;
    public $datebegin;


    public function mount()
    {
        $this->dataClients= Customer::all();
        $orders= Order::all();
        $this->doughnutChart($this->dataClients);
        $this->barOrderChart($orders);
        $this->benefitOrderChart();
//        $this->barChart($this->dataClients);
    }

    private function doughnutChart($_clients)
    {
        $_clients = ($_clients->filter()->all());
        $objReturn = ChartService::clientQuaterForChart($_clients);
        $this->clients = $objReturn;
    }

    private function barChart($_clients)
    {
        $_clients = ($_clients->filter()->all());
        $objReturn = ChartService::clientGazForChart($_clients);
        $this->gaz = $objReturn;
    }

    private function barOrderChart($_orders)
    {
        $_orders = ($_orders->filter()->all());
        $objReturn = ChartService::orderGazForChart($_orders);
        $this->gaz = $objReturn;
    }

    private function benefitOrderChart($date_begin=null, $date_end=null)
    {
        if($date_begin!==null && $date_end!==null){

            $dataOrders= Order::whereBetween('date_order',[$date_begin, $date_end])->get();
            $dataOrders= $dataOrders->filter()->all();
            $this->benefits = ChartService::benefitForChart($dataOrders);
        }else{

            $dataOrders= Order::all();
            $dataOrders= $dataOrders->filter()->all();
            $this->benefits = ChartService::benefitForChart($dataOrders);
        }
    }

    public function reload()
    {
        $this->benefitOrderChart($this->datebegin, $this->dateend);
        $this->render();
    }


    public function render()
    {
        return view('livewire.nkd.chart.chart-client');
    }
}
