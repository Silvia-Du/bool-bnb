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
                <div class="d-flex message debug py-3 align-items-center">
                    <img class="mr-2" src="{{ asset('img/icon.message1.png') }}" alt="plane">
                    <h4 class="mb-0 text-capitalize">Le tue conversazioni</h4>
                </div>

                <div id="view-for-appartament" class="message-appart debug py-4 d-flex align-items-center">
                    <img src="{{ asset('img/icon-message2.png') }}" alt="home">
                    <h6 class="mb-0 ml-3">Vedi per Appartamento</h6>
                </div>

                {{-- GUSET --}}
                @if (!$user->announcements)
                <div id="view-for-user" class="message-user debug py-4 d-flex align-items-center">
                    <img src="{{ asset('img/icon-message3.png') }}" alt="users">
                    <h6 class="mb-0 ml-3">Vedi tutti</h6>
                </div>

                 @else
                {{-- HOST --}}
                <div id="view-for-user" class="message-host debug py-4 d-flex align-items-center">
                    <img src="{{ asset('img/icon-message3.png') }}" alt="users">
                    <h6 class="mb-0 ml-3">Vedi tutti</h6>
                </div>
                @endif
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
            {{-- USER-CONTAINER --}}
            {{-- <div id="user-box" class="user-container debug py-4 ">
                <div class="scroll-section">
                    @foreach ($announcements as $announcement)
                    @foreach ($announcement->messages as $message)
                    <div class="user-item debug d-flex align-items-center justify-content-between py-2 mb-1">
                        <div class="d-flex align-items-center">
                            <div class="img debug ml-2"></div>
                            <h6 class="mb-0 ml-3">Nome Mittente</h6>
                        </div>
                        <p class="mb-0 mr-2 date">Data messaggio</p>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div> --}}
            {{-- /USER-CONTAINER --}}
            {{-- /HOME CONTAINER --}}
            <div id="appartament-box" class="appartament-container debug py-4 d-none d-md-block">
                <div class="scroll-section ">
                    @foreach ($announcements as $announcement)

                    <div
                    {{-- lui ha il click --}}
                    class="appart-item debug py-3 d-flex justify-content-between align-items-center">

                        <div class="d-flex align-items-center">
                            <div class="mx-2 img debug"></div>
                            <p class="mb-0 d-none d-lg-block">ANNUNCIO {{ $announcement->title }}</p>
                        </div>

                        @if (count($announcement->messages) != 0)
                        <div class="mex-count debug d-flex justify-content-center align-items-center mr-2">
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
        <div class="col-11 col-md-9 jumbo debug">
            {{-- GUEST --}}
            @if ($user->announcements)
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
            {{-- /HOST --}}
            {{-- SHOW MESSAGE --}}
            <div class="container-fluid debug show-col-message mt-3">
                <div class="row debug user-container">
                    <div class="col-12 col-lg-3 debug py-3">
                        <div class="scroll-section">
                            @foreach ($announcements as $announcement)
                            @foreach ($announcement->messages as $message)
                            <div class="user-item debug d-flex align-items-center justify-content-between py-2 mb-1">
                            <div class="d-flex align-items-center">
                                <div class="img debug ml-2"></div>
                                <h6 class="mb-0 ml-3">Nome Mittente</h6>
                            </div>
                            <p class="d-none d-md-block mb-0 mr-2 date">Data messaggio</p>
                            </div>
                            @endforeach
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 col-lg-9 debug py-3 px-2 px-lg-5 d-flex">
                        <div class="container-fluid">
                            @include('admin.announcements.partials.mex-col')
                            {{-- <div class="row flex-wrap-reverse">

                                <div class="mex-box debug col-12 col-lg-8 d-flex flex-column justify-content-around py-3">
                                    <h6 class="mb-0">Messaggio:</h6>
                                    <div class="text box debug py-3 px-lg-3 mb-2">
                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, harum pariatur! Enim dolor exercitationem nulla soluta, neque recusandae ipsum cumque. Lorem ipsum dolor sit amet consectetur, adipisicing elit. </p>
                                    </div>
                                    <h6 class="mb-0">E-mail mittente:</h6>
                                    <div class="email box debug py-2 px-lg-3">
                                        <p class="mb-0">Email@email.com</p>
                                    </div>
                                </div>
                                <div class="appartament box debug d-none d-lg-block col-lg-4 py-3">
                                    <div class="debug d-flex py-1 px-1 align-items-center mb-3 justify-content-center">

                                        <div class="img-appartament debug mr-2"></div>
                                        <h5 class="mb-0 d-none  d-xl-block">Appartamento</h5>
                                    </div>
                                    <h5>Nome Appartamento</h5>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    const btnMessageBox = document.getElementById('appartament-box');

    btnMessageBox.addEventListener('click', function(){
        console.log(btnMessageBox.value);
    })
</script>

@endsection




