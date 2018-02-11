@extends('layout')
@section('content')
    <thesis-index :current-user="{{Auth::user()}}"></thesis-index>
@endsection
