@extends('layouts.app')

@section('title', 'New Apartment')

@section('content')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('user.apartments.update', $apartment->id ) }}" method="post" class="crud-form" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @include('user.apartments.includes.form')
                    </form>
                </div>
            </div>
        </div>
    </main>

@endsection

@section("bottom-scripts")
    @include("user.apartments.includes.form-scripts")
@endsection