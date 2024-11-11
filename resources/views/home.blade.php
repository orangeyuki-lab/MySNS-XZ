@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Include Clock Component -->
    @include('partials.clock')

    <!-- Include News Component -->
    @include('partials.news')

    <!-- Include Weather Module -->
    @include('partials.weather')
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/clock.js') }}"></script>
<script src="{{ asset('js/news.js') }}"></script>
<script src="{{ asset('js/weather.js') }}"></script>
@endsection
