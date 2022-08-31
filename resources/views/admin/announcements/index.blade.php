@extends('layouts.app')

@section('content')


@if (session('delete_announcemenet'))
    <div class="alert alert-danger" role="alert">
        {{ session('post_deleted') }}
    </div>
@endif

<h1 class="text-center">Elenco annunci</h1>
<a class="btn btn-rounded-plus mb-3 ml-5 text-center" href="{{ route('admin.announcements.create') }}">
    {{-- btn-edit --}}
    Crea un nuovo articolo
    <i class="fa-solid fa-file-pen"></i>
</a>

    @if (session('post_deleted'))
        <div class="alert alert-danger" role="alert">
            {{ session('post_deleted') }}
        </div>
    @endif

    @if (count($announcements) > 0)


    <div class="container-fluid  px-5">



            <div class="row ">
                @foreach ($announcements as $announcement)

                    <div class="box-house  col-sm-12 col-lg-12   container-fluid d-flex justify-content-around p-4 ">
                        <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/suburban-house-royalty-free-image-1584972559.jpg" alt="">
                        <div class=" house-info py-4 ">
                            <h6> indirizzo:</h6>
                            <p>{{ $announcement->address  }}</p>
                            <p>{{ $announcement->city }}</p>
                            <p>{{ $announcement->country }}</p>
                            <h6> tipologia camera:</h6>
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
                    </div>

                @endforeach
            </div>


    </div>
    @endif
    {{-- {{ $announcements->links() }} --}}

    </div>
@endsection
