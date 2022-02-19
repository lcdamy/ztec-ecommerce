@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card-header d-flex justify-content-between">
                    <div>List Orders</div>
                    <div>
                        <a href="/dashboard">
                            <button class="btn btn-outline-danger"> <i class="bi bi-box-arrow-in-left"></i> Back</button>
                        </a>
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
                            <th scope="col">Amount</th>
                            <th scope="col">Client-email</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td><img src="/storage/{{ $order->image }}" class="w-50"></td>
                                <td>{{ $order->name }}</td>
                                <td>1</td>
                                <td>{{ $order->amount }}</td>
                                <td>{{ $order->email }}</td>
                                <td><i class="bi bi-bag-check-fill" style="color:#198754"></i></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
