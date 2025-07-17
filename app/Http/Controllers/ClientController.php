<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdatedClientRequest;
use App\Utils\Reply;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        // dd($clients);
        return view('clients.index',['clients'=>$clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClientRequest $storeClient)
    {

        try{
            // $data = [
            //     'contact_name'         => $request->contact_name,
            //     'contact_email'        => $request->contact_email,
            //     'contact_phone_number' => $request->contact_phone_number,
            //     'company_name'         => $request->company_name,
            //     'company_address'      => $request->company_address,
            //     'company_city'         => $request->company_city,
            //     'company_zip'          => $request->company_zip,
            //     'company_vat'          => $request->company_vat,
            // ];


            Client::create($storeClient->validated());
            return Reply::success("client created successfully",200);
        }
        catch(\Exception $e){
            return Reply::errorWithData("Unable to create records",$e,500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show',['client'=>$client]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
         return view('clients.edit',['client'=>$client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedClientRequest $updatedvalidatedrequest, Client $client)
    {
        try {
            $client->update($updatedvalidatedrequest->validated());
            return Reply::success("Client updated successfully", 200);
        } catch (\Exception $e) {
            return Reply::errorWithData("Unable to update record", $e, 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        return "client deleted successfully";
    }
}
