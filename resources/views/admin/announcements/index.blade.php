@extends('layouts.app')

@section('content')


@if (session('delete_announcemenet'))
    <div class="alert alert-danger" role="alert">
        {{ session('post_deleted') }}
    </div>
@endif

<h1>Elenco annunci</h1>
<a class="btn btn-rounded-plus mb-3 ml-5" href="{{ route('admin.announcements.create') }}">
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


    <div class="container-fluid px-5">

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Titlo</th>
                    <th scope="col">Camere</th>
                    <th scope="col">Letti</th>
                    <th scope="col">Bagni</th>
                    <th scope="col">mq</th>
                    <th scope="col">indirizzo</th>
                    <th scope="col">Tipologia alloggio</th>
                    <th scope="col">Tipologia camera</th>
                    <th scope="col">Pubblico</th>
                    <th scope="col">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($announcements as $announcement)
                    <tr>
                        <th scope="row">{{ $announcement->id }}</th>

                        <td>{{ $announcement->title }}</td>
                        <td>{{ $announcement->rooms }}</td>
                        <td>{{ $announcement->beds }}</td>
                        <td>{{ $announcement->bathrooms }}</td>
                        <td>{{ $announcement->mq }}</td>
                        <td>{{ $announcement->address . ',' . $announcement->city . ',' . $announcement->country }} </td>
                        <td>{{ $announcement->house_type }}</td>
                        <td>{{ $announcement->room_type }}</td>
                        <td>{{ $announcement->is_visible }}</td>


                        <td >
                            <a class="btn btn-warning"
                                href="{{ route('admin.announcements.show', $announcement) }}">VEDI</a>
                            <a class="btn btn-success"
                                href="{{ route('admin.announcements.edit', $announcement) }}">MODIFICA</a>
                            <form class="d-inline" action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST"
                                onsubmit="return confirm('Stai per cancellare questo annuncio, confermi?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">DELETE</button>
                            </form>
                            {{-- <form
                        onsubmit="return confirm('Confermi l\'eliminazione del post: {{$announcement->title}}?')"
                        class="d-inline" action="{{ route('admin.posts.destroy', $announcement) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" >ELIMINA</button>
                        </form> --}}
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
    @endif
    {{-- {{ $announcements->links() }} --}}

    </div>
@endsection
