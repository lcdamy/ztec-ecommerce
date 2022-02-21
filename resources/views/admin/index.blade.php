@extends('layouts.app')

@section('content')
    <admin-page token="{{ session()->get('token') }}"></admin-page>
@endsection
