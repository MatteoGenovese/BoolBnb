@extends('layouts.app')

@section('title', '| Abitazioni')

@section('content')
<div class="container">
    <div class="row">

        @if (session('session-change'))
            <div class="col-12 alert {{ session('session-class') }}">
                {{ session('session-change') }}
            </div>
        @endif


        @forelse ($apartments as $apartment )
            <div class="col-12 col-lg-6 mt-3">
                
            <div class="p-3 align-items-center border-bottom">

                <div class="row" style="min-height: 120px">
                       <div class="col-12 col-md-6">
                            <h6>
                                Id: {{ $apartment->id }}
                            </h6>
                            <h4>
                                {{ strlen($apartment->title) > 20 ? substr($apartment->title, 0, 20) ."..." : $apartment->title }}
                            </h4>
                            <h6>
                                {{ $apartment->address }}
                            </h6>
                       </div>
                       
                   

                    <div class="col-6 col-md-4 align-self-center">
                        <div class="text-center">
                            Messaggi: <br> {{ $apartment->messages->count() }}
                        </div>
                        <div class="text-center">
                            Disponibilità: <br>
                            @if ($apartment->is_available)
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg text-success" viewBox="0 0 16 16">
                                    <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg text-danger" viewBox="0 0 16 16">
                                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                </svg>
                            @endif
                        </div>
                    </div>

                    <div class="col-6 col-md-2 align-self-center">
                        <div class="dropdown">
                            <button class="btn brand-btn-1 dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Azioni
                            </button>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('user.apartments.show', $apartment->id) }}">Visualizza</a></li>
                              <li><a class="dropdown-item" href="{{ route('user.apartments.edit', $apartment->id) }}">Modifica</a></li>
                              <li><a class="dropdown-item" href="{{ route("user.apartments.messageIndex", $apartment->id) }}">Messaggi</a></li>
                              <li><a class="dropdown-item" href="{{ route('user.data.show', $apartment->id) }}">Statistiche</a></li>
                              <li><a class="dropdown-item" href="{{route('user.apartments.sponsorshipPage', $apartment->id )}}">Sponsorizza</a></li>
                              <li>
                                <form class="delete-index-form d-inline" action="{{ route('user.apartments.destroy', $apartment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">
                                        Cancella
                                    </button>
                                </form>
                            </li>
                            </ul>
                        </div>
                    </div>
            </div>

            </div>
        </div> 
        @empty
            <h5>
                Non hai appartamenti.
            </h5>
        @endforelse


            {{-- <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Indirizzo</th>
                        <th scope="col">Disponibilità</th>
                        <th scope="col">Messaggi</th>
                        <th scope="col"><div class="text-center">Azione</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($apartments as $apartment)
                        <tr class="align">
                            <th scope="row">{{ $apartment->id }}</th>
                            <td>{{ $apartment->title }}</td>
                            <td>{{ $apartment->address }}</td>

                            <td>
                                @if ($apartment->is_available)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-lg text-success" viewBox="0 0 16 16">
                                        <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/>
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg text-danger" viewBox="0 0 16 16">
                                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                    </svg>
                                @endif
                            </td>

                            <td>{{ $apartment->messages->count() }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary m-1" href="{{ route('user.apartments.show', $apartment->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </a>
                                <a class="btn btn-secondary m-1" href="{{ route('user.apartments.edit', $apartment->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </a>

                                <a href="{{ route("user.apartments.messageIndex", $apartment->id) }}" class="btn btn-light m-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                                    </svg>
                                </a>

                                <a class="btn btn-success m-1" href="{{ route('user.data.show', $apartment->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                                        <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z"/>
                                    </svg>
                                </a>

                                <a class="btn btn-warning m-1" href="{{route('user.apartments.sponsorshipPage', $apartment->id )}}" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                    </svg>
                                </a>

                                <form class="delete-index-form d-inline" action="{{ route('user.apartments.destroy', $apartment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger m-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </form>



                            </td>
                        </tr>
                    @empty
                </tbody>
            </table>
            Non hai appartamenti
            @endforelse --}}

    </div>
</div>
@endsection

@section('bottom-scripts')
<script defer>

    document.querySelectorAll('.delete-index-form').forEach(form => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            let confirmDelete = false;
            
            confirmDelete = confirm("Sei sicuro di voler cancellare?");
            
            if(confirmDelete !== false){
                 form.submit();
            }
        });
     
    });

 </script>
@endsection
