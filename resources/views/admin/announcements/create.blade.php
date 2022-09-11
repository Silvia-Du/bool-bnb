@extends('layouts.app')
@section('content')
    <div class="container w-75 my-5 create">
        <div class="row ">
            <div class=" box">
                <h1 class="text-center my-4">Crea il tuo annuncio</h1>
                 @if ($errors->any())
                        <div class="col-8 offset-2 alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                <form action="{{ route('admin.announcements.store') }}" method="POST" enctype="multipart/form-data"
                    class="comp_form">
                    @csrf
                    <form class="needs-validation">
                        <div class="row">
                            {{-- title --}}
                            <div class="col-12 mb-3">
                                <label for="title" class="form-label">
                                    <i class="fa-solid fa-pencil"></i>
                                    Titolo annuncio
                                </label>
                                <input type="text" id="title" name="title"
                                    class="js-data edit-data form-control @error('title') is-invalid @enderror"
                                    placeholder="Inserisci un titolo" value="{{ old('title') }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- image --}}
                            <div class="col-sm-6 mb-4">
                                <label for="image" class="form-label">
                                    <i class="fa-solid fa-image"></i>
                                    Immagine
                                </label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image">
                                @error('image')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>

                            {{-- Price --}}
                            <div class="col-sm-6 mb-4">
                                <label for="price" class="form-label">
                                    <i class="fa-solid fa-hand-holding-dollar"></i>
                                    Prezzo &euro;/notte
                                </label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>

                            {{-- address --}}
                            <div class="col-12 mb-3 address">
                                <label for="address" class="form-label">
                                    <i class="fa-solid fa-map-location-dot"></i>
                                    Indirizzo
                                </label>
                                {{-- <input type="text" id="address" name="address"
                                    class="js-data form-control @error('address') is-invalid @enderror"
                                    placeholder="Inserisci un Indirizzo" value="{{ old('address') }}">
                                @error('address')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror --}}
                            </div>

                            {{-- mq --}}
                            <div class="col-sm-6 mb-4">
                                <label for="mq" class="form-label">
                                    <i class="fa-solid fa-maximize"></i>
                                    Metri Quadri
                                </label>
                                <input type="number" id="mq" name="mq"
                                    class="js-data form-control @error('mq') is-invalid @enderror"
                                    placeholder="Inserisci i Metri Quadri" value="{{ old('mq') }}">
                                @error('mq')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- rooms --}}
                            <div class="col-sm-6 mb-4">
                                <label for="rooms" class="form-label">
                                    <i class="fa-solid fa-house"></i>
                                    Numero Stanze
                                </label>
                                <input type="number" id="rooms" name="rooms"
                                    class="js-data form-control @error('rooms') is-invalid @enderror"
                                    placeholder="Inserisci il Numero di Stanze" value="{{ old('rooms') }}">
                                @error('rooms')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- beds --}}
                            <div class="col-sm-6 mb-4">
                                <label for="beds" class="form-label">
                                    <i class="fa-solid fa-bed"></i>
                                    Numero Letti
                                </label>
                                <input type="number" id="beds" name="beds"
                                    class="js-data form-control @error('beds') is-invalid @enderror"
                                    placeholder="Inserisci il Numero di Letti" value="{{ old('beds') }}">
                                @error('beds')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- bathrooms --}}
                            <div class="col-sm-6 mb-4">
                                <label for="bathrooms" class="form-label">
                                    <i class="fa-solid fa-sink"></i>
                                    Numero Bagni
                                </label>
                                <input type="number" id="bathrooms" name="bathrooms"
                                    class="js-data form-control @error('bathrooms') is-invalid @enderror"
                                    placeholder="Inserisci il Numero di Bagni" value="{{ old('bathrooms') }}">
                                @error('bathrooms')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- house_type --}}
                            <div class="col-sm-6 mb-4">
                                <label for="house_type" class="form-label">
                                    <i class="fa-solid fa-igloo"></i>
                                    Tipo di Casa
                                </label>
                                <input type="text" id="house_type" name="house_type"
                                    class="js-data form-control @error('house_type') is-invalid @enderror"
                                    placeholder="Inserisci un Tipo di Casa" value="{{ old('house_type') }}">
                                @error('house_type')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            {{-- room_type --}}
                            <div class="col-sm-6 mb-4">
                                <label for="room_type" class="form-label">
                                    <i class="fa-solid fa-door-open"></i>
                                    Tipo di
                                    Stanza
                                </label>
                                <input type="text" id="room_type" name="room_type"
                                    class="js-data form-control @error('room_type') is-invalid @enderror"
                                    placeholder="Inserisci un Tipo di Stanza" value="{{ old('room_type') }}">
                                @error('room_type')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            {{-- Services --}}
                            <div class="col-12 mb-3 mt-1">


                                <form class="">
                                    <label for="room_type" class="form-label d-block">
                                        <i class="fa-solid fa-door-open"></i>
                                        Servizi
                                    </label>
                                    <div class="container-fluid my-3 services">
                                        <div class="row">

                                            @foreach ($services as $service)
                                            <div class="col-12 col-md-6 d-flex align-items-center py-3 service-line">

                                                <input
                                                type="checkbox"
                                                id="service-{{ $loop->iteration }}"
                                                name="services[]"
                                                value="{{ $service->id }}"
                                                @if (in_array($service->id, old("services",[]))) checked @endif>

                                                <label class="mb-0 ml-2" for="">{{ $service->name }}</label><br>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </form>
                            </div>

                            {{-- content --}}
                            <div class="col-12 mb-3 description">
                                <label for="description" class="form-label">
                                    <i class="fa-solid fa-pen-nib"></i>
                                    Descrizione
                                </label>
                                <textarea class="js-data form-control @error('description') is-invalid @enderror" name="description"
                                    id="description" cols="30" rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
                                @enderror

                                <div class="d-flex justify-content-center">
                                    <button id="btn-create" class="btn-big-plus sm my-3" type="submit">
                                        Invia
                                    </button>
                                </div>

                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const showImage = function(event) {
            const image = document.getElementById('output-image');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
