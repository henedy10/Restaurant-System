@extends('layouts.app')

@section('content')
<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top shadow-sm">
        <div class="container-fluid">
            <!-- زر القائمة (للموبايل) -->
            <button class="btn btn-warning d-lg-none me-2" id="toggleBtn">☰</button>

            <!-- اسم الموقع -->
            <span href="#" class="navbar-brand text-warning fw-bold">
            🍽️ Nice Restaurant
            </span>

            <div class="ms-auto d-flex align-items-center gap-3">
            <!-- زر معاينة الموقع -->
            <a href="{{route('index')}}" class="btn btn-outline-warning btn-sm">
                👁️  Preview
            </a>

            <!-- رسالة الترحيب -->
            <span class="text-light">
                <strong class="text-warning">{{Auth::user()->name}}</strong>
            </span>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div id="sidebar">
        <ul class="nav flex-column px-2">
            <li class="nav-item">
                <a href="#" class="nav-link active">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{route('chefs.index')}}" class="nav-link">Chefs</a>
            </li>
            <li class="nav-item">
                <a href="{{route('items.index')}}" class="nav-link">Items</a>
            </li>
            <li class="nav-item">
                <a href="{{route('opening-hours.index')}}" class="nav-link">OpeningHours</a>
            </li>
            <li class="nav-item">
                <a href="{{route('system.index')}}" class="nav-link">Manage Sys.</a>
            </li>
            <li class="nav-item">
                <a href="{{route('tables.index')}}" class="nav-link">Tables</a>
            </li>
            <li class="nav-item">
                <a href="{{route('system.contacts.index')}}" class="nav-link">Contacts</a>
            </li>

            <li class="nav-item">
                <a href="{{route('images.create')}}" class="nav-link">Images</a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div id="content">
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
            <div class="col">
                <div class="card text-center shadow-lg" style="background-color: #000; color: #FFD700; border: 2px solid #FFD700; border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Total Chefs</h5>
                        <p class="card-text fs-5">{{$chefCount}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center shadow-lg" style="background-color: #000; color: #FFD700; border: 2px solid #FFD700; border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Total Items</h5>
                        <p class="card-text fs-5">{{$itemCount}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center shadow-lg" style="background-color: #000; color: #FFD700; border: 2px solid #FFD700; border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold" style="color: #FFD700;"> Total Tables</h5>
                        <p class="card-text fs-5">{{$info->number_of_tables ?? "-"}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center shadow-lg" style="background-color: #000; color: #FFD700; border: 2px solid #FFD700; border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold" style="color: #FFD700;">Subscribers</h5>
                        <p class="card-text fs-5">{{$subscriberCount}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
