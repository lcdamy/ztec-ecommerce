@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div>Top-up Account</div>
                        <div>
                            <a href="/">
                                <button class="btn btn-outline-danger"> <i class="bi bi-box-arrow-in-left"></i> Back</button>
                            </a>
                        </div>
                    </div>
                    <create-top></create-top>
                    <top-view></top-view>
                </div>
            </div>
        </div>
    </div>
@endsection
