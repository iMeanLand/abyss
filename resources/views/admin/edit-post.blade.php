@extends('layouts.admin-layout')
@php
    $categories_controller = new App\Http\Controllers\PostsController();
    $categories = $categories_controller->showCategoriesInAdmin();
@endphp
@auth

@section('content')
    <div class="row">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                    <h3>Edit Post Number ({{ $post->id }})</h3>
                </div>
                <div class="card-body">
                    <h4>Add new posts</h4>
                    <hr>
                    <form id="edit-post-form" method="post" enctype="multipart/form-data" action="{{ action('PostsController@postEditPost') }}">
                        @csrf
                        <label for="post-title">Post Title
                            <br>
                            <input name="post_title" class="input_example" id="post-title" placeholder="Post Title.." value="{{ $post->title }}" type="text">
                        </label>
                        <br>
                        <input type="hidden" name="post_id" value="{{ $post->id }}">

                        <label for="post-message">Excerpt Message
                            <br>
                            <input type="text" value="{{ $post->excerpt }}" name="post_excerpt" class="input_example" id="post-message"
                                   placeholder="Excerpt message.."/>
                        </label>

                        <label for="post-message">Body Message
                            <br>
                            <textarea class="textarea_example" name="post_message" id="post-message">{{ $post->message }}</textarea>
                        </label>

                        <div class="select-category">
                            <label for="select_category">
                                Select Category
                                <select name="selected_category" id="select_category">
                                    <option value="">Selected Category: {{ $post->category_slug }}</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->slug }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        <label>
                            <input name="post_image" id="post_image" type="file">
                            <img style="width: 90px;" src="/abyss/public/uploads/{!! $post->image !!}" alt=""/>
                        </label>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                        <input id="edit-post-button" class="primary-button" type="submit" value="Update">
                    </form>
                    <br>
                </div>
            </div>
        </div>

        {{--<div class="col-md-3">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">--}}
                    {{--<h3>Welcome back {{ Auth::user()->name }}</h3>--}}
                {{--</div>--}}
                {{--<div class="card-body">--}}
                    {{--<h4>Add new posts</h4>--}}
                    {{--<hr>--}}

                    {{--<div class="select-category">--}}
                        {{--<select>--}}
                            {{--<option>Category</option>--}}
                            {{--<option>Informative Posts</option>--}}
                            {{--<option>Useful posts</option>--}}
                            {{--<option>Nothing intersting</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}

                </div>
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
@endauth
@endsection