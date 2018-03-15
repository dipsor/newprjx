@extends('layout')
@section('content')
    <admin-orders-index  :current-user="{{Auth::user()}}"></admin-orders-index>
@endsection()
