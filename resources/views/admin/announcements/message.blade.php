@extends('layouts.app')

@section('content')

<div class="container-fluid message-page ">
    <div class="row">
        {{-- NAV-MEX-COL --}}
        <div class="col-12 nav-mex col-md-3  ">
            {{-- NAV-MD --}}
            <div class=" d-md-block">
                <div class="account py-3 ">
                    <h4 class="mb-3 text-capitalize"> Gestione contatti</h4>
                    <div class="user d-flex  align-items-center">
                        <div class="img  mr-3"></div>
                        <h5 class="mb-0 text-capitalize">{{ $user->name }} {{ $user->surname }}</h5>
                         <img class=" mr-3" src="#" alt="">
                    </div>
                </div>
                {{-- MESSAGE SECTION --}}


                {{--  <div id="view-for-appartament" class="message-appart  py-4 d-flex align-items-center">
                    <img src="{{ asset('img/icon-message2.png') }}" alt="home">
                    <h6 class="mb-0 ml-3">Vedi per Appartamento</h6>
                </div>--}}

                {{-- GUSET --}}
                @if (!$user->announcements)
                <a href="{{ route('admin.index') }}">

                    <div id="view-for-user" class="message-user  py-4 d-flex align-items-center">
                        <img src="{{ asset('img/icon-message3.png') }}" alt="users">
                        <h6 class="mb-0 ml-3">Torna alla Dashboard</h6>
                    </div>
                </a>

                 @else
                {{-- HOST --}}
                <a href="{{ route('admin.index') }}">

                    <div id="view-for-user" class="message-host  py-4 d-flex align-items-center">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                        <h6 class="mb-0 ml-3">Torna alla Dashboard</h6>
                    </div>
                </a>
                @endif
                {{-- /HOST --}}
            </div>
            {{-- LISTA --}}
            <div class="">
                @if ($user->announcements)
                   <p class="mex-title my-3">Messaggi Ricevuti</p>
                   @else
                   <p class="mex-title my-3">Appartamenti contattai</p>
                @endif

            </div>
            {{-- /HOME CONTAINER --}}
            <div  class="appartament-container  py-4 ">
                <div class="scroll-section ">
                    @foreach ($announcements as $announcement)
                    <div
                    {{-- lui ha il click --}}
                    class="appart-item  py-3 d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.messages.edit', $announcement->id ) }}">

                        <div
                        class="d-flex align-items-center container-btn">
                            <div class="mx-2 img "></div>
                            <p
                             class="mb-0">{{ $announcement->title }}</p>
                             <p class="d-none loop-p">{{ $loop->iteration }}</p>
                             <p class="d-none id-p">{{ $announcement->id }}</p>
                        </div>
                    </a>


                        @if (count($announcement->messages) != 0)
                        <div class="mex-count  d-flex justify-content-center align-items-center mr-2">
                            <p class="mb-0 ">{{ count($announcement->messages) }}</p>
                        </div>
                        @else
                        <div class="no-mex p-2 d-flex">
                            <p class="mb-0 ">Nessun</p>
                            <img src="{{ asset('img/admin-icon1.png') }}" alt="">
                        </div>
                        @endif

                    </div>

                    @endforeach
                </div>
            </div>
            {{-- /HOME-CONTAINER --}}


            {{-- NAV-SM ----------}}
            <div class="small-nav" ></div>

        </div>
        {{-- MAIN COL JUMBO --}}
        <div class=" d-none d-md-block col-11 col-md-9 jumbo ">
            {{-- GUEST --}}
            @if (!$user->announcements)
            <div class="jumbo-user container-fluid  d-flex align-items-center justify-content-center pl-5">
                <div class="row">
                    <div class="col-6 offset-6 text user p-3 mt-5">
                        <h1>I nostri Host forniscono servizi digitali di alto livello, entra in contatto con loro e viaggia!</h1>
                    </div>
                </div>
            </div>

            @else
            {{-- HOST --}}
            <div class="jumbo-host container-fluid d-flex align-items-center justify-content-center pl-5">
                <div class="row">
                    <div class=" col-6 offset-6 text user p-3 mt-5">
                        <h1>Entra in contatto con potenziali clienti, fagli sapere come puoi aiutarli!</h1>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>

</div>



@endsection





