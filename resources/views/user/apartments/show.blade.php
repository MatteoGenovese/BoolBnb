{{-- // TODO: Aggiungere statistiche e sponsorship --}}
@extends("layouts.app")

@section("content")
    <div class="container">
        <a href="#" onclick="">axios</a>
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
                        <div class="col-12 text-center mt-5">
                            <h3>
                                Servizi
                            </h3>
                        </div>
                        
                        <div class="row mx-5">
                            @forelse ($apartment->services as $service)
                                <div class="col-4 g-3">{{ $service->name }}</div>
                            @empty
                                
                            @endforelse
                        </div>

                        <div class="col-8 m-auto mt-5">
                            <h3 class="card-title text-center my-2">Descrizione</h3>
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

    {{-- @if (is_null($apartment->user->id) || $apartment->user->id != Auth::user()->id)
            
        <div class="container mt-5">
            <div class="row">
                <div class="col-7">
                    <h4>Contatta l'host</h4>
                    <form action="" class="d-flex flex-column">
                        <label for="user-name-contact">Nome</label>
                        <input type="text" name="user_name" id="user-name-contact" class="w-75" required>
                        
                        <label for="user-email-contact">E-mail</label>
                        <input type="email" name="user_email" id="user-email-contact" class="w-75" required>

                        <label for="message-contact">Messaggio</label>
                        <textarea name="message" id="message-contact" cols="30" rows="10" required></textarea>

                        <a class="btn-success btn w-25 mt-3 m-auto" type="submit">Contatta l'host</a>
                    </form>
                </div>
                <div class="col-4 ms-3">
                    <h5>Riguardo l'host</h5>
                    <h3>{{ $apartment->user->surname . " " . $apartment->user->name }}</h3>
                    <h3>Prenotazioni: {{ $apartment->messages->count() }}</h3>
                    @if ($apartment->user->apartments->count() > 1)
                        <h3>Altri appartamenti dell'host</h3>
                        <ul>
                            @forelse ($apartment->user->apartments->take(3) as $result)
                                <li class="d-flex align-items-center">
                                    @forelse ($result->photos as $photo)
                                        <img src="{{ asset('storage/'. $photo->file_name) }}" class="mt-5 w-25" alt="Preview appartamento">
                                    @empty
                                        <img src="{{ asset('storage/seededphoto/placeholder-home.png') }}" class="mt-5 w-25" alt="Preview appartamento">
                                    @endforelse
                                    <a href="{{ route('user.apartments.show', $result->id) }}" class="ms-3">{{ $result->title }}</a>
                                </li>
                            @empty
                            
                            @endforelse
                        </ul>
                        
                    @endif
                </div>
            </div>
        </div>
    @endif --}}
    
    
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