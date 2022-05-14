<?php

namespace App\Http\Controllers;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $vente = DB::table('ventes') 
                 ->where('statut', 'active')
                 ->get();
        $ut = DB::table('users')
                 ->get();
        $utilisateur=count($ut);
        $stavent=count($vente);
        
        return view('home',compact(['vente',$vente],['utilisateur',$utilisateur],['stavent',$stavent]));
    }

    public function user()
    {
        $user = DB::table('users') 
                 ->get();
        return view('user',compact('user',$user));
    }
}
