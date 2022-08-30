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
                            <p>MQ: {{ $announcement->mq }}</p>
                            <p>Nr stanze: {{ $announcement->rooms }}</p>
                            <p>Nr Letti: {{ $announcement->beds }}</p>
                            <p>Nr Bagni: {{ $announcement->bathrooms }}</p>
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
        </div>
    </div>

@endsection
