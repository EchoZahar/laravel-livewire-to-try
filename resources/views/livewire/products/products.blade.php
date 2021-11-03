<div>
    @include('layouts.message')
    <div class="row justify-content-center">
        @foreach($products as $product)
            <div class="col-md-3 col-sm-12 mt-3">
                <div class="card">
                    <img src="https://dummyimage.com/640x640" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ Str::limit($product->title, 20) }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $product->type }}</h6>
                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                        <div class="text-center">{{ number_format($product->price, 2) }} RUB</div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                <a href="#" class="card-link">view</a>
                            </div>
                            <div class="col-md-8 col-sm-12 text-right">
                                    <button wire:click.prevent="addToCart({{ $product->id }})"
                                            class="btn btn-link"
                                            type="submit" >add to cart
                                    </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-md-4">
            <div class="card">
                    <div class="text-center">
                        count cart: <span class="{{ Cart::getTotalQuantity() > 0 ? 'text-success' : 'text-danger' }}">{{ Cart::getTotalQuantity() }}</span>
                    </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            {{ $products->links() }}
        </div>
    </div>
</div>
