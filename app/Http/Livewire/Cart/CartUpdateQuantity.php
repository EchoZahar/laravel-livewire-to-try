<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class CartUpdateQuantity extends Component
{
    public $cartItems = [];

    public $quantity = 1;

    public function mount($item)
    {
        $this->cartItems = $item;

        $this->quantity = $item['quantity'];
    }

    public function updateCart()
    {
        \Cart::update($this->cartItems['id'], [
            'quantity' => [
                'relative' => false,
                'value' => $this->quantity
            ]
        ]);

        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart.cart-update-quantity');
    }
}
