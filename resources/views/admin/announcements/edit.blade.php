@extends('layouts.app')

@section('content')

<h1 class="my-5 text-center">Modifica di {{ $announcement->title }}</h1>

<div class="container px-5">
    <form action="{{ route('admin.announcements.update', $announcement) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    {{-- title --}}
    <div class="mb-3">
        <label for="title" class="form-label">Titolo annuncio</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title',$announcement->title)}}">

            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

    {{-- address --}}
    <div class="mb-3">
        <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address',$announcement->address)}}">

            @error('address')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

    {{-- city --}}
    <div class="mb-3">
    <label for="city" class="form-label">Città</label>
        <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{ old('city',$announcement->city)}}">

        @error('city')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-3">
    <label for="country" class="form-label">Nazione</label>
        <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" value="{{ old('country',$announcement->country)}}">

        @error('country')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    {{-- image --}}
    <div class="mb-3">

        @if($announcement->image)
            <div class="image" >
                <img id='output-image' width="150" src="{{ asset('storage/' . $announcement->image ) }}" alt="{{ $announcement->image_original_name }}">
            </div>
        @endif
        <label for="image" class="form-label">Immagine</label>
        <input type="file"
        onchange="showImage(event)"
        class="form-control @error('image') is-invalid @enderror"
        id="image" name="image" >
        @error('image')
            <p class="text-danger"> {{$message}} </p>
        @enderror
    </div>


    {{-- mq --}}
    <div class="mb-3">
    <label for="mq" class="form-label">Metri Quadri</label>
        <input type="text" class="form-control @error('mq') is-invalid @enderror" name="mq" id="mq" value="{{ old('mq',$announcement->mq)}}">

        @error('mq')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    {{-- stanze --}}
    <div class="mb-3">
    <label for="rooms" class="form-label">Numero Stanze</label>
        <input type="text" class="form-control @error('rooms') is-invalid @enderror" name="rooms" id="rooms" value="{{ old('rooms',$announcement->rooms)}}">

        @error('rooms')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    {{-- beds --}}
    <div class="mb-3">
    <label for="beds" class="form-label">Numero letti</label>
        <input type="text" class="form-control @error('beds') is-invalid @enderror" name="beds" id="beds" value="{{ old('beds',$announcement->beds)}}">

        @error('beds')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    {{-- bathroom --}}
    <div class="mb-3">
    <label for="bathrooms" class="form-label">Numero bagni</label>
        <input type="text" class="form-control @error('bathrooms') is-invalid @enderror" name="bathrooms" id="bathrooms" value="{{ old('bathrooms',$announcement->bathrooms)}}">

        @error('bathrooms')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    {{-- house-type --}}
    <div class="mb-3">
    <label for="house_type" class="form-label">Tipo di Casa</label>
        <input type="text" class="form-control @error('house_type') is-invalid @enderror" name="house_type" id="house_type" value="{{ old('house_type',$announcement->house_type)}}">

        @error('house_type')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    {{-- room-type --}}
    <div class="mb-3">
    <label for="room_type" class="form-label">Tipo di Stanza</label>
        <input type="text" class="form-control @error('room_type') is-invalid @enderror" name="room_type" id="room_type" value="{{ old('room_type',$announcement->room_type)}}">

        @error('room_type')
        <p class="text-danger">{{$message}}</p>
        @enderror
    </div>

    {{-- content --}}
    <div class="mb-3">
        <label for="content" class="form-label">Descrizione</label>
            <input type="text" class="form-control @error('content') is-invalid @enderror" name="content" id="content" value="{{ old('content',$announcement->content)}}">

            @error('content')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

    <button type="submit" class="btn btn-primary">Invia</button>
</form>
</div>

</div>

<script>
    var showImage = function(event) {
        const image = document.getElementById('output-image');
        image.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

@endsection
