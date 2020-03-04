<?php

namespace App\Http\Controllers\admin;

use Auth;
use App\User;
use App\Order;
use App\Consumable;
use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::get();

        return view('admin.user.index')
            ->with('user', $user);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
        	'first_name' => ['required', 'string', 'max:255'],
	        'last_name' => ['required', 'string', 'max:255'],
	        'address' => ['required', 'string', 'max:255'],
	        'city' => ['required', 'string', 'max:255'],
	        'zipcode' => ['required', 'string', 'max:255'],
	        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
	        'password' => ['required', 'string', 'min:6', 'confirmed'],
	    ]);

	    $user = new user([
			'first_name' => $request->get('first_name'),
	    	'last_name' => $request->get('last_name'),
		    'email'=> $request->get('email'),
        	'address' => $request->get('address'),
        	'city' => $request->get('city'),
        	'zipcode' => $request->get('zipcode'),
		    'password'=> bcrypt($request->get('password')),
	    ]);

        $user->save();

	    return redirect(route('admin.user.index'))->with('success', 'user has been added');

    }

    public function show($id)
    {
        $user = User::find($id);

        return view('admin.user.show')
        	->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.user.edit')
        		->with('user', $user);
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
        	'first_name' => ['required', 'string', 'max:255'],
          	'last_name' => ['required', 'string', 'max:255'],
          	'email' => ['required', 'string', 'email', 'max:255'],
	        'address' => ['required', 'string', 'max:255'],
	        'city' => ['required', 'string', 'max:255'],
	        'zipcode' => ['required', 'string', 'max:255'],
	    ]);

	    $user = User::find($id);
	    $user->first_name = $request->get('first_name');
	    $user->last_name = $request->get('last_name');
	    $user->email = $request->get('email');
        $user->address = $request->get('address');
        $user->city = $request->get('city');
        $user->zipcode = $request->get('zipcode');
	    $user->save();

	    return redirect(route('admin.user.index'))->with('success', 'Status has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      	$user = User::find($id);
     	$user->delete();

     	return redirect(route('admin.user.index'))->with('success', 'user has been deleted Successfully');
    }
    
  //   public function getProfile()
  //   {
		// $order = Auth::user()->order;

		// $order->transform(function($order, $key) {
		// 	$order->cart = unserialize($order->cart);
		// 	return $order;
		// });

		// return view('user.profile')->with('order', $order);
      
  //     // return view('admin.users.edit')
  //     //     ->with('user', $user);
  //   }
}
