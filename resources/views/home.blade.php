@extends('layouts.app')
@php
    $page_controller = new App\Http\Controllers\PagesController();
    $page = $page_controller->pageShowData();
@endphp
@section('content')

    <div class="container-fluid">
        <div class="row">

            <div class="header-image" style="background-image: url('/abyss/public/uploads/{{ $page->header_image }}'); ">
                <div class="header-content">
                    {!! $page->header_text !!}
                    <div class="header-buttons">
                        <a class="header-button-left" href="#">Button Left</a>
                        <a class="header-button-right" href="#">Button right</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container">
        <div class="row">

            <h2 class="h2-heading">IPSUM FEUGIAT CONSEQUAT</h2>

            <div class="three-blocks">
                <div class="row">
                    <div class="col-md-4">
                        <div class="three-block">
                            <div class="three-block-icon">
                                <i class="fas fa-crown"></i>
                            </div>
                            <div class="three-block-content">
                                <h3>Justo Ploccerat</h3>
                                {!! $page->three_block_one !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="three-block">
                            <div class="three-block-icon">
                                <i class="fas fa-sync-alt"></i>
                            </div>
                            <div class="three-block-content">
                                <h3>Justo Ploccerat</h3>
                                {!! $page->three_block_two !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="three-block">
                            <div class="three-block-icon">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div class="three-block-content">
                                <h3>Justo Ploccerat</h3>
                                {!! $page->three_block_three !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="ab-wrapper">

                <div class="ab-wrapper-heading">
                    <h3>COMMODO ACCUMSAN ALIQUAM</h3>
                    <h5>Amet nisi nunc lorem accumsan</h5>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="two-wrap-block align-right">
                                <div class="two-wrap-image">
                                    <img src="/abyss/public/uploads/{{ $page->wrap_image_one }}" alt=""/>
                                </div>
                                <div class="two-wrap-content">
                                    <h3 class="text-white">NEQUE ORNARE ADIPISCING</h3>
                                    <p>{!! $page->wrap_text_one !!}
                                        <a href="#" class="secondary-button" title="">Read more</a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="two-wrap-block">
                                <div class="two-wrap-image">
                                    <img src="/abyss/public/uploads/{{ $page->wrap_image_two }}" alt=""/>
                                </div>
                                <div class="two-wrap-content">
                                    <h3 class="text-white">MOLLIS ADIPISCING NISL</h3>
                                    <p>{!! $page->wrap_text_two !!}
                                    </p>
                                    <a href="#" class="text-center secondary-button" title="">Read more</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
