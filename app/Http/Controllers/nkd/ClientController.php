<?php




namespace App\Http\Controllers\Nkd;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Imports\CustomerImport;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Customer::all();
        return view('nkd.client.clients',compact(['clients']));
    }

//    public function importExcel(Request $request){
//
//        Excel::import(new CustomerImport, redirect()->file('myfile')) ;
//        return redirect()->back();
//    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nkd.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $clt= Customer::whereId($id)->first();
        if($clt->orders->count() > 0){
            session()->flash('sms_error', "Le client <strong>$clt->name</strong> a plusieurs commandes enregistrées, vous ne pouvez le supprimer!");
            return redirect()->back();
        }

        $clt->delete();
        return redirect()->route('client.index');
    }
}
