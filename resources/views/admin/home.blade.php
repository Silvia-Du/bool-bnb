@extends('layouts.app')

@section('content')
    <div class="container my-5">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{-- Dashboard Guest --}}

        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-dark rounded text-center ">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"
                        class="img-fluid d-block mx-lg-auto rounded-circle my-3"
                        alt="{{ Auth::user()->name }} profile picture" width="300" height="300">

                    <a class="font-weight-bolder text-white" href="#">Aggiorna foto</a>

                    <div class="border border-white my-3 p-3 rounded-pill">
                        <h2>Diventa Host</h2>
                        <button class="btn btn-outline-light" type="button">Sponsorship</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h1>Ciao <b>{{ Auth::user()->name }}</b> cosa ti va di fare oggi?</h1>

                    <div class="my-3">
                        <a href="#">
                            <div class="card p-3 my-3">
                                <h1>✉️</h1>
                                <h3>Visita il centro messaggi</h3>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card p-3">
                                <h1>🏠</h1>
                                <h3>Controlla i tuoi annunci</h3>
                            </div>
                        </a>
                    </div>

                    <div class="border border-black my-3 p-3">
                        <h3>Scopri tutti i vantaggi di diventare <b>Host</b></h3>
                        <p>Unisciti a noi, saremo al tuo fianco in ogni momento. Scopri come guadagnare come host affittando
                            qualsiasi tipo di alloggio. Ti garantiamo protezione e assistenza sempre inclusa e gratuita solo
                            su BoolBnB.</p>
                        <button class="btn btn-outline-dark" type="button">Scopri di più</button>
                    </div>

                </div>
            </div>
        </div>

        {{-- Dashboard Host --}}

        {{-- <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div class="h-100 p-5 text-white bg-dark rounded text-center ">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png"
                        class="img-fluid d-block mx-lg-auto rounded-circle my-3"
                        alt="{{ Auth::user()->name }} profile picture" width="300" height="300">

                    <a class="font-weight-bolder text-white" href="#">Aggiorna foto</a>

                    <div class="my-3 p-3">
                        <div class="my-3"><a class="btn btn-outline-light" href="#">Aggiungi nuovo appartamento</a></div>
                        <div class="my-3"><a class="btn btn-outline-light" href="#">I tuoi appartamenti</a></div>
                        <div class="my-3"><a class="btn btn-outline-light" href="#">Le tue sponsorships attive</a></div>
                    </div>

                </div>
            </div>

            <div class="col-md-6">
                <div class="h-100 p-5 bg-light border rounded-3">
                    <h1>Ciao <b>{{ Auth::user()->name }}</b> cosa ti va di fare oggi?</h1>

                    <div class="my-3">
                        <a href="#">
                            <div class="card p-3 my-3">
                                <h1>✉️</h1>
                                <h3>Visita il centro messaggi</h3>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card p-3">
                                <h1>🏠</h1>
                                <h3>Controlla i tuoi annunci</h3>
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
        </div> --}}

    </div>
    </div>
    </div>
    </div>

@endsection
