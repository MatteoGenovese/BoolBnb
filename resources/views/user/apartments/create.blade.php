@extends('layouts.app')

@section('title', 'New Apartment')

@section('content')

    <main>
        <div class="container">
            <div class="row">

                    <form action="{{ route('user.apartments.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @include('user.apartments.includes.form')
                    </form>

            </div>
        </div>
    </main>

@endsection

@section("bottom-scripts")
    @include("user.apartments.includes.form-scripts")
@endsection