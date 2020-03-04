<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Restaurant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $restaurant = Restaurant::get();

        return view('admin.restaurant.index')
            ->with('restaurant', $restaurant);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        	'name' => ['required', 'string', 'max:255'],
	        'description' => ['required', 'string', 'max:255'],
	        'address' => ['required', 'string', 'max:255'],
	        'city' => ['required', 'string', 'max:255'],
	        'zipcode' => ['required', 'string', 'max:255'],
	        'phone' => ['required', 'string', 'min:10'],
	    ]);

	  //   $restaurant = new Restaurant([
			// 'name' => $request->get('name'),
	  //   	'description' => $request->get('description'),
   //      	'address' => $request->get('address'),
   //      	'city' => $request->get('city'),
   //      	'zipcode' => $request->get('zipcode'),
   //      	'phone' => $request->get('phone'),
   //      	'user_id' => $request->get('user_id'),
	  //   ]);

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

	    return redirect(route('admin.restaurant.index'))->with('success', 'restaurant has been added');

    }

    public function show($id)
    {
        $restaurant = Restaurant::find($id);

        return view('admin.restaurant.show')
        	->with('restaurant', $restaurant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $restaurant = Restaurant::find($id);

        return view('admin.restaurant.edit')
        	->with('restaurant', $restaurant);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
        	'name' => ['required', 'string', 'max:255'],
	        'description' => ['required', 'string', 'max:255'],
	        'address' => ['required', 'string', 'max:255'],
	        'city' => ['required', 'string', 'max:255'],
	        'zipcode' => ['required', 'string', 'max:255'],
	        'phone' => ['required', 'string', 'min:10'],
	    ]);

	    $restaurant = Restaurant::find($id);
	    $restaurant->name = $request->get('name');
	    $restaurant->description = $request->get('description');
        $restaurant->address = $request->get('address');
        $restaurant->city = $request->get('city');
        $restaurant->zipcode = $request->get('zipcode');
	    $restaurant->phone = $request->get('phone');
	    $restaurant->save();

	    return redirect(route('admin.restaurant.index'))->with('success', 'Status has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      	$restaurant = Restaurant::find($id);
     	$restaurant->delete();

     	return redirect(route('admin.restaurant.index'))->with('success', 'restaurant has been deleted Successfully');
    }
}
