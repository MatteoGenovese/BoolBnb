{{-- // TODO: Aggiungere statistiche e sponsorship --}}
@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-column">
                <div class="card">
                    @forelse ($apartment->photos as $photo)
                        <img src="{{ asset('storage/'. $photo->file_name) }}" class="w-50 align-self-center mt-5" alt="FOTONA">
                        @empty
                        No photo
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
                                <div>
                                    Sponsorizzazioni:
                                </div>
                                @forelse ($apartment->sponsorships as $sponsorship)
                                    {{ $sponsorship->name }}
                                @empty
                                    Non hai sponsorizzazioni
                                @endforelse
                            </p>
                        </div>

                        <div class="col-8 m-auto">
                            <h5 class="card-title text-center my-2">Descrizione</h5>
                            <p class="card-text">
                                {{ $apartment->description }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-end gap-3">
                            <a href="{{ route("user.apartments.edit", $apartment->id) }}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
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
        console.log(deleteForm);

        deleteForm.addEventListener('submit', (e) => {
            let confirmDelete = false;
            
            confirmDelete = confirm("Sei sicuro di voler cancellare?");
            
            if(confirmDelete === false){
                e.preventDefault();
            }
        });

    </script>

@endsection