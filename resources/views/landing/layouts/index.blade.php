@extends('landing.layout')
@section('content')
    @if(!Auth::check())
    <!-- Modal Structure -->
    <div id="login-modal" class="modal">
                <form class="login-form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="row custom-login-row">
                        <div class="input-field col s12 center">
                            {{--<img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">--}}
                            <p class="center login-form-text">Skeleton Dashboard</p>
                        </div>
                    </div>
                    <div class="row custom-login-row">
                        <div class="input-field col s12">
                            <i class="mdi-social-person-outline prefix"><i class="material-icons">person</i></i>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="email" class="center-align">Email</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="row custom-login-row">
                        <div class="input-field col s12">
                            <i class="mdi-action-lock-outline prefix"><i class="material-icons">lock</i></i>
                            <input id="password" type="password" name="password" required>
                            <label for="password">Password</label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                            @endif
                        </div>
                    </div>
                    <div class="row custom-login-row">
                        <div class="input-field col s12 m12 l12  login-text">
                            <input name="remember" type="checkbox" id="remember-me" {{ old('remember') ? 'checked' : '' }} />
                            <label for="remember-me">Remember me</label>
                        </div>
                    </div>
                    <div class="row login-row">
                        <div class="input-field col s12">
                            <button class="btn waves-effect purple darken-3 waves-light col s12">Login</button>
                        </div>
                    </div>
                    <div class="row login-row">
                        <div class="input-field col s6">
                            <div class="social-wrap a">
                                <a href="{{route('facebook.login')}}" id="facebook">Sign in with Facebook</a>
                            </div>
                        </div>
                        <div class="input-field col s6">
                            <div class="social-wrap a">
                                <a href="{{route('google.login')}}" id="googleplus">Sign in with Google</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6 m6 l6">
                            <p class="margin medium-small"><a class=" purple-text text-darken-2" href="{{ route('register') }}">Register Now!</a></p>
                        </div>
                        <div class="input-field col s6 m6 l6">
                            <p class="margin right-align medium-small"><a class=" purple-text text-darken-2" href="{{ route('password.request') }}">Forgot password ?</a></p>
                        </div>
                    </div>
                </form>
    </div>
    @endif

    <div id="index-banner">
        <div>
            {{--<div class="gradient-45deg-purple-amber">--}}
                <div class="gradient-45deg-brown-brown">
                {{--<div class="gradient-45deg-red-pink">--}}

                <br><br>
                <h1 class="header center white-text text-lighten-2">My app boilerplate</h1>
                <div class="row center">
                    <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                </div>
                <div class="row center">

                    @if(Auth::check())
                    <a class="waves-effect waves-light btn btn-large purple darken-3" href="{{route('thesis.index')}}">Vytvorit</a>
                    @else
                    <a data-target="login-modal" id="login-modal-button" class="waves-effect waves-light btn modal-trigger btn-large purple darken-3" href="#login-modal">Get Started</a>
                    @endif
                </div>
                <br><br>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="section">

            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center purple-text text-darken-2"><i class="material-icons">flash_on</i></h2>
                        <h5 class="center">Speeds up development</h5>

                        <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center purple-text text-darken-2"><i class="material-icons">group</i></h2>
                        <h5 class="center">User Experience Focused</h5>

                        <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                    </div>
                </div>

                <div class="col s12 m4">
                    <div class="icon-block">
                        <h2 class="center purple-text text-darken-2"><i class="material-icons">settings</i></h2>
                        <h5 class="center">Easy to work with</h5>

                        <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="{{asset('img')}}/background2.jpg" alt="Unsplashed background img 2"></div>
    </div>

    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12 center">
                    <h3><i class="mdi-content-send brown-text"></i></h3>
                    <h4>Contact Us</h4>
                    <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                </div>
            </div>

        </div>
    </div>


    <div class="parallax-container valign-wrapper">
        <div class="section no-pad-bot">
            <div class="container">
                <div class="row center">
                    <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                </div>
            </div>
        </div>
        <div class="parallax"><img src="{{asset('img')}}/background3.jpg" alt="Unsplashed background img 3"></div>
    </div>
@endsection

