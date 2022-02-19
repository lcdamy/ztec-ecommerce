@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header d-flex justify-content-between">
                        <div>Order History</div>
                        <div>
                            <a href="/">
                                <button class="btn btn-outline-danger"> <i class="bi bi-box-arrow-in-left"></i> Back</button>
                            </a>
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
                                        <th scope="col">Price</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <th scope="row">{{ $order->id }}</th>
                                            <td><img src="/storage/{{ $order->image }}" class="w-50"></td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->order_qty }}</td>
                                            <td>{{ $order->price }} </td>
                                            <td>{{ $order->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
