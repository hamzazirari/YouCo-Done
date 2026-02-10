<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        
        if(auth()->user()->role != 'admin') {
            return redirect()->route('restaurants.index')->with('error', 'Accès refusé');
        }

        $totalRestaurants = Restaurant::count();
        $totalUsers = User::count();
        $activeRestaurants = Restaurant::where('status', 'active')->count();
        $maintenanceRestaurants = Restaurant::where('status', 'maintenance')->count();

        return view('admin.dashboard', compact('totalRestaurants', 'totalUsers', 'activeRestaurants', 'maintenanceRestaurants'));
    }

    public function restaurants()
    {
        if(auth()->user()->role != 'admin') {
            return redirect()->route('restaurants.index')->with('error', 'Accès refusé');
        }

        $restaurants = Restaurant::with('user')->get();
        return view('admin.restaurants', compact('restaurants'));
    }

    public function toggleStatus($id)
    {
        if(auth()->user()->role != 'admin') {
            return back()->with('error', 'Accès refusé');
        }

        $restaurant = Restaurant::findOrFail($id);
        $restaurant->status = $restaurant->status == 'active' ? 'maintenance' : 'active';
        $restaurant->save();

        return back()->with('success', 'Status changé avec succès');
    }
}