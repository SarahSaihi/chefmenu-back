<?php

namespace App\Http\Controllers;

use App\Models\restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class restaurantController extends Controller
{
    public function index()
    {

        $restaurants = Http::get('http://localhost:8080/restaurant');
        $restaurants = restaurant::all();
        return response()->json(['restaurants' => $restaurants]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'namerestaurant' => 'required|string',
            'adress' => 'required|string',
            'hours' => 'required',
            'picture' => 'required',
            'message' => 'required|string',
            'restorer_id' => 'required|integer',
        ]);

        $restaurant = restaurant::create([
            'namerestaurant' => $request->namerestaurant,
            'adress' => $request->adress,
            'hours' => $request->hours,
            'picture' => $request->picture,
            'message' => $request->message,
            'restorer_id' => $request->restorer_id,
        ]);

        return response()->json(['message' => 'Restaurant created.', 'restaurant' => $restaurant], 201);
    }
    /**
     * Récupération d'un contact
     */
    public function show($id)
    {
        $restaurant = restaurant::findOrFail($id);
        $restaurant->restorer;

        return response()->json(['restaurant' => $restaurant]);
    }

    public function update(Request $request, $id)
    {
        $restaurant = restaurant::findOrFail($id); // Récupération d'un restaurant par son id

        // Mise à jour des propriétés
        $restaurant->namerestaurant = $request->namerestaurant;
        $restaurant->adress = $request->adress;
        $restaurant->hours = $request->hours;
        $restaurant->picture = $request->picture;

        // Savegarde dans la base de données
        $restaurant->save();

        return response()->json(['restaurant' => $restaurant], 201);
    }
}
