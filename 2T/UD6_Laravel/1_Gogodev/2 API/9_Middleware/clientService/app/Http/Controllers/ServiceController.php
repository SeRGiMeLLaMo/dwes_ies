<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller {

    
    public function index() {
        return response()->json(Service::with('clients')->get());
    }


    public function store(Request $request) {
        $service = Service::create($request->all());
        return response()->json($service->load('clients'));
    }


    public function show(Service $service) {
        return response()->json($service->load('clients'));
    }



    public function update(Request $request, Service $service) {
        $service->update($request->all());
        return response()->json($service->load('clients'));
    }



    public function destroy(Service $service) {
        $service->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}