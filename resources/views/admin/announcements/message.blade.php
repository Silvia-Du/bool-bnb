@extends('layouts.app')

@section('content')
<div class="debug container-fluid message-page">
    <div class="row">
        {{-- NAV-MEX-COL --}}
        <div class="col-12 col-md-3 debug">

        </div>
        {{-- JUMBO-COL --}}
        <div class="d-none d-md-block col-9 jumbo debug position-relative">
            {{-- GUEST --}}
            @if (!$user->announcements)
            <img class="img-fluid" src="{{ asset('img/message-jumbo2.png') }}" alt="img">
            <div class="container-fluid position-absolute">
                <div class="row">

                    <div class="col-6 offset-6 text user p-3">
                        <h1>I nostri Host forniscono servizi digitali di alto livello, entra in contatto con loro e viaggia!</h1>
                    </div>
                </div>
            </div>
            @else

            {{-- HOST --}}
            <img class="img-fluid" src="{{ asset('img/message-jumbo.png') }}" alt="img">
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
