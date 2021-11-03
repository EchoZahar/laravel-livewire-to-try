<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartList()
    {
//        $cartItems = Cart::getContent();
//        if ($cartItems->count() == 0) {
//            return  back()->withErrors(['message' => 'Please add some items']);
//        }
        return view('cart.cart'); //, compact('cartItems')
    }
//    public function addToCart(Request $request)
//    {
////        $product = Product::find($request->slug);
////        Cart::add($product->id, $product->title, $product->price, 1, array());
//
//        \Cart::add([
//            'id' => $request->id,
//            'name' => $request->name,
//            'price' => $request->price,
//            'quantity' => $request->quantity,
//            'attributes' => array(
//                'product_service' => $request->type,
////                'image' => $request->image,
//            )
//        ]);
//        return back()->with(['success' => "Product has successfully been added to shopping cart"]);
//    }
//
//    public function updateQuantity(Request $request)
//    {
//        Cart::update(
//            $request->id,
//            [
//                'quantity' => [
//                    'relative' => false,
//                    'value' => $request->quantity
//                ],
//            ]
//        );
//
//        return back()->with(['success' => 'Update successfully']);
//    }
//
//    public function removeItem(Request $request)
//    {
//        Cart::remove($request->id);
//        return back()->with(['success' => 'item removed']);
//    }
//
//    public function clearCart()
//    {
//        Cart::clear();
//        return back()->with(['warning' => 'Cart has successfully cleared, add are new items']);
//    }
}
