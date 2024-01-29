<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Account;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all()->sortBy('lastName');
        $accounts = Account::all();
        return view('clients.list', compact(['clients', 'accounts']));
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
    public function store(StoreClientRequest $request)
    {
        $request->validate([
            'firstName' => 'required|string|min:3',
            'lastName' => 'required|string|min:3',
            'personalCode' => [
                'required',
                'unique:clients',
                'string',
                'size:11',
                function ($a, $value, $fail) { // personal code validation
                    if (strlen($value) === 11) {
                        if ($value[0] >= 1 && $value[0] <= 6) {
                            if (checkdate(substr($value, 3, 2), substr($value, 5, 2), substr($value, 1, 2))) {
                                $s = $value[0] * 1 + $value[1] * 2 + $value[2] * 3 + $value[3] * 4 + $value[4] * 5 + $value[5] * 6 + $value[6] * 7 + $value[7] * 8 + $value[8] * 9 + $value[9] * 1;
                                if ($s % 11 === 10) {
                                    $s = $value[0] * 3 + $value[1] * 4 + $value[2] * 5 + $value[3] * 6 + $value[4] * 7 + $value[5] * 8 + $value[6] * 9 + $value[7] * 1 + $value[8] * 2 + $value[9] * 3;
                                    if ($s % 11 !== 10 && $s % 11 != $value[10]) {
                                        $fail('Invalid Personal Code.');
                                    } elseif ($s % 11 != $value[10]) {
                                        $fail('Invalid Personal Code.');
                                    }
                                } elseif ($s % 11 != $value[10]) {
                                    $fail('Invalid Personal Code.');
                                }
                            }
                        }
                    }
                }
            ]
        ]);

        Client::create($request->all());

        return redirect()->route('clients')->with('message', 'Client created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        $accounts = Account::all()->where('client_id', $client->id);
        return view('clients.show', compact(['client', 'accounts']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact(['client']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        $request->validate([
            'firstName' => 'required|string|min:3',
            'lastName' => 'required|string|min:3',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.show', compact(['client']))->with('message', 'Client details updated successfully.');
    }

    /**
     * Display the specified resource removing confirmation.
     */
    public function delete(Client $client)
    {
        return view('clients.delete', compact(['client']));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        //TODO: check if the total account balance is 0, if not redirect back with message.
        // Else just delete and return to listing with a message.
    }
}
