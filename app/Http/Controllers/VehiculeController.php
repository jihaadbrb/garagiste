<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VehiculeController extends Controller
{
    public function index()
    {
        $vehicules = Vehicule::all();
        return view('vehicules.index', compact('vehicules'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuelType' => 'required|string|max:255',
            'registration' => 'required|string|max:255',
            'photos' => 'nullable|string', // Adjust as needed
            'clientID' => [
                'required',
                Rule::exists('clients', 'id')->where(function ($query) use ($request) {
                    $query->where('id', $request->clientID);
                }),
            ],
        ], [
            'clientID.exists' => 'The selected client does not exist.',
        ]);


    
        $vehicule = Vehicule::create($validatedData);

        return redirect()->route('vehicules.index')->with('success', 'Vehicule created successfully.');
    }

    public function destroy($id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->delete();

        // return redirect()->back()->with('success', 'Vehicule deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'fuelType' => 'required|string|max:255',
            'registration' => 'required|string|max:255',
            // 'photos' => 'nullable|string', // Adjust as needed
            'clientID' => 'required|exists:clients,id', 
        ]);


        $vehicule = Vehicule::findOrFail($id);

       
        $vehicule->update([
            'make'=>$request->make,
            'model'=>$request->model,
            'fuelType'=>$request->fuelType,
            'registration'=>$request->registration,
            'clientID'=>$request->clientID,
        ]);
        return redirect()->route('vehicules.index')->with('success', 'Vehicule updated successfully');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $vehicules = Vehicule::where('make', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('fuelType', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('registration', 'LIKE', '%' . $searchTerm . '%')
            ->get();

        return view('vehicules.index', compact('vehicules'));
    }
}
