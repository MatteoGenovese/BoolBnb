@extends("layouts.app")

@section("content")
    <div class="container mt-5">
        <div class="row justify-content-center">
            
            
            @foreach ($sponsorships as $sponsorship)
            <div class="card col-3 mx-1">
                <div class="card-body">
                    <h5 class="card-title">{{ $sponsorship->name }}</h5>
                    <h6>Durata: {{ $sponsorship->duration }} giorni</h6>
                    <p class="card-text">{{ $sponsorship->price }} €</p>
                    
                    
                    <form class=" d-inline" action="{{ route('user.apartments.assignSponsorship', [ 'apartment_id' => $apartment->id , 'sponsorship_id' => $sponsorship->id]) }}" method="POST">
                        @csrf
                        @method('POST')
                        
                        <button type="submit" class="btn brand-btn-1 m-1">
                            Compra
                        </button>
                    </form>
                    
                </div>
            </div>
            @endforeach
        
    </div>
    </div>
@endsection
