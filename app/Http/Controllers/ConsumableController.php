<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use App\Consumable;
use App\Restaurant;
use Illuminate\Http\Request;

class ConsumableController extends Controller
{
    public function create()
    {
    	$category = Category::all();
    	return view('food.create')->with('category', $category);
    }

    public function store(Request $request)
    {
        $request->validate([
        'title'=>'required',
        'category_id'=>'required',
        'description'=>'required',
        'price'=>'required',
    ]);

        $consumable = new Consumable();
        
        $consumable->title = $request->title;
        $consumable->category_id = $request->category_id;
        $consumable->description = $request->description;
        $consumable->price = $request->price;

        // Auth::restaurant_id()->consumable()->save($consumable);

        $consumable->save();

        return redirect(route('restaurant.index'));
    }
}
