<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdatedClientRequest;
use App\Utils\Reply;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny',User::class);
        $clients = Client::all();
        return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',User::class);
        return view('clients.create');
    }
    
    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request, StoreClientRequest $storeClient)
    {
        $this->authorize('create',User::class);
        try {
            
            Client::create($storeClient->validated());
            return Reply::success("client created successfully", 200, route('clients.index'));
        } catch (\Exception $e) {
            return Reply::errorWithData("Unable to create records", 422, $e->getMessage());
        }
    }
    
    /**
     * Display the specified resource.
    */
    public function show(Client $client)
    {
        $this->authorize('specificView',User::class);
        return view('clients.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $this->authorize('update',User::class);
        return view('clients.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatedClientRequest $updatedvalidatedrequest, Client $client)
    {
        $this->authorize('update',User::class);
        try {
            $client->update($updatedvalidatedrequest->validated());
            return Reply::success("Client updated successfully", 200, route('clients.index'));
        } catch (\Exception $e) {
            return Reply::errorWithData("Unable to update record", $e->getMessage(), 422);
        }
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $this->authorize('delete',User::class);
        try {
            $client->delete();
            return Reply::success("Client deleted successfully", 200, route('clients.index'));
        } catch (\Exception $e) {
            return Reply::error("Unable to delete record", 422, route('clients.index'), $e->getMessage());
        }
    }
}
