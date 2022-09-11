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

                    <div class="debug p-3 container">
                        <div class="row">
                            <div class="col-6 debug d-flex justify-content-center">
                                <img src="{{ asset('img/message-people.png') }}" alt="people">
                            </div>
                            <div class="col-6 debug py-3 d-flex flex-column justify-content-center">
                                <h3 class="mb-4">Non hai ancora annunci pubblicati</h3>
                                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio voluptatem impedit sapiente vero? Facere consequatur laudantium culpa, corrupti mollitia atque.</h4>
                                <a
                                class="btn-create  text-center"
                                href="{{ route('admin.announcements.create') }}">
                                Crea un nuovo annuncio
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class=" stat-container container d-flex justify-content-around my-5">

                        <div class="stat">
                            <h5>gli host guadagnano in media</h5>
                            <span class="text-danger">1600 &euro; al mese</span>
                        </div>
                        <div class="stat">
                            <h5>Una media di </h5>
                            <span>85 &euro; a notte</span>
                        </div>
                        <div class="stat">
                            <h5>I loro alloggi sono prenotati</h5>
                            <span>20 notti al mese</span>
                        </div>

                    </div>


                        <div id="carouselExampleIndicators" class="carousel slide d-none  d-xl-block d-md-block  container   m-auto b-round " data-ride="carousel">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner b-round b-shadow">
                              <div class="carousel-item active">
                                <img class="d-block w-100 " src="https://www.smilingischic.com/wp-content/uploads/2017/01/smilingischic-travel-homeaway-francia-altasavoia-9439.jpg" alt="First slide">
                                <div class="carousel-caption ">
                                    <h3>Bool BnB mi ha permesso di fare il lavoro che amo: prendermi cura degli ospiti nella nostra casa.</h3>
                                    <p>Michela Mai</p>
                                </div>
                              </div>
                              <div class="carousel-item b-round b-shadow">
                                <img class="d-block w-100 " src="https://jeve.it/wp-content/uploads/2021/03/PAS.05.21.Brunello_Cucinelli-featured-2240x1493.jpg" alt="Second slide">
                                <div class="carousel-caption ">
                                    <h3>Affittare la mia casa mi ha permesso di intraprendere un'attività imprenditoriale, aprendomi la strada verso la libertà finanziaria.</h3>
                                    <p>- Mario Rossi</p>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100 " src="https://www.inattraction.com/wp-content/uploads/2021/03/Come-far-impazzire-una-ragazza-o-una-donna.jpg" alt="Third slide">
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
                                <h6 class="spacebar"> indirizzo :</h6>
                                <p>{{ $announcement->address }}</p>
                                <p>{{ $announcement->city }}</p>
                                <p>{{ $announcement->country }}</p>
                                <h6 class="spacebar"> tipologia camera :</h6>
                                <p>{{ $announcement->house_type }}</p>
                                <h6 class="spacebar"> status:</h6>
                                @if ($announcement->is_visible == 1)
                                    <p>Pubblico</p>
                                @else
                                    <p>Privato</p>
                                @endif

                            </div>

                            <div class="house-action d-flex flex-column justify-content-center">
                                <a class="btn-small-plus my-2"
                                    href="{{ route('admin.announcements.show', $announcement) }}">
                                <i class="fa-solid fa-eye fa-lg my-2 mx-1"></i></a>

                                <a class="btn-small-plus my-2"
                                    href="{{ route('admin.announcements.edit', $announcement) }}">
                                <i class="fa-solid fa-pen-to-square fa-lg my-2 mx-1"></i></a>

                                {{-- <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST"
                                    onsubmit="return confirm('Stai per cancellare questo annuncio, confermi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">DELETE</button>
                                </form> --}}
                                {{-- sostituito con questo bottone qui sotto --}}
                                <a href="#" data-id={{ $announcement->id }} class="btn-small-plus my-2"
                                    data-toggle="modal" data-target="#deleteModal">
                                    <i class="fa-solid fa-trash-can fa-lg my-2 mx-1"></i>
                                </a>
                            </div>

                            {{-- modale eliminazione --}}
                            <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog"
                            aria-labelledby="Delete" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Elimazione annuncio</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- occhio qui al tag form --}}
                                            <form action="{{ route('admin.announcements.destroy', $announcement) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <h5 class="text-center">Eliminare l'annuncio?</h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annula</button>
                                            <button type="submit" class="btn btn-danger">Conferma</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                        </div>
                    @endforeach
                </div>

            </div>
        @endif
    </div>
@endsection

<script>
     $(document).on('click', '.delete', function() {
            let id = $(this).attr('data-id');
            $('#id').val(id);
        });
</script>
