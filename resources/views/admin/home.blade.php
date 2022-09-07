@extends('layouts.app')

@section('content')
    <div class="container my-5 logged-admin-page">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{-- Dashboard Host --}}
        @if (count($user->announcements)> 0)

            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-5 text-white bg-dark rounded text-center ">
                        <div class="d-flex justify-content-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"
                                class="img-fluid d-block mx-lg-auto rounded-circle my-3"
                                alt="{{ Auth::user()->name }} profile picture" width="300" height="300">
                        </div>

                        {{-- <a class="font-weight-bolder text-white" href="#">Aggiorna foto</a> --}}

                        <div class="border border-white my-3 p-3 info-user w-100 mx-lg-3 m-1">
                            <h2 class="mb-3">Il tuo profilo</h2>
                            <p>NOME UTENTE: {{$user->name }} {{ $user->surname }}</p>
                            <p>DATA DI REGISTAZIONE: {{$user->created_at }}</p>
                            <p>E-MAIL DI ACCESSO: {{$user->email }}</p>
                            <button class="btn btn-outline-light mt-2" type="button">
                                Modifica dati
                                <img class="gear ml-1" src="{{ asset('img/admin-icon3.png') }}" alt="gear">
                            </button>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border rounded-3">
                        <h1 class="text-capitalize">Ciao <b>{{ Auth::user()->name }}!</b></h1>
                        {{-- IF NUOVI MESSAGGI --}}
                        <div class="my-3">
                            <a href="{{ route('admin.message') }}">
                                <div class="card p-3 my-3">
                                    <img class="posta mb-2" src="{{ asset('img/admin-icon1.png') }}" alt="posta">
                                    <h3 class="mb-0">Vedi i tuoi messaggi</h3>
                                </div>
                            </a>
                            <a href="{{ route('admin.announcements.index') }}">
                                <div class="card p-3 mb-3">
                                    <img class="house ml-1 mb-2" src="{{ asset('img/admin-icon2.png') }}" alt="house">
                                    <h3 class="mb-0">Vedi i tuoi annunci</h3>
                                </div>
                            </a>
                            <a href="{{ route('admin.announcements.index') }}">
                                <div class="card p-3">
                                    <img class="house-plus ml-1 mb-2" src="{{ asset('img/admin-icon4.png') }}" alt="house2">
                                    <h3 class="mb-0">Aggiungi un nuovo appartamento</h3>
                                </div>
                            </a>
                        </div>

                        <div class="border border-black my-3 p-3">
                            <h3>Migliora la tua esperienza come Host con le nostre <b>Sponsorships</b></h3>
                            <p>Incrementa le tue possibilità di ricevere prenotazioni pubblicizzando efficacemente il tuo annuncio.</p>
                            <button class="btn btn-outline-dark" type="button">Scopri di più</button>
                        </div>

                    </div>
                </div>
            </div>
        @else
            {{-- Dashboard Guest --}}
            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-5 text-white bg-dark rounded text-center d-flex flex-column align-items-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"
                            class="img-fluid d-block mx-lg-auto rounded-circle my-3"
                            alt="{{ Auth::user()->name }} profile picture" width="300" height="300">

                        {{-- <a class="font-weight-bolder text-white" href="#">Aggiorna foto</a> --}}

                        <div class="border border-white my-3 p-3 info-user w-100 mx-lg-3 m-1">
                            <h2 class="mb-3">Il tuo profilo</h2>
                            <p>NOME UTENTE: {{$user->name }} {{ $user->surname }}</p>
                            <p>DATA DI REGISTAZIONE: {{$user->created_at }}</p>
                            <p>E-MAIL DI ACCESSO: {{$user->email }}</p>
                            <button class="btn btn-outline-light" type="button">
                                Modifica dati
                                <img class="gear ml-1" src="{{ asset('img/admin-icon3.png') }}" alt="gear">
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border rounded-3">
                        <h1 class="text-capitalize">Ciao <b>{{ Auth::user()->name }}</b>!</h1>

                        <div class="my-3">

                            <a href="{{ route('admin.message') }}">
                                <div class="card p-3 my-3">
                                    <img class="posta mb-2" src="{{ asset('img/admin-icon1.png') }}" alt="posta">
                                    <h3 class="mb-0">Vedi i tuoi messaggi</h3>
                                </div>
                            </a>
                            <a href="#">
                                <div class="card p-3">
                                    <img class="house ml-1 mb-2" src="{{ asset('img/admin-icon2.png') }}" alt="house">
                                    <h3 class="mb-0">Crea il tuo primo annuncio</h3>
                                </div>
                            </a>
                        </div>

                        <div class="border border-black my-3 p-3">
                            <h3>Scopri tutti i vantaggi di diventare <b>Host</b></h3>
                            <p>Unisciti a noi, saremo al tuo fianco in ogni momento. Scopri come guadagnare come host
                                affittando
                                qualsiasi tipo di alloggio. Ti garantiamo protezione e assistenza sempre inclusa e gratuita
                                solo
                                su BoolBnB.</p>
                            <button class="btn btn-outline-dark" type="button">Scopri di più</button>
                        </div>

                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
