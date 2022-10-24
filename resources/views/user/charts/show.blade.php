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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    @include("user.charts.includes.chartScripts")
@endsection

