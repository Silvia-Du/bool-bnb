@extends('layouts.app')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="box">
                <h1 class="text-center">Modifica di {{ $announcement->title }}</h1>
                <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST"
                    enctype="multipart/form-data" class="comp_form">
                    @csrf
                    @method('PUT')

                    <form class="needs-validation">
                        <div class="row g-3">
                            {{-- title --}}
                            <div class="col-12">
                                <label for="title" class="form-label"><i class="fa-solid fa-pencil"></i> Titolo
                                    annuncio</label>
                                <input type="text" class="edit-data form-control @error('title') is-invalid @enderror"
                                    name="title" id="title" value="{{ old('title', $announcement->title) }}">
                                @error('title')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- image --}}
                            <div class="col-12">
                                @if ($announcement->image)
                                    <div class="col-12">
                                        <img id='output-image' width="150"
                                            src="{{ asset('storage/' . $announcement->image) }}"
                                            alt="{{ $announcement->image_original_name }}">
                                    </div>
                                @endif
                                <label for="image" class="form-label"><i class="fa-solid fa-image"></i> Immagine</label>
                                <input type="file" onchange="showImage(event)"
                                    class="edit-data form-control @error('image') is-invalid @enderror" id="image"
                                    name="image">
                                @error('image')
                                    <p class="text-danger"> {{ $message }} </p>
                                @enderror
                            </div>

                            {{-- address --}}
                            <div class="col-12">
                                <label for="address" class="form-label"><i class="fa-solid fa-map-location-dot"></i>
                                    Indirizzo</label>
                                <input type="text" class="edit-data form-control @error('address') is-invalid @enderror"
                                    name="address" id="address" value="{{ old('address', $announcement->address) }}">
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- city --}}
                            <div class="col-sm-6">
                                <label for="city" class="form-label"><i class="fa-solid fa-location-dot"></i>
                                    Città</label>
                                <input type="text" class="edit-data form-control @error('city') is-invalid @enderror"
                                    name="city" id="city" value="{{ old('city', $announcement->city) }}">
                                @error('city')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- country --}}
                            <div class="col-sm-6">
                                <label for="country" class="form-label"><i class="fa-solid fa-earth-europe"></i>
                                    Nazione</label>
                                <input type="text" class="edit-data form-control @error('country') is-invalid @enderror"
                                    name="country" id="country" value="{{ old('country', $announcement->country) }}">
                                @error('country')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- mq --}}
                            <div class="col-sm-6">
                                <label for="mq" class="form-label"><i class="fa-solid fa-maximize"></i> Metri
                                    Quadri</label>
                                <input type="text" class="edit-data form-control @error('mq') is-invalid @enderror"
                                    name="mq" id="mq" value="{{ old('mq', $announcement->mq) }}">
                                @error('mq')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- rooms --}}
                            <div class="col-sm-6">
                                <label for="rooms" class="form-label"><i class="fa-solid fa-house"></i> Numero
                                    Stanze</label>
                                <input type="text" class="edit-data form-control @error('rooms') is-invalid @enderror"
                                    name="rooms" id="rooms" value="{{ old('rooms', $announcement->rooms) }}">
                                @error('rooms')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- beds --}}
                            <div class="col-sm-6">
                                <label for="beds" class="form-label"><i class="fa-solid fa-bed"></i> Numero
                                    Letti</label>
                                <input type="text" class="edit-data form-control @error('beds') is-invalid @enderror"
                                    name="beds" id="beds" value="{{ old('beds', $announcement->beds) }}">
                                @error('beds')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- bathrooms --}}
                            <div class="col-sm-6">
                                <label for="bathrooms" class="form-label"><i class="fa-solid fa-sink"></i> Numero
                                    Bagni</label>
                                <input type="text"
                                    class="edit-data form-control @error('bathrooms') is-invalid @enderror"
                                    name="bathrooms" id="bathrooms"
                                    value="{{ old('bathrooms', $announcement->bathrooms) }}">
                                @error('bathrooms')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- house_type --}}
                            <div class="col-sm-6">
                                <label for="house_type" class="form-label"><i class="fa-solid fa-igloo"></i> Tipo di
                                    Casa</label>
                                <input type="text"
                                    class="edit-data form-control @error('house_type') is-invalid @enderror"
                                    name="house_type" id="house_type"
                                    value="{{ old('house_type', $announcement->house_type) }}">
                                @error('house_type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- room_type --}}
                            <div class="col-sm-6">
                                <label for="room_type" class="form-label"><i class="fa-solid fa-door-open"></i> Tipo di
                                    Stanza</label>
                                <input type="text"
                                    class="edit-data form-control @error('room_type') is-invalid @enderror"
                                    name="room_type" id="room_type"
                                    value="{{ old('room_type', $announcement->room_type) }}">
                                @error('room_type')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- description --}}
                            <div class="col-12">
                                <label for="description" class="form-label"><i class="fa-solid fa-pen-nib"></i>
                                    Descrizione</label>
                                <textarea class="edit-data form-control @error('description') is-invalid @enderror" name="description"
                                    id="description" rows="3">{{ old('description', $announcement->description) }}</textarea>
                                @error('description')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror


                                <button id="btn-edit" class="w-100 btn btn-dark btn-lg my-3" type="submit">Invia</button>

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
