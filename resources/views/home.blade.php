@extends('layouts.app')

@section('content')
    <home-page currency="{{ $currency }}" balance="{{ $balance }}" token="{{ session()->get('token') }}">
    </home-page>
@endsection
