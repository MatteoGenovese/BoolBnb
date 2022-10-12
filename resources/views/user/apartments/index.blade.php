@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table  table-dark">
                <thead>
                    <tr>
                        <th scope="col p-2">Id</th>
                        <th scope="col p-2">Titolo</th>
                        <th scope="col p-2">Indirizzo</th>
                        <th scope="col p-2">Messaggi</th>
                        <th scope="col">
                            <a href="{{ route('user.apartments.create') }}" class="btn btn-sm btn-success">Crea</a>
                        </th>
                    </tr>
                </thead>
        
                <tbody>
                    @forelse ($apartments as $apartment)
                        <tr>
                            <th scope="row">{{ $apartment->id }}</th>
                            <td>{{ $apartment->title }}</td>
                            <td>{{ $apartment->address }}</td>
                            <td>{{ $apartment->messages->count() }}</td>
                            <td></td>
                        </tr>
                    @empty
                </tbody>
            </table>
            Non hai appartamenti
            @endforelse
        </div>
    </div>
</div>
@endsection
