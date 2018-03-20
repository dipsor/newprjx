@extends('layout')
@section('content')
    <admin-orders-show :current-user="{{Auth::user()}}" gopay-order-id="{{$id}}"></admin-orders-show>

@endsection()
