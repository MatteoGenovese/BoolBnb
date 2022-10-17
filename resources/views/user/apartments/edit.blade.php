@extends('layouts.app')

@section('title', '| Modifica: ' . $apartment->title )

@section('content')

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('user.apartments.update', $apartment->id ) }}" method="post" autocomplete="off" class="crud-form" enctype="multipart/form-data">
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
