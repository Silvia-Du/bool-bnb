@extends('layouts.app')

@section('content')

<div class="container-fluid message-page ">
    <div class="row">
        {{-- NAV-MEX-COL --}}
        <div class="d-none d-md-block col-1 nav-mex col-md-3  ">
            {{-- NAV-MD --}}
            <div class="d-none d-md-block">
                <div class="account py-3 ">
                    <h4 class="mb-3 text-capitalize"> Gestione contatti</h4>
                    <div class="user d-flex  align-items-center">
                        <div class="img  mr-3"></div>
                        <h5 class="mb-0 text-capitalize">{{ $user->name }} {{ $user->surname }}</h5>
                        {{-- <img class=" mr-3" src="#" alt=""> --}}
                    </div>
                </div>
                {{-- MESSAGE SECTION --}}


                <a href="{{ route('admin.messages.index') }}">

                    <div id="view-for-appartament" class="message-appart  py-4 d-flex align-items-center">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                        <h6 class="mb-0 ml-3">  Torna alla lista messaggi</h6>
                    </div>
                </a>

                {{-- GUSET --}}
                {{-- @if (!$user->announcements)
                <div id="view-for-user" class="message-user  py-4 d-flex align-items-center">
                    <img src="{{ asset('img/icon-message3.png') }}" alt="users">
                    <h6 class="mb-0 ml-3">Vedi tutti</h6>
                </div>

                 @else --}}
                {{-- HOST --}}
                {{-- <div id="view-for-user" class="message-host  py-4 d-flex align-items-center">
                    <img src="{{ asset('img/icon-message3.png') }}" alt="users">
                    <h6 class="mb-0 ml-3">Vedi tutti</h6>
                </div>
                @endif --}}
                {{-- /HOST --}}
            </div>
            {{-- LISTA --}}
            <div class="d-none d-md-block">
                @if (!$user->announcements)
                   <p class="mex-title my-3">Messaggi Inviati</p>
                   @else
                   <p class="mex-title my-3">Messaggi Ricevuti</p>
                @endif

            </div>

            {{-- /HOME CONTAINER --}}
            <div  class="appartament-container  py-4 d-none d-md-block">
                <div class="scroll-section ">

                    <div
                    {{-- lui ha il click --}}
                    class="appart-item  py-3 d-flex justify-content-between align-items-center">

                        <div
                        class="d-flex align-items-center container-btn">
                            <div class="mx-2 img "></div>
                            <p
                             class="mb-0 d-none d-lg-block">{{ $announcement[0]->title }}</p>
                             <p class="d-none loop-p"></p>
                             <p class="d-none id-p"></p>
                        </div>


                        @if (count($announcement[0]->messages) != 0)
                        <div class="mex-count  d-flex justify-content-center align-items-center mr-2">
                            <p class="mb-0 ">{{ count($messages) }}</p>
                        </div>
                        @else
                        <div class="no-mex p-2 d-flex">
                            <p class="mb-0 ">Nessun</p>
                            <img src="{{ asset('img/admin-icon1.png') }}" alt="">
                        </div>
                        @endif

                    </div>
                    {{-- annuncio --}}
                </div>
            </div>
            {{-- /HOME-CONTAINER --}}


            {{-- NAV-SM ----------}}
            <div class="small-nav" ></div>

        </div>
        {{-- MAIN COL JUMBO --}}
        <div class="  col-11 col-md-9 jumbo ">
            {{-- GUEST --}}
            <div class="d-none d-md-block">
                @if (!$user->announcements)
                <div class="   jumbo-user container-fluid  d-flex align-items-center justify-content-center pl-5">
                    <div class="row">
                        <div class="  col-6 offset-6 text user p-3 mt-5">
                            <h1>I nostri Host forniscono servizi digitali di alto livello, entra in contatto con loro e viaggia!</h1>
                        </div>
                    </div>
                </div>

                @else
                {{-- HOST --}}
                <div class="  jumbo-host container-fluid d-flex align-items-center justify-content-center pl-5">
                    <div class="row">
                        <div class=" col-6 offset-6 text user p-3 mt-5">
                            <h1>Entra in contatto con potenziali clienti, fagli sapere come puoi aiutarli!</h1>
                        </div>
                    </div>
                </div>
                @endif
        </div>
            {{-- /HOST --}}
            {{-- SHOW MESSAGE --}}
            <div class="container-fluid  show-col-message mt-3">
                <a href="{{ route('admin.messages.index') }}">

                    <div id="view-for-appartament" class=" d-block d-md-none message-appart  py-4 d-flex align-items-center">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                        <h6 class="mb-0 ml-3">  Torna alla lista messaggi</h6>
                    </div>
                </a>
                @foreach ($messages as $message)
                <div class="row  user-container px-lg-5">

                    <div class="col-12 col-lg-5  py-3">
                        <div >
                            {{-- mex-item --}}
                            <a href="{{ route('admin.messages.show', $message) }}">
                                <div class="user-item  d-flex align-items-center justify-content-between py-2 mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="img  ml-2"></div>
                                    <h6 class="mb-0 ml-3">Data Messaggio : {{ $message->created_at }}</h6>
                                </div>

                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- AREA MESSAGGI--}}
                    <div class="col-12 col-lg-7  py-3 px-2 px-lg-5 d-flex">
                        <div class="container-fluid">
                            <div class="row flex-wrap-reverse">

                                <div class="mex-box  col-12 d-flex flex-column justify-content-around py-3">
                                    <h6 class="mb-0">Messaggio:</h6>
                                    <div class="text box debug py-3 px-lg-3 mb-2">
                                        <p class="mb-0">{{ $message->text }}</p>
                                    </div>
                                    <h6 class="mb-0">E-mail mittente:</h6>
                                    <div class="email box debug py-2 px-lg-3">
                                        <p class="mb-1">{{ $message->email }}</p>
                                    </div>
                                    <h6 class="my-1">Nome Emittente:</h6>
                                    <div class="email box debug py-2 px-lg-3">
                                        <p class="mb-0">{{ $message->name }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- /AREA MESSAGGI--}}
                </div>
                @endforeach

            </div>
        </div>
    </div>

</div>


@endsection





