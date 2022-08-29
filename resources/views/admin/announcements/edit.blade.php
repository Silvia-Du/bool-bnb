@extends('layouts.app')

@section('content')

<h1>Edit annunci</h1>

<div class="container-fluid px-5">
    <form action="{{ route('admin.announcements.update' ['announcements' -> $announcements->id]) }}" method="announcements">
    @csrf
    @method('PUT')
    <div class="mn-3">
        <label for="title" class="form-label">Titolo annuncio</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title',$announcement->title)}}">

            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

    <div class="mn-3">
        <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address',$announcement->address)}}">

            @error('address')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

        <div class="mn-3">
        <label for="address" class="form-label">Città</label>
            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{ old('city',$announcement->city)}}">

            @error('city')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

        <div class="mn-3">
        <label for="country" class="form-label">Nazione</label>
            <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" value="{{ old('country',$announcement->country)}}">

            @error('country')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

        <div class="mn-3">
        <label for="img" class="form-label">Immagini</label>
            <input type="text" class="form-control @error('img') is-invalid @enderror" name="img" id="img" value="{{ old('img',$announcement->img)}}">

            @error('img')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

        <div class="mn-3">
        <label for="mq" class="form-label">Metri Quadri</label>
            <input type="text" class="form-control @error('mq') is-invalid @enderror" name="mq" id="mq" value="{{ old('mq',$announcement->mq)}}">

            @error('mq')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

        <div class="mn-3">
        <label for="rooms" class="form-label">Numero Stanze</label>
            <input type="text" class="form-control @error('rooms') is-invalid @enderror" name="rooms" id="rooms" value="{{ old('rooms',$announcement->rooms)}}">

            @error('rooms')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

        <div class="mn-3">
        <label for="beds" class="form-label">Numero letti</label>
            <input type="text" class="form-control @error('beds') is-invalid @enderror" name="beds" id="beds" value="{{ old('beds',$announcement->beds)}}">

            @error('beds')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

        <div class="mn-3">
        <label for="bathrooms" class="form-label">Numero bagni</label>
            <input type="text" class="form-control @error('bathrooms') is-invalid @enderror" name="bathrooms" id="bathrooms" value="{{ old('bathrooms',$announcement->bathrooms)}}">

            @error('bathrooms')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

        <div class="mn-3">
        <label for="house_type" class="form-label">Tipo di Casa</label>
            <input type="text" class="form-control @error('house_type') is-invalid @enderror" name="house_type" id="house_type" value="{{ old('house_type',$announcement->house_type)}}">

            @error('house_type')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

        <div class="mn-3">
        <label for="room_type" class="form-label">Tipo di Stanza</label>
            <input type="text" class="form-control @error('room_type') is-invalid @enderror" name="room_type" id="room_type" value="{{ old('room_type',$announcement->room_type)}}">

            @error('room_type')
            <p class="text-danger">{{$message}}</p>
            @enderror
    </div>

        <div class="mn-3">
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

@endsection
