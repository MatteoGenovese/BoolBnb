// TODO: Aggiungere statistiche e sponsorship
@extends("layouts.app")

@section("content")

    <div class="card" style="width: 18rem;">
        @forelse ($apartment->photos as $photo)
            <img src="{{ asset('storage/'. $photo->file_name) }}" class="card-img-top" alt="FOTONA">
            @empty
            No photo
        @endforelse
        </div>
        <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>

@endsection
