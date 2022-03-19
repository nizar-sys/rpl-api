@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Consume API Laravel</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item @if (request()->routeIs('home'))
                    active
                @endif"><a href="{{ route('home') }}">Dashboard</a></div>
            </div>
        </div>

        <div class="section-body">
        </div>
    </section>
@endsection
