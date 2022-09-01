@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="text-center">
            <h1>{{ $announcement->title }}</h1>
        </div>

        <div class="container col-xxl-8 px-4 py-3">
            <div class="row flex-lg-row align-items-center g-5 py-3">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/suburban-house-royalty-free-image-1584972559.jpg"
                        class="img-fluid d-block mx-lg-auto rounded" alt="{{ $announcement->image_original_name }}">
                </div>

                <div class="col-lg-6">
                    <h4>{{ $announcement->house_type }}, {{ $announcement->room_type }}</h4>
                    <p>{{ $announcement->address }}, {{ $announcement->city }}, {{ $announcement->country }}</p>

                    <div class="card">
                        <div class="card-body">
                            <h6>MQ:</h6>
                            <p>{{ $announcement->mq }}</p>
                            <h6>Nr stanze:</h6>
                            <p>{{ $announcement->rooms }}</p>
                            <h6>Nr Letti:</h6>
                            <p>{{ $announcement->beds }}</p>
                            <h6>Nr Bagni:</h6>
                            <p>{{ $announcement->bathrooms }}</p>
                            <h6>Servizi:</h6>
                            <ul>
                                @foreach ($announcement->services as $service )
                                    <li><p>{{ $service->name }}</p></li>
                                @endforeach
                            </ul>

                            <div class="d-flex flex-row-reverse">
                                <a class="btn btn-warning"
                                    href="{{ route('admin.announcements.index', $announcement) }}">BACK</a>
                                <a class="btn btn-success mx-2"
                                    href="{{ route('admin.announcements.edit', $announcement) }}">MODIFICA</a>
                                <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST"
                                    onsubmit="return confirm('Stai per cancellare questo annuncio, confermi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <p class="lead"> {{ $announcement->description }} </p>
                </div>
            </div>

            <div class="card my-3">
                <div class="card-body">
                    <p class="lead">Sponsorizzazione</p>
                </div>
            </div>

            {{-- Chart.Js --}}
            <div class="card my-3">
                <div class="card-body">
                    <p class="lead">Statistiche annuncio</p>

                    <img src="https://api.backlinko.com/app/uploads/2021/06/airbnb-revenue.png"
                        class="img-fluid d-block mx-lg-auto rounded" alt="chart example" width="700" height="250">

                </div>
            </div>
        </div>
    </div>
@endsection
