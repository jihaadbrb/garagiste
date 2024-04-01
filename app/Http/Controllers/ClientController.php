<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client; // Assuming you have a Client model

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all(); // Retrieve all clients
        return view('clients.index', compact('clients'));
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phoneNumber' => 'required|string|max:255',
            // 'userID' => 'required',
        ]);

        $client = Client::create($validatedData);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function addclient()
    {
        return view('clients.addclient');
    }



public function destroy($id)
{
    $client = Client::findOrFail($id);
    $client->delete();

    // return redirect()->back()->with('success', 'Client deleted successfully.');
}

public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'address' => 'required|string',
            'phoneNumber' => 'required|string',
        ]);

        // Find the client by ID
        $client = Client::findOrFail($id);
        $client->update([
            'firstName'=>$request->firstName,
            'lastName'=>$request->lastName,
            'address'=>$request->address,
            'phoneNumber'=>$request->phoneNumber,
        ]);


        // Redirect back to the client index page with a success message
        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $clients = Client::where('firstName', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('lastName', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('phoneNumber', 'LIKE', '%' . $searchTerm . '%')
            ->get();

        return view('clients.index', compact('clients'));
    }
}
