<?php
/**
 * Created by PhpStorm.
 * User: alin.tabuci
 * Date: 9/17/2018
 * Time: 4:12 PM
 */
?>
@extends('layouts.app')
@section('content')

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>About Us</h3>
            </div>
            <div class="card-body">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                    been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                    galley</p>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        @include('layouts.inc.sidebar')
    </div>

@endsection


