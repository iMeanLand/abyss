@extends('layouts.admin-layout')
@php
    $categories_controller = new App\Http\Controllers\PostsController();
    $categories = $categories_controller->showCategoriesInAdmin();
@endphp
@auth

@section('content')
    <div class="row">
        <div class="col-md-9">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('failed'))
                <div class="alert alert-danger">
                    {{ session('failed') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif


            <div class="card">
                <div class="card-header">
                    <h3>Welcome back {{ Auth::user()->name }} </h3>
                </div>
                <div class="card-body">
                    <h4>Add new posts</h4>
                    <hr>
                    <form id="add-post-form" method="post" enctype="multipart/form-data"
                          action="{{ action('PostsController@postCreatePost') }}">
                        @csrf
                        <label for="post-title">Post Title
                            <br>
                            <input name="post_title" class="input_example" id="post-title" placeholder="Post Title.."
                                   type="text">
                        </label>
                        <br>

                        <label for="post-message">Excerpt Message
                            <br>
                            <input type="text" name="post_excerpt" class="input_example" id="post-message"
                                   placeholder="Excerpt message.."/>
                        </label>

                        <label for="post-message">Body Message
                            <br>
                            <textarea class="textarea_example" name="post_message" id="post-message"></textarea>
                        </label>

                        <div class="select-category">
                            <label for="select_category">
                                Select Category
                                <select name="selected_category" id="select_category">
                                    <option value="">No category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->slug }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        <label>
                            <input name="post_image" id="post_image" type="file">
                        </label>
                        <input id="add-post-button" class="primary-button" type="submit" value="Publish">
                    </form>
                    <br>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h3>Welcome back {{ Auth::user()->name }}</h3>
                </div>
                <div class="card-body">
                    <h4>Add new posts</h4>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({selector: 'textarea'});</script>
    @endauth
@endsection