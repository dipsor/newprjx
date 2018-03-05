@extends('layout')
@section('content')
    <users-index  :current-user="{{Auth::user()}}" gopay-order-id="{{$id}}"></users-index>
@endsection
