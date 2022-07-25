<?php

namespace App\Http\Controllers;

use App\Models\Restorer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RestorerController extends Controller
{
    public function index()
    {

        $restorers = Http::get('http://localhost:8082/inscription');
        $restorers = Restorer::all();
        return response()->json(['restorers' => $restorers]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $restorer = Restorer::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json(['restorer' => $restorer], 201);
    }
}
