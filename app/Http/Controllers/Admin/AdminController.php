<?php

namespace App\Http\Controllers\Admin;

use App\Consumable;
use App\User;
use App\Restaurant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

     public function __construct()
     {
       $this->middleware('auth');
     }

    public function index()
    {
      $consumable = Consumable::get();
      $restaurant = Restaurant::get();
      $user = User::get();

      return view('admin.index', compact('consumable', 'restaurant', 'user'));
    }

    public function show($id)
    {
      $restaurant = Restaurant::find($id);
      $consumable = Consumable::find($id);
      $user = User::find($id);

      return view('admin.index', compact('consumable', 'restaurant', 'user'));
    }
  }
