<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Cart;
use App\User;
use App\Order;
use App\Category;
use App\Consumable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function AddToCart(Request $request, $id)
    {
        $consumable = Consumable::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($consumable, $consumable->id);
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function reduceByOne(Request $request, $id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $oldCart->reduceByOne($id);
        if (count($oldCart->items) > 0) {
            Session::put('cart', $oldCart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('shoppingcart');
    }

    public function RemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('shoppingcart');
    }


    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shopping-cart', ['consumables' => $oldCart->items, 'totalPrice' => $oldCart->totalPrice]);
    }


    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shoppingcart');
        }
        // dd($request->$oldCart);
        $oldCart = Session::get('cart');
        $user = User::get();
        $total = $oldCart->totalPrice;
        return view('checkout', ['total' => $total, 'user' => $user]);
    }
    public function postCheckout(Request $request)
    {
        $oldCart = Session::get('cart');
        $user = User::get();
        $total = $oldCart->totalPrice;
        if (!Session::has('cart')) {
            return redirect()->route('shoppingcart');
        }
        $oldCart = Session::get('cart');
        
        $order = new Order();
        $order->first_name = $request->get('first_name');
        $order->last_name = $request->get('last_name');
        $order->email = $request->get('email');
        $order->address = $request->get('address');
        $order->city = $request->get('city');
        $order->cart = serialize($oldCart);
        $order->user_id = Auth::id();
        $order->price = $request->get('price');

        $order->save();

        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Successfully purchased consumables!');
    }
}
