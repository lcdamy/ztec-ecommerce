@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card-header d-flex justify-content-between">
                    <div>List Products</div>
                    <div>
                        <a href="/dashboard/product/create"><button class="btn btn-primary">Add new product</button></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width:100px">Photo</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Original-Price</th>
                            <th scope="col">Discout-Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td><img src="/storage/{{ $product->image }}" class="w-50"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->price }} <sub><b>{{ $product->code }}</b></sub></td>
                                <td>{{ $product->discounted_price }} <sub><b>{{ $product->code }}</b></sub> </td>
                                <td>{{ $product->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
