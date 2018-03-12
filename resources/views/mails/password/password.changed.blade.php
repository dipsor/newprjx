@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            ALFA-TISK.CZ
        @endcomponent
    @endslot
    {{-- Body --}}<p>Gratulujeme, Vám k úspšnému vytvoření účtu.</p><p>Uživatel: {{ $user->email }}</p><p>Heslo: {{$pwd}}</p>
    {{-- Subcopy --}}
    @isset($user)
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $user->email }}
            @endcomponent
        @endslot
    @endisset
    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}.
        @endcomponent
    @endslot
@endcomponent