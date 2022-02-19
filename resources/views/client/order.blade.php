@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>Product details</div>
                        <div>
                            <a href="/">
                                <button class="btn btn-outline-danger"> <i class="bi bi-box-arrow-in-left"></i> Back</button>
                            </a>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-6"><img src="/storage/{{ $product->image }}" class="w-100 pr-4">
                        </div>
                        <div class="col-4">
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
                            <br>
                            <strong>Description:</strong>
                            <hr>
                            <p>{{ $product->description }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
