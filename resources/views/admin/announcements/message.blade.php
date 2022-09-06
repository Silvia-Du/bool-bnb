@extends('layouts.app')

@section('content')
<div class="debug container-fluid message-page">
    <div class="row">
        {{-- NAV-MEX-COL --}}
        <div class="col-12 col-md-3 debug">

            <div class="account py-3 debug">
                <h4 class="mb-3 text-capitalize"> Gestione contatti</h4>
                <div class="user d-flex debug align-items-center">
                    <div class="img debug mr-3"></div>
                    <h5 class="mb-0 text-capitalize">{{ $user->name }} {{ $user->surname }}</h5>
                    {{-- <img class="debug mr-3" src="#" alt=""> --}}
                </div>
            </div>
            {{-- MESSAGE SECTION --}}
            <div class="message debug py-3">
                <h5 class="mb-3 text-capitalize">Le tue conversazioni</h5>

            </div>
        </div>
        {{-- JUMBO-COL --}}
        <div class="d-none d-md-block col-9 jumbo debug position-relative">
            {{-- GUEST --}}
            @if (!$user->announcements)
            {{-- <img class="img-fluid" src="{{ asset('img/message-jumbo2.png') }}" alt="img"> --}}
            <div class="container-fluid position-absolute">
                <div class="row">

                    <div class="col-6 offset-6 text user p-3">
                        <h1>I nostri Host forniscono servizi digitali di alto livello, entra in contatto con loro e viaggia!</h1>
                    </div>
                </div>
            </div>
            @else

            {{-- HOST --}}
            {{-- <img class="img-fluid" src="{{ asset('img/message-jumbo.png') }}" alt="img"> --}}
            <div class="container-fluid position-absolute text host">
                <div class="row">

                    <div class=" col-6 offset-6 p-3">
                        <h1>Entra in contatto con potenziali clienti, fagli sapere come puoi aiutarli!</h1>
                    </div>
                </div>
            </div>
            @endif
            {{-- /HOST --}}
        </div>
    </div>

</div>

<h1>eccomi</h1>

@endsection
