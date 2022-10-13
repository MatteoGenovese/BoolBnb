{{-- // TODO: Aggiungere statistiche e sponsorship --}}
@extends("layouts.app")

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex flex-column text-center">
                <div class="card">
                    @forelse ($apartment->photos as $photo)
                        <img src="{{ asset('storage/'. $photo->file_name) }}" class="w-50 align-self-center mt-5" alt="FOTONA">
                        @empty
                        No photo
                    @endforelse
                    <div class="card-body">
                        <h4 class="card-title">{{ $apartment->title }}</h4>
                        <p class="card-text">{{ $apartment->description }}</p>
                        <p class="card-text">{{ $apartment->bathroom_no }}</p>
                        <p class="card-text">{{ $apartment->bed_no }}</p>
                        <p class="card-text">{{ $apartment->bathroom_no }}</p>
                        <p class="card-text">{{ $apartment->room_no }}</p>
                        <p class="card-text">{{ $apartment->square_meters }}</p>
                        <p class="card-text">{{ $apartment->address }}</p>
                        <form action="{{ route('user.apartments.destroy', $apartment->id) }}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-warning">
                                Cestinalo
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection
