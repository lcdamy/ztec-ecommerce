@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (auth()->check())
                    <div class="card p-4 mb-2">
                        <div class="d-flex justify-content-between">
                            <div>Balance: <strong>100.00</strong>
                                <a href="/top"><button class="btn btn-primary">Top-up</button></a>
                            </div>
                            <div>Order:
                                <a href=""><button class="btn btn-primary">View Order</button></a>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">

                    @foreach ($products as $product)
                        <div class="col-4 mt-2">
                            <div>
                                <div class="card p-1">
                                    <img src="/storage/{{ $product->image }}" alt="" srcset="">
                                    <div class="d-flex justify-content-between">
                                        <div class="pl-1">
                                            <div>
                                                <strong>{{ $product->name }}</strong>
                                            </div>
                                            @if ($product->price != $product->discounted_price)
                                                <div>
                                                    Before:
                                                    <strong><del>{{ $product->price }}</del>
                                                        <sub>{{ $product->code }}</sub></strong>
                                                </div>

                                                <div>After: <strong>{{ $product->discounted_price }}
                                                        <sub>{{ $product->code }}</sub></strong>
                                                </div>
                                            @endif

                                            @if ($product->price == $product->discounted_price)
                                                <div>
                                                    <strong>{{ $product->price }}
                                                        <sub>{{ $product->code }}</sub></strong>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="m-1">
                                            <a href=""><button class="btn btn-success">Buy</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
