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
                    <div class="h-100 p-5 text-white coral-bg-back text-center b-round b-shadow">
                        <div class="d-flex justify-content-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"
                                class="img-fluid d-block mx-lg-auto rounded-circle my-3"
                                alt="{{ Auth::user()->name }} profile picture" width="300" height="300">
                        </div>

                        {{-- <a class="font-weight-bolder text-white" href="#">Aggiorna foto</a> --}}

                        <div class="border border-black my-3 p-3 b-round">
                            <h2 class="mb-3">Profilo di {{$user->name }} {{ $user->surname }}</h2>
                            <p>Su Bool BnB dal {{$user->created_at }}</p>
                            <p>{{$user->email }}</p>
                            <button class="btn btn-outline-light rounded-pill mt-2" type="button">
                                Modifica dati
                                <i class="fa-solid fa-gear fa-lg"></i>
                            </button>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border b-round b-shadow">
                        <h1 class="text-capitalize">Ciao <b class="coral-t-color">{{ Auth::user()->name }}</b>!</h1>
                        {{-- IF NUOVI MESSAGGI --}}
                        <div class="my-3">
                            <a href="{{ route('admin.messages.index') }}" class="text-dark">
                                <div class="card my-3 b-round hover-card">
                                    <ul class="fa-ul my-3 px-2">
                                        <li><span class="fa-li"><i class="fa-solid fa-envelope-open-text fa-2xl coral-t-color"></i></span><h3 class="mx-3">Vedi i tuoi messaggi</h3></li>
                                    </ul>
                                </div>
                            </a>
                            <a href="{{ route('admin.announcements.index') }}" class="text-dark">
                                <div class="card my-3 b-round hover-card">
                                    <ul class="fa-ul my-3 px-2">
                                        <li><span class="fa-li"><i class="fa-solid fa-house-user fa-2xl coral-t-color"></i></span><h3 class="mx-3">Vedi i tuoi annunci</h3></li>
                                    </ul>
                                </div>
                            </a>
                            <a href="{{ route('admin.announcements.create') }}" class="text-dark">
                                <div class="card my-3 b-round hover-card">
                                    <ul class="fa-ul my-3 px-2">
                                        <li><span class="fa-li"><i class="fa-solid fa-map-location-dot fa-2xl coral-t-color"></i></span><h3 class="mx-3">Nuovo appartamento</h3></li>
                                    </ul>
                                </div>
                            </a>
                        </div>

                        <div class="border border-black my-3 p-3 b-round">
                            <h3>Migliora la tua esperienza come Host con le nostre <b class="coral-t-color">Sponsorships</b></h3>
                            <p>Incrementa le tue possibilità di ricevere prenotazioni pubblicizzando efficacemente il tuo annuncio.</p>
                            <button id="scopri" class="btn btn-outline-dark rounded-pill" type="button">Scopri di più</button>
                        </div>

                    </div>
                </div>
            </div>
        @else
            {{-- Dashboard Guest --}}
            <div class="row align-items-md-stretch">
                <div class="col-md-6">
                    <div class="h-100 p-5 text-white coral-bg-back text-center b-round b-shadow">
                        <div class="d-flex justify-content-center">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"
                                class="img-fluid d-block mx-lg-auto rounded-circle my-3"
                                alt="{{ Auth::user()->name }} profile picture" width="300" height="300">
                        </div>

                        {{-- <a class="font-weight-bolder text-white" href="#">Aggiorna foto</a> --}}

                        <div class="border border-black my-3 p-3 b-round">
                            <h2 class="mb-3">Profilo di {{$user->name }} {{ $user->surname }}</h2>
                            <p>Su Bool BnB dal {{$user->created_at }}</p>
                            <p>{{$user->email }}</p>
                            <button class="btn btn-outline-light rounded-pill mt-2" type="button">
                                Modifica dati
                                <i class="fa-solid fa-gear fa-lg"></i>
                            </button>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="h-100 p-5 bg-light border b-round b-shadow">
                        <h1 class="text-capitalize">Ciao <b class="coral-t-color">{{ Auth::user()->name }}</b>!</h1>

                        <div class="my-3">

                            <a href="{{ route('admin.messages.index') }}" class="text-dark">
                                <div class="card p-3 my-3 b-round hover-card">
                                    <ul class="fa-ul my-3 px-2">
                                        <li><span class="fa-li"><i class="fa-solid fa-envelope-open-text fa-2xl coral-t-color"></i></span><h3 class="mx-3">Vedi i tuoi messaggi</h3></li>
                                    </ul>
                                </div>
                            </a>

                            <a href="{{ route('admin.announcements.create') }}" class="text-dark">
                                <div class="card p-3 my-3 b-round hover-card">
                                    <ul class="fa-ul my-3 px-2">
                                        <li><span class="fa-li"><i class="fa-solid fa-map-location-dot fa-2xl coral-t-color"></i></span><h3 class="mx-3">Crea il tuo primo annuncio</h3></li>
                                    </ul>
                                </div>
                            </a>

                        </div>

                        <div class="border border-black my-3 p-3 b-round">
                            <h3>Scopri tutti i vantaggi di diventare <b class="coral-t-color">Host</b></h3>
                            <p>Unisciti a noi, saremo al tuo fianco in ogni momento. Scopri come guadagnare come host
                                affittando
                                qualsiasi tipo di alloggio. Ti garantiamo protezione e assistenza sempre inclusa e gratuita
                                solo
                                su BoolBnB.</p>
                            <button id="scopri" class="btn btn-outline-dark rounded-pill" type="button">Scopri di più</button>
                        </div>

                    </div>
                </div>
            </div>
        @endif

    </div>
@endsection
