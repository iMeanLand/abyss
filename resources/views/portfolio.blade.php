@extends('layouts.app')
@section('content')

    <div class="container-fluid py-4">
        <div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Portfolio</h3>
            </div>
            <div class="card-body">
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                    alteration in some form, by injected humour, or randomised words which don't look even slightly
                    believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                    anything.</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        @include('layouts.inc.sidebar')
    </div>

        </div>
    </div>
@endsection