@extends('layouts.admin-layout')

@auth
@section('content')
    @php
        $page_controller = new App\Http\Controllers\PagesController();
        $page = $page_controller->pageShowData();
    @endphp
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-md-12">

            @if(session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Edit page</h3>
                </div>
                <div class="card-body">

                    <form id="edit-page-form" method="POST" enctype="multipart/form-data"
                          runat="server" action="{{ action('PagesController@pageEditPage') }}">
                        @csrf
                        <label for="page-title">Page Title
                            <br>
                            <input name="page_title" class="input_example" id="page-title" placeholder="Page Title.."
                                   type="text" value="{!! $page->title !!}">
                        </label>
                        <br>
                        <h3 class="text-center py-4">Header</h3>
                        <label for="page_content">Header
                            <br>
                            <textarea class="textarea_example" name="header_text"
                                      id="post-content">{!! $page->header_text !!}</textarea>
                        </label>

                        {{--3 Blocks--}}
                        <br>
                        <h3 class="text-center py-4">Three Blocks</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <textarea class="textarea_example" name="three_block_one">{!! $page->three_block_one !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <textarea class="textarea_example" name="three_block_two">{!! $page->three_block_two !!}</textarea>
                            </div>
                            <div class="col-md-4">
                                <textarea class="textarea_example" name="three_block_three">{!! $page->three_block_three !!}</textarea>
                            </div>
                        </div>
                        {{--3 Block END--}}
                        <br>
                        <h3 class="text-center py-4">Wrapper Blocks</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <input name="wrap_image_one" id="wrap_image_one" class="wrap_image_admin" type="file">
                                <label for="wrap_image_one" class="image-label image-left">
                                    <div class="image-label-block">
                                        <img src="/abyss/public/uploads/{{ $page->wrap_image_one }}" alt=""/>
                                        <div class="wrap_image_hover"></div>
                                        <div class="image-label-content">
                                            <i class="fas fa-upload"></i>
                                        </div>
                                    </div>

                                </label>
                            </div>
                            <div class="col-md-6">
                                <input name="wrap_image_two" id="wrap_image_two" class="wrap_image_admin" type="file">
                                <label for="wrap_image_two" class="image-label">
                                    <div class="align-to-left image-label-block">
                                        <img src="/abyss/public/uploads/{{ $page->wrap_image_two }}" alt=""/>
                                        <div class="wrap_image_hover"></div>
                                        <div class="image-label-content">
                                            <i class="fas fa-upload"></i>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-editor left">
                                    <textarea class="textarea_example" name="wrap_text_one" id="page-excerpt">{!! $page->wrap_text_two !!}</textarea>
                                    <br>
                                    {{--<input class="input_example" placeholder="Read More 1 link" type="text">--}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-editor">
                                    <textarea class="textarea_example" name="wrap_text_two" id="page-excerpt">{!! $page->wrap_text_two !!}</textarea>
                                    <br>
                                    {{--<input class="input_example" placeholder="Read More 2 link" type="text">--}}
                                </div>
                            </div>
                        </div>

                        <input name="page_image" id="post_image" type="file">
                        <label for="post_image"><img style="width: 90px;"
                                                     src="/abyss/public/uploads/{!! $page->header_image !!}" alt=""/></label>

                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                        <input id="edit-page-button" class="primary-button" type="submit" value="Update">
                    </form>
                    <br>
                </div>
            </div>
        </div>

        <script>
            function readURL(input) {

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('#blah').attr('src', e.target.result);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#wrap_image_one").change(function() {
                readURL(this);
            });
        </script>

        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({selector: 'textarea'});</script>
@endauth
@endsection
