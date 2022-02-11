@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Top-up Account</div>

                    <div class="card-body">
                        <form method="POST" action="/top/balance">
                            @csrf
                            <div class="form-group row">
                                <label for="amount" class="col-md-4 col-form-label text-md-right">Amount to Top-up</label>

                                <div class="col-md-6">
                                    <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror"
                                        name="amount" value="{{ old('amount') }}" autocomplete="amount" autofocus>

                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save Balance
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card mt-4">
                        <div class="card-header">Top-up History</div>
                        <div class="row">
                            <div class="col-8 offset-2">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Transaction</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tops as $top)
                                            <tr>
                                                <th scope="row">{{ $top->id }}</th>
                                                <td>{{ $top->amount }}</td>
                                                <td>{{ $top->mode }} </td>
                                                <td>{{ $top->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
