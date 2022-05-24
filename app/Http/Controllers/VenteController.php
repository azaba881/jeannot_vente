<?php

namespace App\Http\Controllers;
use App\Models\Vente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class VenteController extends Controller 
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $vente = new Vente();
        $vente->produit = request('produit');
        $vente->nombre = request('nombre');
        $vente->prix = request('prix'); 
        $vente->caissier = Auth::user()->name.' | '.Auth::user()->prenom;
        $vente->save();
        return redirect('/home'); 
    }

    public function desactive($id)
    {        
        DB::table('users')
                     ->where('id', $id) 
                     ->update(['statut' => 'desactive']);          
        return dd('hello'); 
    }


    //
}
