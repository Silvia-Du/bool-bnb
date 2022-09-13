@extends('layouts.app')

@section('content')

<div class="container-fluid message-page ">
    <div class="row">
        {{-- NAV-MEX-COL --}}
        <div class="d-none d-md-block col-1 nav-mex col-md-3  ">
            {{-- NAV-MD --}}
            <div class="d-none d-md-block">
                <div class="account py-3 ">
                    <h3 class="mb-3 text-capitalize"> Gestione contatti</h3>
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
                        {{-- <img class=" mr-3" src="#" alt=""> --}}
                    </div>
                </div>
                {{-- MESSAGE SECTION --}}


                <a class="link-light" href="{{ route('admin.messages.index') }}">

                    <div id="view-for-appartament" class="message-appart  py-4 d-flex align-items-center">
                        <i class="text-white fa-solid fa-circle-arrow-left fa-xl"></i>
                        <h5 class="mb-0 ml-3 text-white">Torna alla lista messaggi</h5>
                    </div>
                </a>

            </div>
            {{-- LISTA --}}
            <div class="d-none d-md-block">
                @if (!count($user->announcements)>0)
                <p class="mex-title my-3">Appartamenti contattati</p>
                @else
                <p class="mex-title my-3">Messaggi Ricevuti</p>
                @endif

            </div>
            @if (!count($user->announcements)>0)
                {{-- /HOME CONTAINER USER--}}
                <div  class="appartament-container  py-4 d-none d-md-block">
                    <div class="scroll-section ">

                        <div class="appart-item  py-3 d-flex justify-content-between align-items-center">

                            <div class="d-flex align-items-center container-btn">
                                <img class="mx-2 img" src="{{ asset('storage/' . $message[0]['announcement']['image'] ) }}" alt="">
                                <p
                                class="mb-0 d-none d-lg-block">{{ $message[0]['announcement']['title'] }}</p>
                            </div>

                        </div>

                    </div>
                </div>
                {{-- /HOME-CONTAINER USER--}}
            @else

                {{-- /HOME CONTAINER HOST--}}
                <div  class="appartament-container  py-4 d-none d-md-block">
                    <div class="scroll-section ">

                        <div class="appart-item  py-3 d-flex justify-content-between align-items-center">

                            <div class="d-flex align-items-center container-btn">
                                <img class="mx-2 img" src="{{ asset('storage/' . $announcement[0]->image ) }}" alt="">
                                <p
                                class="mb-0 d-none d-lg-block">{{ $announcement[0]->title }}</p>
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

                    </div>
                </div>
                {{-- /HOME-CONTAINER HOST--}}
            @endif



            {{-- NAV-SM ----------}}
            <div class="small-nav">

            </div>

        </div>
        {{-- MAIN COL JUMBO --}}
        <div class="  col-11 col-md-9 jumbo ">
            {{-- GUEST JUMBO --}}
            <div class="d-none d-md-block">
                @if (!count($user->announcements)>0)
                <div class=" jumbo-user container-fluid  d-flex align-items-center">
                    <div class="row px-2">
                        <div class=" col-11 col-lg-6 offset-lg-6 text user p-3 mt-5">
                            <h1>I nostri Host forniscono servizi digitali di alto livello, entra in contatto con loro e viaggia!</h1>
                        </div>
                    </div>
                </div>

                @else
                {{-- HOST JUMBO--}}
                <div class="  jumbo-host container-fluid d-flex align-items-center">
                    <div class="row px-2">
                        <div class=" col-11 col-lg-6 offset-lg-6 text user p-3 mt-5">
                            <h1>Entra in contatto con potenziali clienti, fagli sapere come puoi aiutarli!</h1>
                        </div>
                    </div>
                </div>
                {{-- /HOST --}}
                @endif
            </div>
            {{-- SHOW MESSAGE --}}
            <div class="container-fluid  show-col-message mt-3">
                <a href="{{ route('admin.messages.index') }}">
                    <div id="view-for-appartament" class=" d-block d-md-none message-appart  py-4 d-flex align-items-center">
                        <i class="fa-solid fa-circle-arrow-left"></i>
                        <h6 class="mb-0 ml-3">  Torna alla lista messaggi</h6>
                    </div>
                </a>

                @if (!count($user->announcements)>0)
                {{-- MEX USER --}}

                <div class="row  user-container px-2 px-xl-5">

                    <div class="col-12 col-lg-5  py-3">
                        <div>
                            {{-- mex-item --}}
                            <a href="">
                                <div class="user-item  d-flex align-items-center justify-content-between py-2 mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="img  ml-2"></div>
                                    <h6 class="mb-0 ml-3">Data Messaggio : {{ $message[0]['created_at'] }}</h6>
                                </div>

                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- area messaggi--}}
                    <div class="col-12 col-lg-7  py-3 px-2 px-xl-5 d-flex">
                        <div class="container-fluid">
                            <div class="row flex-wrap-reverse">
                                <div class="mex-box  col-12 d-flex flex-column justify-content-around py-3">
                                    <h6 class="mb-0">Messaggio:</h6>
                                    <div class="text box py-3 px-lg-3 mb-2 p-3">
                                        <p class="mb-2">{{ $message[0]['text'] }}</p>
                                    </div>
                                    <h6 class="mb-2">E-mail mittente:</h6>
                                    <div class="email box py-2 px-lg-3 p-3">
                                        <p class="mb-1">{{ $message[0]['email'] }}</p>
                                    </div>
                                    <h6 class="my-2">Nome mittente:</h6>
                                    <div class="email box py-2 px-lg-3 p-3">
                                        <p class="mb-0">{{ $message[0]['name'] }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- /area messaggi--}}
                </div>

                {{-- /MEX USER --}}
                @else

                {{-- MEX HOST --}}
                @foreach ($messages as $message)
                <div class="row  user-container px-2 px-xl-5">

                    <div class="col-12 col-lg-5  py-3">
                        <div >
                            {{-- mex-item --}}
                            <a href="{{ route('admin.messages.show', $message) }}" class="text-decoration-none">
                                <div class="user-item  d-flex align-items-center justify-content-between py-2 mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="img  ml-2"></div>
                                    <h6 class="mb-0 ml-3">Data Messaggio : {{ $message->created_at }}</h6>
                                </div>

                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- area messaggi--}}
                    <div class="col-12 col-lg-7  py-3 px-2 px-xl-5 d-flex">
                        <div class="container-fluid">
                            <div class="row flex-wrap-reverse">

                                <div class="mex-box  col-12 d-flex flex-column justify-content-around py-3">
                                    <h6 class="mb-2">Messaggio:</h6>
                                    <div class="text box py-3 px-lg-3 mb-2">
                                        <p class="mb-0">{{ $message->text }}</p>
                                    </div>
                                    <h6 class="mb-2">E-mail mittente:</h6>
                                    <div class="email box py-2 px-lg-3">
                                        <p class="mb-1">{{ $message->email }}</p>
                                    </div>
                                    <h6 class="my-2">Nome mittente:</h6>
                                    <div class="email box py-2 px-lg-3">
                                        <p class="mb-0">{{ $message->name }}</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- /area messaggi--}}
                </div>
                @endforeach
                {{-- /MEX HOST --}}
                @endif

            </div>
        </div>
    </div>

</div>


@endsection





