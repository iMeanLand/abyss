@extends('layouts.admin-layout')

@section('content')
@auth
    <div class="card">
        <div class="card-header">
            <h3>Pages</h3>
        </div>
        <div class="card-body">
            <p>Choose a page which one you'd like to edit</p>
            <hr/>
            <ul class="admin-page-list">
                <li class="page-item"><a href="{{ url('/admin/edit-home') }}"> <i class="fas fa-file"></i> Home Page</a></li>
                <hr>
                <li class="page-item"><a href="#"><i class="fas fa-file"></i> Blog Page</a></li>
                <hr>
                <li class="page-item"><a href="#"><i class="fas fa-file"></i> About Page</a></li>
                <hr>
                <li class="page-item"><a href="#"><i class="fas fa-file"></i> Welcome Page</a></li>
            </ul>
        </div>
    </div>
@endauth
@endsection