@include('layouts.partials.header')
<v-app id="app">
    <navigations :current-user="{{Auth::user()}}"></navigations>
    @yield('content')
    <footer-component></footer-component>
</v-app>
@include('layouts.partials.footer')
