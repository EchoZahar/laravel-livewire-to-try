<?php

namespace App\Http\Livewire\Products;

use App\Events\CartCountEvent;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Products extends Component
{
    use WithPagination;

    public $productId, $count = 0;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['addToCart' => '$refresh'];

    public function render()
    {
        return view('livewire.products.products', [
            'products' => Product::orderBy('type')->paginate(4),
        ]);
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        $cart = \Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(
                'type' => $product->type,
            )
        ]);

        if ($cart) {
            session()->flash('success', 'add to cart, thanks !');
//            return redirect()->to('/')->with(['success' => 'add to cart, thanks !']);
        }
    }
}
