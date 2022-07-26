<?php

namespace App\Http\Controllers;

use App\Models\Restorant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RestorantController extends Controller
{
    public function index()
    {

        $restorants = Http::get('http://localhost:8082/restorant');
        $restorants = Restorant::all();
        return response()->json(['restorants' => $restorants]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nameRestorant' => 'required|string',
            'adress' => 'required|string',
            'hours' => 'required',
            'picture' => 'required',
        ]);

        $restorant = Restorant::create([
            'nameRestorant' => $request->nameRestorant,
            'adress' => $request->adress,
            'hours' => $request->hours,
            'picture' => $request->picture,
        ]);

        return response()->json(['restorant' => $restorant], 201);
    }
}
