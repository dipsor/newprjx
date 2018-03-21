@extends('layout')
@section('content')
    <admin-orders-show :current-user="{{Auth::user()}}" gopay-order-id="{{$id}}" asset-url="{{asset('/')}}"></admin-orders-show>

@endsection()
