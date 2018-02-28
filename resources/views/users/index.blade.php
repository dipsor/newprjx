@extends('layout')
@section('content')
    {{$id}}
    <users-index  :current-user="{{Auth::user()}}" gopay-order-id="{{$id}}"></users-index>
@endsection
