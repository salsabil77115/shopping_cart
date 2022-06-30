<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\offer;
use Illuminate\Support\Facades\Session;
use App\Models\product;


class ProductController extends Controller
{
    //get all products that strored in db
    public function getIndex()
    {
        $products = Product::join('countries', 'products.country_id', '=', 'countries.id')->get(['products.*', 'countries.name as countryName']);

        return view('shop.index', ['products' => $products]);
    }

    //add product to my cart
    public function getAddToCart(Request $request, $id)
    {
        $discount = 0;
        $product = Product::find($id);
        $country = Country::find($product->country_id);
        $offer = offer::find($id);
        if ($offer) {
            $discount = $offer->discount_value;
        }
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $country);
        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
    }

    //get cart page view all products in my cart
    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice, 'Shipping' => $cart->Shipping, 'VAT' => $cart->VAT, 'Discounts' => $cart->discounts, 'total' => $cart->total]);
    }
    //remove one item from quantity single product 
    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }

    //remove all quantity for specific product in cart
    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('product.shoppingCart');
    }
    //call checkout page 
    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', ['total' => $total]);
    }
    //call stripe api but not working !!
    /*  public function postCheckout(Request $request)
    {
        if (!Session::has('cart')) {
            return redirect()->route('shop.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        Stripe::setApiKey('');
        try {
           Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'), // obtained with Stripe.js
                "description" => "Test Charge"
            ));
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    }*/
}
