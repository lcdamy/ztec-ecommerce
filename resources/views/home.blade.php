@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (auth()->check())
                    <div class="card p-4 mb-2">
                        <div class="d-flex justify-content-between">
                            <div>Balance: <strong>{{ $balance }} <sub>{{ $currency }}</sub></strong>
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
                                            <a href="/order/{{ $product->id }}">
                                                <button class="btn btn-success" style="width: 70px;">
                                                    <i class="bi bi-bag-fill"></i>Buy
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row"> {{ $products->links() }}</div>
            </div>
        </div>
    </div>
@endsection
