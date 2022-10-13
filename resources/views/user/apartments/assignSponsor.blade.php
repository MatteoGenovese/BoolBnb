@extends("layouts.app")

@section("content")

//passato apartment e sponsorships

        @forelse ($sponsorships as $sponsorship)
            <div class="card" style="width: 18rem;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $sponsorship->name }}</h5>
                    <p class="card-text">{{ $sponsorship->price }}</p>
                    <a href="{{ route('user.apartments.show', $apartment->id) }}" class="btn btn-primary">Compra</a>
                </div>
            </div>
            @empty
            No photo
        @endforelse


@endsection
