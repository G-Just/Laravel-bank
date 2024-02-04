<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Client;

class AccountController extends Controller
{
    /**
     * Check if access authorized.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $accounts = [];
        foreach (Account::all('IBAN') as $account) {
            $accounts[] = $account->IBAN;
        }
        $number = $accounts[0] ?? '';
        while (in_array($number, $accounts) || $number === '') { // Ensures that generated IBAN is unique
            $number = '';
            foreach (range(1, 11) as $digit) {
                $number = $number . (string)rand(0, 9);
            }
            $IBAN = 'LT0099999' . $number;
        }

        $clients = Client::all()->sortBy('firstName');

        return view('accounts.create', ['clients' => $clients, 'IBAN' => $IBAN]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        $request->validate([
            'client_id' => 'numeric'
        ]);

        Account::create([...$request->all(), 'balance' => 0]);

        return redirect()->route('clients.list')->with('message', 'Account created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function transfer()
    {
        $accounts = Account::all();
        $clients = Client::all();

        return view('accounts.transfer', compact('accounts', 'clients'));
    }

    /**
     * Show the form for depositing money into the specified resource.
     */
    public function deposit(Client $client)
    {
        return view('accounts.deposit', compact('client'));
    }

    /**
     * Show the form for withdrawing money from the specified resource.
     */
    public function withdraw(Client $client)
    {
        return view('accounts.withdraw', compact('client'));
    }


    public function operation(UpdateAccountRequest $request)
    {
        $request->validate([
            'id' => 'required|string|numeric',
            'amount' => 'required|string|numeric',
            'type' => 'required|string'
        ]);

        $account = Account::find($request->id);
        $client = Client::find($account->client_id);

        if ($request->type === 'deposit') {
            $account->balance += $request->amount;
            $operation = 'deposited';
        }
        if ($request->type === 'withdraw') {
            if ($account->balance >= $request->amount) {
                $account->balance -= $request->amount;
            } else {
                return redirect()->route('accounts.withdraw', compact(['client']))->with('error', "Cannot withdraw more than available balance");
            }
            $operation = 'withdrawn';
        }

        $account->save();

        return redirect()->route('clients.show', compact(['client']))->with('message', "Money " . $operation . " successfully.");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        return view('accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        $request->validate([
            'IBAN' => 'required|string|size:20|unique:accounts',
        ]);

        $account->update($request->all());

        return redirect()->route('clients.show', $account->client_id)->with('message', 'Account details updated successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function delete(Client $client)
    {
        return view('accounts.delete', compact('client'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UpdateAccountRequest $request)
    {
        $account = Account::find($request->id);
        $client = $account->client_id;
        $account->delete();

        return redirect()->route('clients.show', $client)->with('message', 'Account deleted successfully.');
    }
}
