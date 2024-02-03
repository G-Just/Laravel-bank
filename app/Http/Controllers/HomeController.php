<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $accounts = Account::all();
        $clients = Client::all();
        $emptyClients = $clients->count() - Client::whereHas('accounts')->count();
        return view('home', compact(['accounts', 'clients', 'emptyClients']));
    }
}
