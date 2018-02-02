@extends('layout')
@section('content')
    <users-edit :current-user="{{Auth::user()}}"></users-edit>
@endsection
