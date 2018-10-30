@extends('layouts.admin-layout')
@guest

@else

@section('content')
    @php $user = Auth::user() @endphp
    <div class="card">
        <div class="card-header">
            <h5>Admin Settings</h5>
        </div>
        <div class="card-body">
            <p>Soon you'll be able to change admin panel colors</p>

        </div>
    </div>

    @endguest

@endsection