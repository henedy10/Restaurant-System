@extends('layouts.app')

@section('content')
<div>
    <nav class="navbar navbar-dark bg-black fixed-top">
        <div class="container-fluid">
            <button class="btn btn-warning d-md-none" id="toggleBtn">☰</button>
            <a href="{{route('index')}}" class="navbar-brand text-warning">Nice Restaurant [ {{Auth::user()->name}} ]</a>
        </div>
    </nav>
    <!-- Sidebar -->
    <div id="sidebar">
        <ul class="nav flex-column px-2">
            <li class="nav-item">
                <a href="#" class="nav-link active">Dashboard</a>
            </li>
            <li class="nav-item">
                <a href="{{route('chefs.index')}}" class="nav-link">Manage Chefs</a>
            </li>
            <li class="nav-item">
                <a href="{{route('items.index')}}" class="nav-link">Manage Items</a>
            </li>
            <li class="nav-item">
                <a href="{{route('system.index')}}" class="nav-link">Manage Sys.</a>
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
                        <h5 class="card-title">Total Chefs</h5>
                        <p class="card-text fs-5">{{$chefCount}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center shadow-lg" style="background-color: #000; color: #FFD700; border: 2px solid #FFD700; border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title">Total Items</h5>
                        <p class="card-text fs-5">{{$itemCount}}</p>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card text-center shadow-lg" style="background-color: #000; color: #FFD700; border: 2px solid #FFD700; border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold" style="color: #FFD700;">Expensive Item</h5>
                        <p class="card-text fs-5"> {{ !is_null($expensiveItem) ? $expensiveItem->name.' '.'[ '.$expensiveItem->price.' $]' : "-"}}</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-center shadow-lg" style="background-color: #000; color: #FFD700; border: 2px solid #FFD700; border-radius: 12px;">
                    <div class="card-body">
                        <h5 class="card-title fw-bold" style="color: #FFD700;"> Cheapest Item</h5>
                        <p class="card-text fs-5">{{ !is_null($expensiveItem) ? $cheapItem->name.' '.'[ '.$cheapItem->price.' $]' : "-"}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
