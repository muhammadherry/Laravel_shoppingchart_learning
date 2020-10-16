<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\cart;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use Session;
use Stripe\Charge;
use Stripe\Stripe;
class ProductController extends Controller
{
    
    public function index()
    {
        $products = products::all();
        return view('shop.index',['products'=>$products]);
    }

    public function getaddcart(Request $request,$id)
    {
        $products = products::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart'):null;
        $cart = new cart($oldCart);
        $cart -> add($products,$products->id);

        $request->session()->put('cart',$cart);
        return redirect()->route('product.index');
    }

    public function getcart()
    {
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public function getcheckout()
    {
        if(!Session::has('cart')){
            return view ('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout',['total'=>$total]);
    }

    public function postcheckout(Request $request)
    {                               
        if(Session::has('cart')){
            return redirect()->route('shop.shoppingcart');
        }
        $oldCart = Session::get('cart');
        $cart = new cart($oldCart);

        Stripe::setApiKey('sk_test_51Gu7CJEmfXiqppLeftLT0TgM0QAoL7HdRM871OcAyVNWU401q0aMcrjy00cJkeqvMayyFY2XfGdFAHQDvz3nrbZm00iZSd1QNo');
        try{
            Change:create(array(
                "amount"=>$cart->totalPrice * 100,
                "currency"=>"usd",
                "source"=>$request->input('stripeToken'),
                "description"=>"Test Charge"
            ));
        }catch(\Exception $e){
            return redirect()->route('checkout')->with('error',$e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('product.index')->with('success','Successfully purchase products');
    }

    public function destroy($id)
    {
        //
    }
}
