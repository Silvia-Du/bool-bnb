@extends('layouts.app')

@section('content')

    <div class="container my-5">
        <div class="text-center">
            <h1>{{ $announcement->title }}</h1>
        </div>

        <div class="container col-xxl-8 px-4 py-3">
            <div class="row flex-lg-row align-items-center g-5 py-3">
                <div class="col-10 col-sm-8 col-lg-6">
                    {{-- @dd($announcement->image) --}}
                    @if ($announcement->image)

                    <img class="img-fluid d-block mx-lg-auto b-round b-shadow" src="{{ asset('storage/' . $announcement->image ) }}" alt="{{ $announcement->image_original_name }}">
                    @else

                    <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/suburban-house-royalty-free-image-1584972559.jpg"
                        class="img-fluid d-block mx-lg-auto b-round b-shadow" alt="{{ $announcement->image_original_name }}">
                    @endif
                </div>

                <div class="col-lg-6">
                    <h4>{{ $announcement->house_type }}, {{ $announcement->room_type }}</h4>
                    <p>{{ $announcement->address }}, {{ $announcement->city }}, {{ $announcement->country }}</p>

                    <div class="card b-round b-shadow ">
                        <div class="card-body">
                            <p>MQ: {{ $announcement->mq }}</p>
                            <p>Nr stanze: {{ $announcement->rooms }}</p>
                            <p>Nr Letti: {{ $announcement->beds }}</p>
                            <p>Nr Bagni: {{ $announcement->bathrooms }}</p>

                            <div class="d-flex flex-row-reverse">
                                <a class="btn-small-plus"
                                    href="{{ route('admin.announcements.index', $announcement) }}">
                                    <i class="fa-solid fa-arrow-left fa-xl mx-1"></i>
                                </a>
                                <a class="btn-small-plus"
                                    href="{{ route('admin.announcements.edit', $announcement) }}">
                                    <i class="fa-solid fa-pen-to-square fa-xl mx-1"></i>
                                </a>
                                <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST"
                                    onsubmit="return confirm('Stai per cancellare questo annuncio, confermi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-small-plus" type="submit">
                                        <i class="fa-solid fa-trash-can fa-xl"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card b-round b-shadow">
                <div class="card-body">
                    <p class="lead"> {{ $announcement->description }} </p>
                </div>
            </div>

            <div class="card my-3 b-round b-shadow">
                <div class="card-body">
                    <p class="lead">Sponsorizzazioni</p>
                    <div class="debug">
                        @if (count($announcement->sponsorizations) > 0)
                            {{-- @dd($announcement->sponsorizations) --}}
                            <div class="container">
                                <h5>Sponsorizzazioni attive</h5>
                                @foreach ($announcement->sponsorizations as $sponsorization)

                                <div class="row mb-2">
                                    <div class="col-4 debug p-2">
                                        {{ $sponsorization->name }}
                                    </div>
                                    <div class="col-4 debug p-2">
                                        {{ $sponsorization->price }}
                                    </div>
                                    <div class="col-4 debug p-2">
                                        {{ $sponsorization->total_hours }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="container p-3 debug">
                                <h5>Non ci sono sponsorizzazioni attive</h5>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Chart.Js --}}
            <div class="card my-3 b-round b-shadow">
                <div class="card-body">
                    <p class="lead">Statistiche annuncio</p>

                    <div>
                        <canvas id="myChart"></canvas>
                    </div>


                    <script>
                        const labels = [


                            '<?php echo $visualizations[0]['mese']?>',
                            '<?php echo $visualizations[1]['mese']?>',
                            '<?php echo $visualizations[2]['mese']?>',
                            '<?php echo $visualizations[3]['mese']?>',
                            '<?php echo $visualizations[4]['mese']?>',
                            '<?php echo $visualizations[5]['mese']?>'



                        ];

                        const data = {
                          labels: labels,
                          datasets: [{
                            label: 'Visualizzazioni',
                            backgroundColor: '#d7e3fc',
                            borderColor: '#d7e3fc',
                            data:
                            [
                                <?php echo $visualizations[0]['visualizzazioni']?>,
                                <?php echo $visualizations[1]['visualizzazioni']?>,
                                <?php echo $visualizations[2]['visualizzazioni']?>,
                                <?php echo $visualizations[3]['visualizzazioni']?>,
                                <?php echo $visualizations[4]['visualizzazioni']?>,
                                <?php echo $visualizations[5]['visualizzazioni']?>
                            ] ,
                        }]
                        };

                        const config = {
                          type: 'bar',
                          data: data,
                          options: {

                          }
                        };
                      </script>

                        <script>
                            const myChart = new Chart(
                            document.getElementById('myChart'),
                            config
                            );
                        </script>

                </div>
            </div>
        </div>
    </div>
@endsection
