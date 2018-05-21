<?php

namespace App\Http\Controllers;

use App\Client;
use App\ClientHasService;
use App\ClientService;
use App\DocumentType;
use App\Local;
use App\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\DataTables;

class MasterClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$clients = Client::all();
        foreach($clients as $client) {
            $client->locales = $client->locals;
            $client->servicios = $client->services;

        }
        //dd($clients);
        $documentTypes = DocumentType::all();
        $services = Service::all();
        return view('master.client')
            ->with('clients', $clients)
            ->with('documentTypes', $documentTypes)
            ->with('services', $services);

    }

    public function store(Request $request) {

        $client = new Client();
        $client->identification_type_id = $request->input('cmbTypeId');
        $client->identification_number = $request->input('txtNumId');
        $client->bussiness_name = $request->input('txtBussinessName');
        $client->address = $request->input('txtAddress');
        $client->phone = $request->input('txtPhone');
        $client->cellphone = $request->input('txtCellphone');
        $client->email = $request->input('txtEmail');
        $client->contact = $request->input('txtContact');
        $client->position = $request->input('txtPosition');
        $client->quota = $request->input('txtQuota');
        $client->payment_deadline = $request->input('txtDeadlinePayment');
        $client->city = $request->input('txtCity');
        $client->department = $request->input('txtDepartment');
        $client->save();

        for ($i = 0; $i < Count($request->input('txtLocalName')); $i++) {
            $local = new Local();
            $local->client_id = $client->id;
            $local->name = $request->input('txtLocalName')[$i];
            $local->city = $request->input('txtLocalCity')[$i];
            $local->department = $request->input('txtLocalDepartment')[$i];
            $local->phone = $request->input('txtLocalPhone')[$i];
            $local->email = $request->input('txtLocalEmail')[$i];
            $local->contact = $request->input('txtLocalContact')[$i];
            $local->save();
        }

        foreach ($request->input('txtService') as $key => $value) {
            $clientService = new ClientService();
            $clientService->amount = $request->input('txtService')[$key];
            $clientService->client_id = $client->id;
            $clientService->service_id = $key;
            $clientService->save();
        }

        return redirect()->route('master_client');
    }

	/**
	 * Funcion que lista los clientes
	 *
	 * @param Request $request
	 * @return mixed
	 */
	public function listClients(Request $request){

	    $clients = Client::all();
	    return DataTables::of($clients)
		    ->addColumn('identification_type_id',function ($identification){
		        switch ($identification->identification_type_id){
			        case 1 :
			        	return 'Cedula de Ciudadania';
		            break;
			        case 2 :
						return 'Nit';
			        break;
			        case 3 :
						return 'Cédula de Extranjería' ;
			        break;

		        }
	    	})
		    ->addindexColumn()
            ->make(true);
    }
	/**
	 * Funcion que modifica los clientes
	 *
	 * @param Request $request
	 *
	 */
	public function updateMasterClient(Request $request){

		$articulo = Client::find($request->input('id'));
		$articulo->identification_type_id = $request->input('identification_type_id');
		$articulo->identification_number = $request->input('identification_number') ;
		$articulo->bussiness_name = $request->input('bussiness_name');
		$articulo->address = $request->input('address');
		$articulo->phone = $request->input('phone');
		$articulo->cellphone = $request->input('cellphone');
		$articulo->email =$request->input('Usua_Correo');
		$articulo->contact =$request->input('contact');
		$articulo->city =$request->input('city');
		$articulo->quota =$request->input('quota');
		$articulo->payment_deadline =$request->input('payment_deadline');
		$articulo->save();
		return redirect()->route('master_client');


	}


}
