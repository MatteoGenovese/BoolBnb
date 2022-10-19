@extends('layouts.app')

@section('title', '| Nuova abitazione')

@section('content')

    <main>
        <div class="container">
            <div class="row">

                    <form action="{{ route('user.apartments.store') }}" method="post" class="crud-form" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        @include('user.apartments.includes.form', [ $isRequired = '*'])
                    </form>

            </div>
        </div>
    </main>

@endsection

@section("bottom-scripts")
    @include("user.apartments.includes.form-scripts")
@endsection
