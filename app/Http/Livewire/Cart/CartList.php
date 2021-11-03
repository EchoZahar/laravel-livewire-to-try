<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Cart;

class CartList extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];

//    public $cartItems = [];

    public function render()
    {
        return view('livewire.cart.cart-list', [
            'cartItems' => Cart::getContent(),
        ]);
    }

    public function removeCart($id)
    {
        Cart::remove($id);

        session()->flash('success', 'Item has removed !');
    }

    public function clearAllCart()
    {
        Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');
    }
}
