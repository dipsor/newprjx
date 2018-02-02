@extends('layout')
@section('content')
    <users-index  :current-user="{{Auth::user()}}"></users-index>
@endsection
