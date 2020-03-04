<?php

namespace App\Http\Controllers\Admin;

use App\Consumable;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsumableController extends Controller
{
    public function index()
    {
        $consumable = Consumable::get();

        return view('admin.consumable.index')
            ->with('consumable', $consumable);
    }

    public function create()
    {
    	$category = Category::get();
    	return view('admin.consumable.create')->with('category', $category);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);
        
        $consumable = new Consumable;
        $consumable->title = $request->title;
        $consumable->restaurant_id = $request->restaurant_id;
        $consumable->description = $request->description;
        $consumable->price = $request->price;
        $consumable->category_id = $request->category_id;
        $consumable->save();

        return redirect(route('admin.consumable.index'));
    }

    public function edit($id)
    {
        $consumable = Consumable::find($id);

        return view('admin.consumable.edit')
        	->with('consumable', $consumable);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
	        'title'=>'required',
	        'description'=>'required',
	        'price'=>'required',
	    ]);

	    $consumable = Consumable::find($id);
	    $consumable->title = $request->get('title');
	    $consumable->description = $request->get('description');
	    $consumable->price = $request->get('price');
	    $consumable->save();

	    return redirect(route('admin.consumable.index'))->with('success', 'Status has been updated');
    }
}
