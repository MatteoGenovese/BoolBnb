{{-- // TODO: Aggiungere statistiche e sponsorship --}}
@extends("layouts.app")

@section('title', '| ' . $apartment->title )

{{-- @dd($apartment) --}}
@section("content")
    <div class="container">
        <div class="row">

            <canvas id="myChart"></canvas>

            <input type="number" class='d-none' value="{{$apartment->id}}" id='ApaID'>

        </div>
    </div>

@endsection

@section("bottom-scripts")


    @include("user.charts.includes.chart-scripts")
@endsection

