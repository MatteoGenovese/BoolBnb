@extends("layouts.app")

@section("content")
    <ul>
        @forelse ($apartments as $apartment)
            <li>
                {{ $apartment->title }}
            </li>
        @empty
            
        @endforelse
    </ul>
@endsection