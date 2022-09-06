@extends('layouts.app')
@section('content')

    <div class="container-fluid my-5">

        @if (session('delete_announcement'))
            <div class="alert alert-danger container py-3 text-center" role="alert">
                {{ session('delete_announcement') }}
            </div>
        @endif

        @if (session('post_deleted'))
            <div class="alert alert-danger" role="alert">
                {{ session('post_deleted') }}
            </div>
        @endif

            <div class="box">


                {{-- Nessun Annuncio --}}
                @if (count($announcements) === 0)
                    <h1 class="text-center ">Scopri quanto potresti guadagnare come host</h1>
                    <div class=" stat-container container d-flex justify-content-around  my-5">
                        <div class="stat  ">
                            <h5>gli host guadagnano in media</h5>
                            <span class="text-danger">1600 &euro; al mese</span>
                        </div>
                        <div class="stat ">
                            <h5>Una media di </h5>
                            <span>85 &euro; a notte</span>
                        </div>
                        <div class="stat ">
                            <h5>I loro alloggi sono prenotati</h5>
                            <span>20 notti al mese</span>
                        </div>

                    </div>


                        <div id="carouselExampleIndicators" class="carousel slide d-none  d-xl-block d-md-block  container   m-auto " data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100 " src="https://www.smilingischic.com/wp-content/uploads/2017/01/smilingischic-travel-homeaway-francia-altasavoia-9439.jpg" alt="First slide">
                                <div class="carousel-caption ">
                                    <h3>Airbnb mi ha permesso di fare il lavoro che amo: prendermi cura degli ospiti nella nostra casa.</h3>
                                    <p>Michela Mai</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100 h-25" src="https://jeve.it/wp-content/uploads/2021/03/PAS.05.21.Brunello_Cucinelli-featured-2240x1493.jpg" alt="Second slide">
                                <div class="carousel-caption ">
                                    <h3>Affittare la mia casa mi ha permesso di intraprendere un'attività imprenditoriale, aprendomi la strada verso la libertà finanziaria.</h3>
                                    <p>- Mario Rossi</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100 h-25" src="https://www.inattraction.com/wp-content/uploads/2021/03/Come-far-impazzire-una-ragazza-o-una-donna.jpg" alt="Third slide">
                                <div class="carousel-caption ">
                                    <h3>Affittare il mio monolocale mi ha cambiato la vita e mi ha regalato esperienze memorabili con persone fantastiche.</h3>
                                    <p>- Claudia Rossi</p>

                                </div>
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                        </div>


                    <div class="container-fluid bg-light mt-5 ">
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-6 p-0 m-0">
                                 <img class="d-block w-100" src="https://im4.ezgif.com/tmp/ezgif-4-f0d9de57cd.gif" alt="Third slide">

                            </div>
                            <div class="col-12 col-md-12 col-lg-6 bg-dark p-0 m-0 d-flex justify-content-center align-items-center">
                                    <div class="text-cont p-sm-5 ">
                                        <h2 class="text-center">Prova ad ospitare su AirBnB</h2>
                                        <h4>Unisciti a noi. Saremo al tuo fianco
                                            in ogni momento.</h4>
                                            <a class="btn-create  text-center"
                                                href="{{ route('admin.announcements.create') }}">
                                                Crea un nuovo annuncio
                                            </a>
                                    </div>


                            </div>
                        </div>
                    </div>



                @endif



                {{-- Annunci presenti --}}

                @if (count($announcements) > 0)
                <h1 class="text-center">Elenco annunci</h1>
                    <a class="btn btn-rounded-plus mb-3 ml-5 text-center" href="{{ route('admin.announcements.create') }}">
                        Crea un nuovo annuncio
                    </a>

            </div>

            <div class="container-fluid  px-5">

                <div class="row ">
                    @foreach ($announcements as $announcement)
                        <div class="box-house col-sm-12 col-lg-12 container-fluid d-flex justify-content-around p-4">
                              <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/suburban-house-royalty-free-image-1584972559.jpg"
                                alt="">

                            <div class=" house-info py-4 ">
                                <h6> indirizzo :</h6>
                                <p>{{ $announcement->address }}</p>
                                <p>{{ $announcement->city }}</p>
                                <p>{{ $announcement->country }}</p>
                                <h6> tipologia camera :</h6>
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

                            {{-- Modale avviso eliminazione
                            <div class="modal-content rounded-4 shadow">
                            <div class="modal-body p-4 text-center">
                                <h5 class="mb-0">Confermi l'eliminazione dell'annuncio?</h5>
                            </div>
                            <div class="modal-footer flex-nowrap p-0">
                                <button type="button"
                                    class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-right"><strong>Si</strong></button>
                                <button type="button"
                                    class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0"
                                    data-bs-dismiss="modal">No</button>
                            </div>
                            </div> --}}

                        </div>
                    @endforeach
                </div>

            </div>
        @endif
    </div>
@endsection
