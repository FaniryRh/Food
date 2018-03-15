<?php

namespace App\Http\Controllers;

use App\Http\Requests;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $commandessimples = \App\CommandesSimple::latest()->limit(5)->get(); 
        $commandesaveccomptes = \App\CommandesAvecCompte::latest()->limit(5)->get(); 
        $comptes = \App\Compte::latest()->limit(5)->get(); 
        $users = \App\User::latest()->limit(5)->get(); 

        return view('home', compact( 'commandessimples', 'commandesaveccomptes', 'comptes', 'users' ));
    }
}
