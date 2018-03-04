@extends('layout')
@section('content')
    <order-detail :current-user="{{Auth::user()}}" gopay-order-id="{{$id}}"></order-detail>
@endsection