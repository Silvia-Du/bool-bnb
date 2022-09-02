@extends('layouts.app')
@section('content')

    <div class="container my-5">

        @if (session('delete_announcement'))
            <div class="alert alert-danger container py-3 text-center" role="alert">
                {{ session('delete_announcement') }}
            </div>
        @endif

        @if (session('post_deleted'))
            <div class="alert alert-danger" role="alert">
                {{ session('post_deleted') }}
            </div>
        @endif

            <div class="box">
                <h1 class="text-center">Elenco annunci</h1>

                {{-- Nessun Annuncio --}}
                @if (count($announcements) === 0)
                    <div class="text-center">
                        <h3>Sembra che non ci sono annunci, perché non ne creiamo qualcuno?</h3>
                        <p>Altro testo molto convincente per motivarti a scrivere un'annuncio daje daje</p>
                        <a class="btn btn-rounded-plus mb-3 ml-5 text-center"
                            href="{{ route('admin.announcements.create') }}">
                            Crea un nuovo annuncio
                        </a>
                    </div>
                @endif

                {{-- Annunci presenti --}}
                @if (count($announcements) > 0)
                    <a class="btn btn-rounded-plus mb-3 ml-5 text-center" href="{{ route('admin.announcements.create') }}">
                        Crea un nuovo annuncio
                    </a>

            </div>

            <div class="container-fluid  px-5">

                <div class="row ">
                    @foreach ($announcements as $announcement)
                        <div class="box-house col-sm-12 col-lg-12 container-fluid d-flex justify-content-around p-4">
                            <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/suburban-house-royalty-free-image-1584972559.jpg"
                                alt="">
                            <div class=" house-info py-4 ">
                                <h6> indirizzo :</h6>
                                <p>{{ $announcement->address }}</p>
                                <p>{{ $announcement->city }}</p>
                                <p>{{ $announcement->country }}</p>
                                <h6> tipologia camera :</h6>
                                <p>{{ $announcement->house_type }}</p>
                                <h6> status:</h6>
                                @if ($announcement->is_visible == 1)
                                    <p>Pubblico</p>
                                @else
                                    <p>Privato</p>
                                @endif

                            </div>

                            <div class="house-action  justify-content-center py-4">
                                <a class="btn btn-warning my-3"
                                    href="{{ route('admin.announcements.show', $announcement) }}">VEDI</a>

                                <a class="btn btn-success my-3"
                                    href="{{ route('admin.announcements.edit', $announcement) }}">MODIFICA</a>

                                <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST"
                                    onsubmit="return confirm('Stai per cancellare questo annuncio, confermi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            </div>

                            {{-- Modale avviso eliminazione
                            <div class="modal-content rounded-4 shadow">
                            <div class="modal-body p-4 text-center">
                                <h5 class="mb-0">Confermi l'eliminazione dell'annuncio?</h5>
                            </div>
                            <div class="modal-footer flex-nowrap p-0">
                                <button type="button"
                                    class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>Si</strong></button>
                                <button type="button"
                                    class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0"
                                    data-bs-dismiss="modal">No</button>
                            </div>
                            </div> --}}

                        </div>
                    @endforeach
                </div>

            </div>
        @endif
    </div>
@endsection
