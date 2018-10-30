@extends('layouts.admin-layout')



@section('content')

    @auth
    <div class="card">
        <div class="card-header"><h5>Dashboard</h5></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!
        </div>
    </div>
    @endauth

@endsection

