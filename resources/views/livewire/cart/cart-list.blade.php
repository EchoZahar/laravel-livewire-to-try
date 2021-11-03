<div class="row justify-content-center">
    @if(Cart::getTotalQuantity() > 0)
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                            <th colspan="5">Total cart items: {{ Cart::getTotalQuantity() }}.</th>
                        </tr>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">title</th>
                            <th scope="col">quantity</th>
                            <th scope="col">price for item</th>
                            <th scope="col">total item price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <img src="https://dummyimage.com/640x640" width="20" alt="Thumbnail">
                                </td>
                                <td>
                                    {{ $item->name }}
                                    <p>{{ $item->type }}</p>
                                </td>
                                <td>
                                    <livewire:cart.cart-update-quantity :item="$item" :key="$item['id']"/>
                                </td>
                                <td>
                                    {{ number_format($item['price'], 2) . ' RUB' }}
                                </td>
                                <td>
                                    {{ number_format($item['price'] * $item['quantity'], 2) . 'RUB' }}
                                </td>
                                <td>
                                    <button wire:click.prevent="removeCart('{{ $item->id }}')"
                                            class="btn btn-outline-secondary"
                                    >remove item</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="text-right">
                        Total price: <strong class="text-black">{{ number_format(Cart::getTotal(), 2) . ' RUB' }}</strong>
                        <button wire:click.prevent="clearAllCart" class="btn btn-outline-danger">clear cart</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body mt-1">
                    <div class="text-center">
                        <form action="{{ route('dial') }}" method="POST">
                            @csrf
                            @foreach($cartItems as $item)
                                <input type="hidden" name="product_id[]" value="{{ $item->id }}">
                                <input type="hidden" name="quantity[]" value="{{ $item->quantity }}">
                            @endforeach
                            <input type="hidden" name="total_price" value="{{ number_format(Cart::getTotal(), 2) }}">
                            <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">
                            <button type="submit" class="btn btn-outline-success">get dial</button>
                        </form>
{{--                        <button class="btn btn-outline-success">add deal</button>--}}
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-12 text-center">
            <span>cart is empty, please add something item: <a href="/"> show me </a></span>
        </div>
    @endif
</div>
