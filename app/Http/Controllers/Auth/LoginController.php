<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('auth.edit')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
        ]);

        $user = User::find($id);
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->address = $request->get('address');
        $user->city = $request->get('city');
        $user->zipcode = $request->get('zipcode');
        $user->save();

        return redirect(route('home'))->with('success', 'User has been updated');
    }

    public function getProfile()
    {
      $order = Auth::user()->order;
      $order->transform(function($order, $key) {
          $order->cart = unserialize($order->cart);
          return $order;
      });
      
      return view('user.profile')->with('order', $order);
      
    }

    public function authenticated(Request $request, $user) {
      if($user->admin) {
        $this->redirectTo = '/admin';
      }
    }
}
