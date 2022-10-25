{{-- // TODO: Aggiungere statistiche e sponsorship --}}
@extends("layouts.app")

@section('title', '| ' . $apartment->title )

@section("content")
    <div class="container">
        <div class="row">

            @if (session('session-change'))
                <div class="col-12 alert {{ session('session-class') }}">
                    {{ session('session-change') }}
                </div>

            @elseif (session("sponsorship_added"))
                <div class="col-12 alert alert-success">
                    {{ session('sponsorship_added') }}
                </div>
            @endif

            <div class="col-12 d-flex flex-column">
                <div class="card">
                    @forelse ($apartment->photos as $photo)
                        <img src="{{ asset('storage/'. $photo->file_name) }}" class="w-50 align-self-center mt-5" alt="Foto dell'abitazione {{ $apartment->title }}">
                        @empty
                        <span>Non ci sono foto.</span>
                    @endforelse
                    <div class="row card-body my-4">
                        <div class="col-12 text-center">
                            <h2 class="card-title my-3">
                                {{ $apartment->title }}
                            </h2>
                        </div>
                        <div class="col-4 offset-2">
                            <p class="card-text">
                                Numero bagni:
                                {{ $apartment->bathroom_no }}
                            </p>
                            <p class="card-text">
                                Numero letti:
                                {{ $apartment->bed_no }}
                            </p>
                            <p class="card-text">
                                Numero stanze:
                                {{ $apartment->room_no }}
                            </p>
                        </div>
                        <div class="col-4 offset-2">
                            <p class="card-text">
                                Metri quadrati:
                                {{ $apartment->square_meters }}
                            </p>
                            <p class="card-text">
                                Indirizzo:
                                {{ $apartment->address }}
                            </p>
                            <p class="card-text">
                                @if(count($apartment->sponsorships) > 0)

                                    @if ($apartment->sponsorships[count($apartment->sponsorships) -1]->pivot->expiration_date < now())
                                        <div>
                                            L'appartamento non è sponsorizzato.
                                        </div>
                                    @else
                                        <div>
                                            Sponsorizzato fino a: {{ $apartment->sponsorships[count($apartment->sponsorships) -1]->pivot->expiration_date }}
                                        </div>
                                    @endif
                                @else
                                    <div>
                                        L'appartamento non è sponsorizzato.
                                    </div>
                                @endif
                            </p>
                        </div>
                        <div class="col-12 text-center mt-5">
                            <h3>
                                Servizi
                            </h3>
                        </div>

                        <div class="row col-10 offset-2 mt-4">
                            @forelse ($apartment->services as $service)
                                <div class="col-4 g-3">{{ $service->name }}</div>
                            @empty

                            @endforelse
                        </div>

                        <div class="col-8 offset-2 mt-5">
                            <h3 class="card-title text-center my-2">Descrizione</h3>
                            <p class="card-text">
                                {{ $apartment->description }}
                            </p>
                        </div>

                        <div class="col-8 offset-2 mt-5">
                            <h3 class="my-2">
                                Disponibilità:
                            </h3>
                            @if ($apartment->is_available)
                                <div>
                                    L'abitazione è attualmente disponibile.
                                </div>
                            @else
                                <div>
                                    L'abitazione non è disponibile.
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-end gap-3">

                            <a href="{{ route("user.apartments.edit", $apartment->id) }}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </a>

                            <a href="{{ route("user.apartments.messageIndex", $apartment->id) }}" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                </svg>
                            </a>

                            <a class="btn btn-success" href="{{ route('user.data.show', $apartment->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                                    <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
                                </svg>
                            </a>

                            <a class="btn btn-warning" href="{{route('user.apartments.sponsorshipPage', $apartment->id )}}" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                </svg>
                            </a>

                            <form id="showDeleteForm" action="{{ route('user.apartments.destroy', $apartment->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("bottom-scripts")
    <script defer>

        const deleteForm = document.getElementById('showDeleteForm');

        deleteForm.addEventListener('submit', (e) => {
            let confirmDelete = false;

            confirmDelete = confirm("Sei sicuro di voler cancellare?");

            if(confirmDelete === false){
                e.preventDefault();
            }
        });

    </script>

@endsection
