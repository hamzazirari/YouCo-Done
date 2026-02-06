<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    // Liste mes restaurants
    public function index()
    {
        $restaurants = Restaurant::where('user_id', auth()->id())->get();
        return view('restaurants.index', compact('restaurants'));
    }

    // Formulaire création
    public function create()
    {
        if(auth()->user()->role != 'restaurateur') {
            return back()->with('error', 'Accès refusé');
        }
        return view('restaurants.create');
    }

    // Sauvegarder
    public function store(Request $request)
    {
        if(auth()->user()->role != 'restaurateur') {
            return back()->with('error', 'Accès refusé');
        }

        Restaurant::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'ville' => $request->ville,
            'capacity' => $request->capacity,
            'cuisine' => $request->cuisine,
        ]);

        return redirect()->route('restaurants.index');
    }

    // Détails
    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
    }

    // Formulaire d'édition
    public function edit(Restaurant $restaurant)
    {
        if($restaurant->user_id != auth()->id()) {
            return back()->with('error', 'Accès refusé');
        }
        return view('restaurants.edit', compact('restaurant'));
    }

    // Modifier
    public function update(Request $request, Restaurant $restaurant)
    {
        if($restaurant->user_id != auth()->id()) {
            return back()->with('error', 'Accès refusé');
        }

        $restaurant->update([
            'name' => $request->name,
            'ville' => $request->ville,
            'capacity' => $request->capacity,
            'cuisine' => $request->cuisine,
        ]);

        return redirect()->route('restaurants.index');
    }

    // Supprimer
    public function destroy(Restaurant $restaurant)
    {
        if($restaurant->user_id != auth()->id()) {
            return back()->with('error', 'Accès refusé');
        }

        $restaurant->delete();
        return redirect()->route('restaurants.index');
    }

public function search(Request $request)
{
    $restaurants = Restaurant::when(request('ville'), function($q) {
            $q->where('ville', 'like', '%' . request('ville') . '%');
        })
        ->when(request('cuisine'), function($q) {
            $q->where('cuisine', 'like', '%' . request('cuisine') . '%');
        })
        ->paginate(request('per_page', 10));
    
    return view('restaurants.search', compact('restaurants'));
}

public function browse(){
    $restaurants = Restaurant::All();
    return view('restaurants.browse',compact('restaurants'));

}

}