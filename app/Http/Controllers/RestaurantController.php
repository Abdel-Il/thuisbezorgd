<?php

namespace App\Http\Controllers;

use Auth;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
    	$restaurant = Restaurant::where('user_id', Auth::id())->get();
    	return view('restaurant.index')->with('restaurant', $restaurant);
    }


    public function show($id)
    {
    	$restaurant = Restaurant::find();
    	return view('restaurant.index')->with('restaurant', $restaurant);
    }

    public function create()
    {
    	$restaurant = Restaurant::all();
    	return view('restaurant.register')->with('restaurant', $restaurant);
    }

    public function store(Request $request)
    {
        $request->validate([
        'name'=>'required',
        'description'=>'required',
        'address'=>'required',
        'city'=>'required',
        'zipcode'=>'required',
        'phone'=>'required',
    ]);

        $restaurant = new Restaurant();
        
        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->address = $request->address;
        $restaurant->city = $request->city;
        $restaurant->zipcode = $request->zipcode;
        $restaurant->user_id = $request->user_id;
        $restaurant->phone = $request->phone;

        Auth::user()->restaurant()->save($restaurant);

        $restaurant->save();

        return redirect(route('restaurant.index'))->with('restaurant', $restaurant);
    }

    public function edit($id)
    {
        $restaurant = Restaurant::find($id);

        return view('restaurant.edit')->with('restaurant', $restaurant);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'address'=> 'required',
            'city'=> 'required',
            'zipcode'=> 'required',
            'phone'=> 'required',
        ]);

        $restaurant = Restaurant::find($id);
        $restaurant->name = $request->get('name');
        $restaurant->address = $request->get('address');
        $restaurant->city = $request->get('city');
        $restaurant->zipcode = $request->get('zipcode');
        $restaurant->phone = $request->get('phone');
        $restaurant->save();

        return redirect(route('restaurant.index'))->with('success', 'Restaurant has been updated');
    }

}
