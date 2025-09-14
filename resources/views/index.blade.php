@extends('layouts.landing-page')

@section('main-content')

    <main class="main">
        @include('sections.hero')

        @include('sections.about')

        @include('sections.menu')

        @include('sections.testimonials')

        @include('sections.chefs')

        @include('sections.book-table')

        @include('sections.location')

        @include('sections.events')

        @include('sections.contact')
    </main>

@endsection
