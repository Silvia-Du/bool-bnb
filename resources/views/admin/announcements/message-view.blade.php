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

                <a href="{{ route('admin.messages.index') }}">

                    <div id="view-for-appartament" class="message-appart debug py-4 d-flex align-items-center">
                        <img src="{{ asset('img/icon-message2.png') }}" alt="home">
                        <h6 class="mb-0 ml-3">Vedi tutti per appartamento</h6>
                    </div>
                </a>

                {{-- GUSET --}}
                {{-- @if (!$user->announcements)
                <div id="view-for-user" class="message-user debug py-4 d-flex align-items-center">
                    <img src="{{ asset('img/icon-message3.png') }}" alt="users">
                    <h6 class="mb-0 ml-3">Vedi tutti</h6>
                </div>

                 @else --}}
                {{-- HOST --}}
                {{-- <div id="view-for-user" class="message-host debug py-4 d-flex align-items-center">
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
            <div  class="appartament-container debug py-4 d-none d-md-block">
                <div class="scroll-section ">

                    <div
                    {{-- lui ha il click --}}
                    class="appart-item debug py-3 d-flex justify-content-between align-items-center">

                        <div
                        class="d-flex align-items-center container-btn">
                            <div class="mx-2 img debug"></div>
                            <p
                             class="mb-0 d-none d-lg-block">ANNUNCIO {{ $announcement[0]->title }}</p>
                             <p class="d-none loop-p"></p>
                             <p class="d-none id-p"></p>
                        </div>


                        @if (count($announcement[0]->messages) != 0)
                        <div class="mex-count debug d-flex justify-content-center align-items-center mr-2">
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
        <div class="col-11 col-md-9 jumbo debug">
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
            {{-- /HOST --}}
            {{-- SHOW MESSAGE --}}
            <div class="container-fluid debug show-col-message mt-3">
                @foreach ($messages as $message)
                <div class="row debug user-container px-lg-5">

                    <div class="col-12 col-lg-5 debug py-3">
                        <div >
                            {{-- mex-item --}}
                            <a href="{{ route('admin.messages.show', $message) }}">
                                <div class="user-item debug d-flex align-items-center justify-content-between py-2 mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="img debug ml-2"></div>
                                    <h6 class="mb-0 ml-3">Nome mittente: {{ $message->name }}</h6>
                                </div>

                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-lg-7 debug py-3 px-2 px-lg-5 d-flex">
                        <div class="container-fluid">
                            {{-- inclusione area messaggi --}}
                            @include('admin.announcements.partials.mex-col')

                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

</div>
<script>
    // const btnMessageBox = document.querySelectorAll('.container-btn');
    // // console.log(btnMessageBox);

    // btnMessageBox.forEach(element => {

    //     element.addEventListener('click', function(){

    //         const eLastChild = element.children;
    //         console.log(eLastChild);
    //         const eLastChildLoop = eLastChild[2].textContent -1;
    //         const eLastChildId = eLastChild[3].textContent;
    //         console.log(eLastChildLoop);
    //         console.log(eLastChildId);
    //         $idLoop = eLastChildLoop;


    //     })
    // });
</script>

@endsection




