@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Product details</div>
                    <div class="row">
                        <div class="col-8 offset-2">

                            <div class="d-flex justify-content-between p-4">
                                <div><img src="/storage/{{ $product->image }}" class="w-100 pr-4"></div>
                                <div>
                                    <p>{{ $product->description }}</p>
                                    <div>
                                        <div><strong>{{ $product->name }}</strong> </div>

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
                                        <br>
                                        <buy-button product="{{ $product }}" balance="{{ $balance }}">
                                        </buy-button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
