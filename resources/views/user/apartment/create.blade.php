@extends('layouts.app')

@section('title', 'New Apartment')

@section('content')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('user.apartments.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @include('user.apartment.includes.form')
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection