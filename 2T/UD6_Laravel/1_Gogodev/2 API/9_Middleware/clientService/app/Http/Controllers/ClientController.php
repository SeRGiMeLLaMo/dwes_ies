<?php

// ClientController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Service;

class ClientController extends Controller {
    public function index() {
        return response()->json(Client::with('services')->get());
    }

    
    public function store(Request $request) {
        $client = Client::create($request->all());
        $client->services()->attach($request->services);
        return response()->json($client->load('services'));
    }


    public function show(Client $client) {
        return response()->json($client->load('services'));
    }


    public function update(Request $request, Client $client) {
        $client->update($request->all());
        $client->services()->sync($request->services);
        return response()->json($client->load('services'));
    }


    public function destroy(Client $client) {
        $client->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }



    public function attachServices(Request $request, Client $client) {
        $request->validate(['services' => 'required|array']);
        $client->services()->syncWithoutDetaching($request->services);
        return response()->json($client->load('services'));
    }


    public function addService(Client $client, Service $service) {
        $client->services()->attach($service);
        return response()->json($client->load('services'));
    }
}