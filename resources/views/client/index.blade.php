@extends('client.layouts.landing-page')

@section('main-content')

    <main class="main">
        @include('client.sections.hero')

        @include('client.sections.about')

        @include('client.sections.menu')

        @include('client.sections.testimonials')

        @include('client.sections.chefs')

        @include('client.sections.book-table')

        @include('client.sections.location')

        @include('client.sections.events')

        @include('client.sections.contact')
    </main>

@endsection
