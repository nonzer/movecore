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
//    public $dataGaz;


    public function mount()
    {
        $this->dataClients= Customer::all();
        $orders= Order::all();
        $this->doughnutChart($this->dataClients);
        $this->barOrderChart($orders);
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



    public function render()
    {
        return view('livewire.nkd.chart.chart-client');
    }
}
