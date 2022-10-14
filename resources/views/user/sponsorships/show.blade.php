// TODO: Aggiungere statistiche e sponsorship
@extends("layouts.app")

@section("content")

    <div class="card" style="width: 18rem;">
        @forelse ($sponsorship->apartments as $apartment)
        <div class="card col-8 p-2 my-3">
            <div class="card-body">
                <div class="card-title text-center">
                    <h2>
                        <a href="{{ route('admin.apartments.show', $apartment->id) }}">
                            {{ $apartment->title }}
                        </a>
                    </h2>
                </div>
                <div class="card-image text-center my-2">
                    <img src="{{ $apartment->image }}" class="w-50" alt="">
                </div>
            </div>
        </div>
    @empty

    <h1> Non hai appartamenti sotto questa tipologia di sponsorship</h1>

    @endforelse


@endsection
