@extends('layouts.admin-layout')

@auth

@section('content')
    <div class="row">
        <div class="col-md-9">

            <div class="card">
                <div class="card-header">
                    <h3>Edit Category</h3>
                </div>
                <div class="card-body">
                    <form id="edit-post-form" method="post" action="{{ action('PostsController@postEditCategory') }}">
                        @csrf
                        <label for="category-title">Category Title
                            <br>
                            <input name="category_title" class="input_example" id="category-title" placeholder="Post Title.." value="{{ $categories->title }}" type="text">
                        </label>
                        <br>
                        <input type="hidden" name="category_id" value="{{ $categories->id }}">

                        <label for="category-slug">Category Slug
                            <br>
                            <input type="text" value="{{ $categories->slug }}" name="category_slug" class="input_example" id="category-slug"
                                   placeholder="Excerpt message.."/>
                        </label>

                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                        <input id="edit-post-button" class="primary-button" type="submit" value="Update">
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

    @endauth
@endsection