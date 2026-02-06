<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggleFavorite($restaurantId)
    {
         if(auth()->user()->role != 'client') {
            return back()->with('error', 'Accès refusé');
        }
        auth()->user()->favorites()->toggle($restaurantId);
        return back()->with('success', 'Favori mis à jour');
    }

    public function index()
{
    $favorites = auth()->user()->favorites;
    return view('favorites.index', compact('favorites'));
}
}
