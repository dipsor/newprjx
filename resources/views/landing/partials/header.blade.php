<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>My app - Boilerplate Landing page</title>

    <!-- CSS  -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet">
    <link href="{{ asset('css/frontend.css') }}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">


</head>
<body>
<div id="app">
    <nav class="white" role="navigation">
        <div class="nav-wrapper container">
            <a id="logo-container" href="#" class="brand-logo black-text">Logo</a>
            <ul class="right hide-on-med-and-down">
                @if(Auth::user())
                    <li><a class="black-text" href="{{route('users.show', ['id' => Auth::user()->id])}}">Profile</a></li>
                    <li><a class="black-text" href="{{route('users.logout')}}">Logout</a></li>

                @else
                    <li><a class="black-text" href="{{route('login')}}">Sign In</a></li>
                    <li><a class="black-text" href="{{route('login')}}">Sign Up</a></li>
                @endif
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <li><a class="black-text" href="#">Sign In</a></li>
                <li><a class="black-text" href="#">Sign Up</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>