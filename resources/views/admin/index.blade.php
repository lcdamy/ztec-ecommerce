@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <div class="card-header">
                    <div>Welcome,Here you can add product and view orders</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <div class="d-flex justify-content-between p-4">
                    <a href="/dashboard/orders"><button class="btn btn-primary">View Orders</button></a>
                    <a href="/dashboard/products"><button class="btn btn-primary">View products</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
