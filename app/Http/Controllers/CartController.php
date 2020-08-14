<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{


    public function cartAdd(Request $request)
    {
        $product = Product::find($request->product_id);

        if($product) {
            //check weather have discount
            if ($product->discount) {
                $price = $product->selling_price - ($product->discount * $product->selling_price) / 100;
            } else {
                $price = $product->selling_price;
            }

            //check weather cart array have product or empty
            $cart = Session::has('cart') ? Session::get('cart') : [];
            //check product id already exists
            if (array_key_exists($product->id, $cart)) {
                $cart[$product->id]['qty']++;
            } else {
                $cart[$product->id] = [
                    'product_id' => $request->product_id,
                    'title' => $product->title,
                    'slug' => $product->slug,
                    'image' => $product->feature_image,
                    'qty' => (isset($request->qty)) ? $request->qty : 1,
                    'price' => $price,
                ];
            }
            session(['cart' => $cart]);

            $output = array(
                'status' => 'success',
                'msg' => Config::get('siteSetting.cart_success')
            );

        }else {
            $output = array(
                'status' => 'error',
                'msg' => Config::get('siteSetting.cart_error')
            );
        }

        return response()->json($output);

    }

    public function cartView()
    {
        $user_id = Auth::id();
        $getCart = Cart::where('user_id', $user_id)->get();

        return view('frontend.cart');
    }


    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
