@extends('layouts.app')

@section('content')
    <home-page currency="{{ $currency }}" balance="{{ $balance }}"></home-page>
@endsection
