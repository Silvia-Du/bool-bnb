@extends('layouts.app')

@section('content')

<div class="container-fluid message-page debug">
    <div class="row">
        {{-- NAV-MEX-COL --}}
        <div class="col-1 nav-mex col-md-3 debug ">
            {{-- NAV-MD --}}
            <div class="d-none d-md-block">
                <div class="account py-3 debug">
                    <h4 class="mb-3 text-capitalize"> Gestione contatti</h4>
                    <div class="user d-flex debug align-items-center">
                        <div class="img debug mr-3"></div>
                        <h5 class="mb-0 text-capitalize">{{ $user->name }} {{ $user->surname }}</h5>
                        {{-- <img class="debug mr-3" src="#" alt=""> --}}
                    </div>
                </div>
                {{-- MESSAGE SECTION --}}
                <div class="message debug py-3 d-flex align-items-center">
                    <img class="mr-2" src="{{ asset('img/icon.message1.png') }}" alt="plane">
                    <h4 class="mb-0 text-capitalize">Le tue conversazioni</h4>
                </div>

                <div class="message-appart debug py-4 d-flex align-items-center">
                    <img class="mb-1" src="{{ asset('img/icon-message2.png') }}" alt="home">
                    <h6 class="mb-0 ml-3">Vedi per Appartamento</h6>
                </div>

                {{-- GUSET --}}
                @if (!$user->announcements)
                <div class="message-user debug py-4 d-flex align-items-center">
                    <img src="{{ asset('img/icon-message3.png') }}" alt="users">
                    <h6 class="mb-0 ml-3">Vedi per host</h6>
                </div>

                 @else
                {{-- HOST --}}
                <div class="message-user debug py-4 d-flex align-items-center">
                    <img src="{{ asset('img/icon-message3.png') }}" alt="users">
                    <h6 class="mb-0 ml-3">Vedi per utenti</h6>
                </div>
                @endif
                {{-- /HOST --}}

            </div>
            {{-- NAV-SM --}}
            <div class="small-nav" ></div>

        </div>
        {{-- MAIN COL JUMBO --}}
        <div class="col-11 col-md-9 jumbo debug">
            {{-- GUEST --}}
            @if (!$user->announcements)
            <div class="jumbo-user h-100 container-fluid  d-flex align-items-center justify-content-center pl-5">
                <div class="row">
                    <div class="col-6 offset-6 text user p-3 mt-5">
                        <h1>I nostri Host forniscono servizi digitali di alto livello, entra in contatto con loro e viaggia!</h1>
                    </div>
                </div>
            </div>

            @else
            {{-- HOST --}}
            <div class="jumbo-host container-fluid  h-100 d-flex align-items-center justify-content-center pl-5">
                <div class="row">
                    <div class=" col-6 offset-6 text user p-3 mt-5">
                        <h1>Entra in contatto con potenziali clienti, fagli sapere come puoi aiutarli!</h1>
                    </div>
                </div>
            </div>
            @endif
            {{-- /HOST --}}
        </div>
    </div>

</div>

@endsection
