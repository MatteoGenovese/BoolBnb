{{-- // TODO: Aggiungere statistiche e sponsorship --}}
@extends("layouts.app")

@section('title', '| ' . "Messaggi" )

@section("content")
    <div class="container">
        <div class="row">

            <div class="col-12 d-flex flex-column align-items-center justify-content-center card py-5">
                    <h2>{{ $message->email }}</h2>

                    <h4>{{ isset($message->username) ?$message->username : "Utente" }}</h4>
                    <p>{{ $message->message }}</p>
            </div>
        </div>
    </div>
    
@endsection
