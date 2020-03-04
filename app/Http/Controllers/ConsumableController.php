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
    	$category = Category::get();
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
        $consumable->restaurant_id = $request->session()->get('restaurant_id');
        $consumable->category_id = $request->category_id;
        $consumable->description = $request->description;
        $consumable->price = $request->price;

        $consumable->save();

        return redirect(route('restaurant.show'));
    }

    public function update(Request $request, $id)
    {

        $consumable = Consumable::find($id);
        $consumable->title = $request->get('title');
        $consumable->description = $request->get('description');
        $consumable->price = $request->get('price');
        $consumable->save();

        return redirect(route('restaurant.show'))->with('success', 'Status has been updated');
    }
}
