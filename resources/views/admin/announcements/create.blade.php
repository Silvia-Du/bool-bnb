@extends('layouts.app')

@section('content')

    <div class="container my-5">

        <div class="row">
            @if ($errors->any())
                <div class="col-8 offset-2 alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-8 offset-2">
                <h2 class="mb-3">Inserisci un nuovo Annuncio</h2>

                <form action="{{ route('admin.announcements.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    {{-- title --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo annuncio</label>
                        <input type="text" id="title" name="title"
                            class="form-control @error('title') is-invalid @enderror" placeholder="Inserisci un titolo"
                            value="{{ old('title') }}">

                        @error('title')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- address --}}
                    <div class="mb-3">
                        <label for="address" class="form-label">Indirizzo</label>
                        <input type="text" id="address" name="address"
                            class="form-control @error('address') is-invalid @enderror" placeholder="Inserisci un Indirizzo"
                            value="{{ old('address') }}">

                        @error('address')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- city --}}
                    <div class="mb-3">
                        <label for="city" class="form-label">Città</label>
                        <input type="text" id="city" name="city"
                            class="form-control @error('city') is-invalid @enderror" placeholder="Inserisci una Città"
                            value="{{ old('city') }}">

                        @error('city')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- country --}}
                    <div class="mb-3">
                        <label for="country" class="form-label">Nazione</label>
                        <input type="text" id="country" name="country"
                            class="form-control @error('country') is-invalid @enderror" placeholder="Inserisci una Nazione"
                            value="{{ old('country') }}">

                        @error('country')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                     {{-- image --}}
                    <div class="mn-3">
                        <label for="image" class="form-label">Immagine</label>
                        <input type="file"
                                class="form-control @error('image') is-invalid @enderror"
                            id="image" name="image" >
                            @error('image')
                                <p class="text-danger"> {{$message}} </p>
                            @enderror
                    </div>

                    {{-- mq --}}
                    <div class="mb-3">
                        <label for="mq" class="form-label">Metri Quadri</label>
                        <input type="number" id="mq" name="mq"
                            class="form-control @error('mq') is-invalid @enderror" placeholder="Inserisci i Metri Quadri"
                            value="{{ old('mq') }}">

                        @error('mq')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- rooms --}}
                    <div class="mb-3">
                        <label for="rooms" class="form-label">Numero Stanze</label>
                        <input type="number" id="rooms" name="rooms"
                            class="form-control @error('rooms') is-invalid @enderror" placeholder="Inserisci il Numero di Stanze"
                            value="{{ old('rooms') }}">

                        @error('rooms')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- beds --}}
                    <div class="mb-3">
                        <label for="beds" class="form-label">Numero Letti</label>
                        <input type="number" id="beds" name="beds"
                            class="form-control @error('beds') is-invalid @enderror" placeholder="Inserisci il Numero di Letti"
                            value="{{ old('beds') }}">

                        @error('beds')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- bathrooms --}}
                    <div class="mb-3">
                        <label for="bathrooms" class="form-label">Numero Bagni</label>
                        <input type="number" id="bathrooms" name="bathrooms"
                            class="form-control @error('bathrooms') is-invalid @enderror" placeholder="Inserisci il Numero di Bagni"
                            value="{{ old('bathrooms') }}">

                        @error('bathrooms')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- house_type --}}
                    <div class="mb-3">
                        <label for="house_type" class="form-label">Tipo di Casa</label>
                        <input type="text" id="house_type" name="house_type"
                            class="form-control @error('house_type') is-invalid @enderror" placeholder="Inserisci un Tipo di Casa"
                            value="{{ old('house_type') }}">

                        @error('house_type')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- room_type --}}
                    <div class="mb-3">
                        <label for="room_type" class="form-label">Tipo di Stanza</label>
                        <input type="text" id="room_type" name="room_type"
                            class="form-control @error('room_type') is-invalid @enderror" placeholder="Inserisci un Tipo di Stanza"
                            value="{{ old('room_type') }}">

                        @error('room_type')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- content --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30"
                            rows="10">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>
            </div>
        </div>

    </div>

@endsection
