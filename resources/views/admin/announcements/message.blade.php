@extends('layouts.app')

@section('content')

<div class="container-fluid message-page ">
    <div class="row">
        {{-- NAV-MEX-COL --}}
        <div class="col-12 nav-mex col-md-3">
            {{-- NAV-MD --}}
            <div class=" d-md-block">
                <div class="account py-3 ">
                    <h3 class="mb-3 text-capitalize">Gestione contatti</h3>
                    <div class="user d-flex  align-items-center">
                        <div class="img  mr-3">
                            {{-- Placeholder IMG Utente --}}
                            <a href="#" class="d-block text-decoration-none">
                                <img
                                src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"
                                alt="mdo"
                                width="56"
                                height="56"
                                class="rounded-circle"
                                />
                            </a>
                        </div>
                        <h5 class="mb-0 text-capitalize">{{ $user->name }} {{ $user->surname }}</h5>
                         <img class=" mr-3" src="#" alt="">
                    </div>
                </div>
                {{-- MESSAGE SECTION --}}

                {{-- GUSET --}}
                @if (!count($user->announcements)>0)
                <a class="link-light" href="{{ route('admin.index') }}">

                    <div id="view-for-user" class="message-user message-host py-4 d-flex align-items-center">
                        <i class="fa-solid fa-circle-arrow-left fa-xl"></i>
                        <h5 class="mb-0 ml-3">Torna alla Dashboard</h5>
                    </div>

                </a>

                 @else
                {{-- HOST --}}
                <a class="ink-light" href="{{ route('admin.index') }}">

                    <div id="view-for-user" class="message-host py-4 d-flex align-items-center">
                        <i class="fa-solid fa-circle-arrow-left fa-xl"></i>
                        <h5 class="mb-0 ml-3">Torna alla Dashboard</h5>
                    </div>
                </a>
                @endif

                {{-- /HOST --}}
            </div>
            {{-- LISTA --}}
            <div class="d-none d-md-block">
                @if (!count($user->announcements)>0)
                    @if (!count($messages)>0)

                    <p class="mex-title my-3">Ancora nessun messaggio inviato</p>
                    @else

                    <p class="mex-title my-3">Appartamenti contattati</p>
                    @endif
                @else
                    <p class="mex-title my-3">Messaggi Ricevuti</p>
                @endif

            </div>
            @if ( !count($user->announcements)>0 )
                {{-- HOME CONTAINER USER --}}
                <div  class="appartament-container  py-4 ">
                    <div class="scroll-section ">
                        @foreach ($messages as $message)

                            <div class="appart-item  py-3 d-flex justify-content-between align-items-center">
                                <a href="{{ route('admin.messages.show', $message->id)}}">
                                    <div class="d-flex align-items-center container-btn">
                                        <img class="mx-2 img" src="{{ asset('storage/' . $message->$announcement->image ) }}" alt="">
                                        <p class="mb-0">{{ $message->announcement->title }}</p>
                                    </div>
                                </a>
                            </div>

                        @endforeach
                    </div>
                </div>
                {{-- /HOME-CONTAINER USER--}}
            @else
                {{-- /HOME CONTAINER HOST--}}
                <div  class="appartament-container  py-4 ">
                    <div class="scroll-section ">
                        @foreach ($announcements as $announcement)
                        <div
                        {{-- lui ha il click --}}
                        class="appart-item  py-3 d-flex justify-content-between align-items-center">
                        <a href="{{ route('admin.messages.edit', $announcement->id ) }}">

                            <div
                            class="d-flex align-items-center container-btn">

                                <img class="mx-2 img" src="{{ asset('storage/' . $announcement->image ) }}" alt="">
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
                                <i class="fa-solid fa-message"></i>
                            </div>
                            @endif

                        </div>

                        @endforeach
                    </div>
                </div>
                {{-- /HOME-CONTAINER HOST --}}
            @endif



            {{-- NAV-SM ----------}}
            <div class="small-nav debug" ></div>

        </div>
        {{-- MAIN COL JUMBO --}}
        <div class=" d-none d-md-block col-11 col-md-9 jumbo ">
            {{-- GUEST --}}
            @if (!count($user->announcements)>0)
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

            <div class="container py-5 d-none d-md-block under-jumbo">
                <div class="row d-flex justify-content-center">
                    <div class="col-5  d-flex justify-content-center">
                        <img src="{{ asset('img/message-people.png') }}" alt="">
                    </div>
                    <div class="col-6 d-flex justify-content-center flex-column px-2 px-xl-4 text b-round b-shadow">
                        <h5 class="mb-3">Cose da sapere nel contatto tra utenti:</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas natus tempore voluptatem dolor sint! Necessitatibus soluta tempore ipsam temporibus eos.</p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptas at perspiciatis, libero in nobis ex!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection





