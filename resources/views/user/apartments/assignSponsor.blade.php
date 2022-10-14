@extends("layouts.app")

@section("content")




        @forelse ($sponsorships as $sponsorship)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $sponsorship->name }}</h5>
                    <p class="card-text">{{ $sponsorship->price }}</p>


                    <form class=" d-inline" action="{{ route('user.apartments.assignSponsorship', [ 'apartment_id' => $apartment->id , 'sponsorship_id' => $sponsorship->id]) }}" method="POST">
                        @csrf
                        @method('POST')

                        <button type="submit" class="btn btn-success m-1">
                            compra
                        </button>
                    </form>

                </div>
            </div>
            @empty
            No photo
        @endforelse



@endsection
