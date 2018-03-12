@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            ALFA-TISK.CZ
        @endcomponent
    @endslot
    {{-- Body --}}<p>Objednávka byla zaplacena.</p>
    <ul>
        <li>{{$order->name}}</li>
        <li>{{$order->price}} Kč.</li>
    </ul>
    @component('mail::button', ['url' => route('users.order.show', ['orderId' => $order->id]), 'color' => 'green'])
        Zobrazit objednávku
    @endcomponent
    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} {{ config('app.name') }}.
        @endcomponent
    @endslot
@endcomponent