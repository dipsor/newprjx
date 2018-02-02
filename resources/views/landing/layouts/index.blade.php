@extends('landing.layout')
@section('content')
    {{--{{dd([Auth::check(), Auth::user() ? Auth::user() : null])}}--}}
    <landing-page
            is-user-logged-in="{{ Auth::check() }}"
            current-user="{{ Auth::user() ? Auth::user() : null }}"
    >
    </landing-page>
@endsection