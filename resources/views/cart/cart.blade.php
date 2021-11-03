@extends('layouts.app')
@section('content')
    <livewire:cart.cart-list />
{{--    @livewire('cart.cart-list')--}}
{{--    <div class="row justify-content-center">--}
{{--        <div class="col-md-10">--}}
{{--            @if(Cart::getTotalQuantity() > 0)--}}
{{--                <table class="table table-borderless">--}}
{{--                    <thead>--}}
{{--                    <tr>--}}
{{--                        <th colspan="5">Total add to cart: {{ Cart::getTotalQuantity()}}.</th>--}}
{{--                    </tr>--}}
{{--                    <tr>--}}
{{--                        <th scope="col">#</th>--}}
{{--                        <th scope="col">title</th>--}}
{{--                        <th scope="col">--}}
{{--                            <span>quantity</span>--}}
{{--                            <span>add</span>--}}
{{--                        </th>--}}
{{--                        <th scope="col">price</th>--}}
{{--                        <th>delete</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}
{{--                    <tbody>--}}
{{--                    @foreach($cartItems as $item)--}}
{{--                        <tr>--}}
{{--                            <th scope="row">--}}
{{--                                <a href="">--}}
{{--                                    <img src="https://dummyimage.com/640x640"--}}
{{--                                         width="20" alt="Thumbnail">--}}
{{--                                </a>--}}
{{--                            </th>--}}
{{--                            <td>--}}
{{--                                <a href="#" title="show product">{{ $item->name }}</a>--}}
{{--                                <p>{{ $item->type }}</p>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <form action="{{ route('cart.updateQuantity') }}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" name="id" value="{{ $item->id }}">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-4">--}}
{{--                                            <input type="number" name="quantity"--}}
{{--                                                   value="{{ $item->quantity }}"--}}
{{--                                                   class="form-control">--}}
{{--                                        </div>--}}
{{--                                        <div class="col-md-8 text-right">--}}
{{--                                            <button type="submit" class="btn btn-outline-info">обновить</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </form>--}}
{{--                            </td>--}}
{{--                            <td>{{ number_format($item->price, 2) . ' RUB' }}</td>--}}
{{--                            <td>--}}
{{--                                <form action="{{ route('cart.removeItem', $item->id) }}">--}}
{{--                                    @csrf--}}
{{--                                    <input type="hidden" value="{{ $item->id }}" name="id">--}}
{{--                                    <button type="button" class="btn btn-outline-danger">remove item</button>--}}
{{--                                </form>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                    <tfoot>--}}
{{--                    <tr>--}}
{{--                        <td colspan="4" class="text-right">--}}
{{--                            Total: <span class="text-black">{{ number_format(Cart::getTotal(), 2) . ' RUB' }}</span>--}}
{{--                            <form action="{{ route('cart.clearCart') }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <button class="btn btn-outline-danger">clear cart</button>--}}
{{--                            </form>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                    </tfoot>--}}
{{--                </table>--}}
{{--                <div class="text-right m-5">--}}
{{--                    <form action="{{ route('dial') }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        @foreach($cartItems as $item)--}}
{{--                            <input type="hidden" name="product_id[]" value="{{ $item->id }}">--}}
{{--                            <input type="hidden" name="quantity[]" value="{{ $item->quantity }}">--}}
{{--                        @endforeach--}}
{{--                        <input type="hidden" name="total_price" value="{{ number_format(Cart::getTotal(), 2) }}">--}}
{{--                        <input type="hidden" name="user_id" value="{{ auth()->user()->id ?? '' }}">--}}
{{--                        <button type="submit" class="btn btn-outline-success">get dial</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            @else--}}
{{--                <h6 class="text-center">nothing to show, add some items</h6>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
