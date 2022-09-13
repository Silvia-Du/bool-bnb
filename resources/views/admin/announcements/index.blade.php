@extends('layouts.app')
@section('content')

    <div class="container-fluid my-5">

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
                {{-- Nessun Annuncio --}}

                @if (count($announcements) === 0)

                <div class="p-3 container b-round b-shadow">
                    <div class="row">
                        <div class="col-6 d-flex justify-content-center">
                            <img src="https://i.ibb.co/BnVxbZH/people3.png" alt="people">
                        </div>
                        <div class="col-6 py-3 d-flex flex-column justify-content-center">
                            <div>
                                <h3 class="mb-4">Non hai ancora annunci pubblicati</h3>
                                <h4>Perché non ne creiamo qualcuno?</h4>
                                <div class="my-5">
                                    <a
                                    class="btn-rounded-plus text-center text-decoration-none"
                                    id="no-deco"
                                    href="{{ route('admin.announcements.create') }}">
                                    Crea un nuovo annuncio
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endif



                {{-- Annunci presenti --}}

                @if (count($announcements) > 0)
                <h1 class="text-center">Elenco annunci</h1>
                    <a class="btn btn-rounded-plus mb-3 ml-5 text-center" href="{{ route('admin.announcements.create') }}">
                        Crea un nuovo annuncio
                    </a>

            </div>

            <div class="container-fluid  px-5">

                <div class="row ">
                    @foreach ($announcements as $announcement)
                        <div class="box-house col-sm-12 col-lg-12 container-fluid d-flex justify-content-around p-4">
                            @if ($announcement->image)

                            <img class="img-fluid d-block  b-round b-shadow" src="{{ asset('storage/' . $announcement->image ) }}" alt="{{ $announcement->image_original_name }}">
                            @else

                            <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/suburban-house-royalty-free-image-1584972559.jpg"
                                class="img-fluid d-block  b-round b-shadow" alt="{{ $announcement->image_original_name }}">
                            @endif

                            <div class=" house-info py-4 ">
                                <h6 class="spacebar"> indirizzo :</h6>
                                <p>{{ $announcement->address }}</p>
                                <p>{{ $announcement->city }}</p>
                                <p>{{ $announcement->country }}</p>
                                <h6 class="spacebar"> tipologia camera :</h6>
                                <p>{{ $announcement->house_type }}</p>
                                <h6 class="spacebar"> status:</h6>
                                @if ($announcement->is_visible == 1)
                                    <p>Pubblico</p>
                                @else
                                    <p>Privato</p>
                                @endif

                            </div>

                            <div class="house-action d-flex flex-column justify-content-center">
                                <a class="btn-small-plus my-2"
                                    href="{{ route('admin.announcements.show', $announcement) }}">
                                <i class="fa-solid fa-eye fa-lg my-2 mx-1"></i></a>

                                <a class="btn-small-plus my-2"
                                    href="{{ route('admin.announcements.edit', $announcement) }}">
                                <i class="fa-solid fa-pen-to-square fa-lg my-2 mx-1"></i></a>

                                {{-- <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST"
                                    onsubmit="return confirm('Stai per cancellare questo annuncio, confermi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                </form> --}}
                                {{-- sostituito con questo bottone qui sotto --}}
                                <a href="#" data-id={{ $announcement->id }} class="btn-small-plus my-2"
                                    data-toggle="modal" data-target="#deleteModal">
                                    <i class="fa-solid fa-trash-can fa-lg my-2 mx-1"></i>
                                </a>
                            </div>

                            {{-- modale eliminazione --}}
                            <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog"
                            aria-labelledby="Delete" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Elimazione annuncio</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- occhio qui al tag form --}}
                                            <form action="{{ route('admin.announcements.destroy', $announcement) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <h5 class="text-center">Eliminare l'annuncio?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annula</button>
                                            <button type="submit" class="btn btn-danger">Conferma</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                        </div>
                    @endforeach
                </div>

            </div>
        @endif
    </div>
@endsection

<script>
     $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            $('#id').val(id);
        });
</script>
