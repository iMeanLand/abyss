@extends('layouts.admin-layout')
@php
    $categories_controller = new App\Http\Controllers\PostsController();
    $categories = $categories_controller->showCategoriesInAdmin();
@endphp
@section('content')

    @auth
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

        @if(session('success_edit'))
            <div class="alert alert-success">
                {{ session('success_edit') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Categories</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <h3>Add a new post category</h3>
                    <form id="add-category-form" method="post"
                          action="{{ action('PostsController@postsCreateCategory') }}">
                        @csrf
                        <label for="category-title">Category Title
                            <br>
                            <input name="category_title" class="input_example" id="category-title"
                                   placeholder="category title..." type="text" required>
                        </label>
                        <br>

                        <label for="category-slug">Category Slug
                            <br>
                            <input type="text" name="category_slug" class="input_example" id="category-slug"
                                   placeholder="category slug..." required/>
                        </label>

                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                        <input id="add-category-button" class="primary-button" type="submit" value="Add Category">
                    </form>
                    </div>

                <div class="col-md-9">

                <table class="table_template">
                    <thead>
                    <tr>
                        <th>ID<i class="fas fa-id-card"></i></th>
                        <th>Created At<i class="far fa-clock"></i></th>
                        <th>Title<i class="fab fa-cuttlefish"></i></th>
                        <th>Slug<i class="fas fa-briefcase"></i></th>
                        <th>Delete<i class="fas fa-briefcase"></i></th>
                        <th>Edit<i class="fas fa-edit"></i></th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $category)
                        <tr>
                            <td>{!! $category->id !!}</td>
                            <td>Created at: {{  date('M j, Y', strtotime( $category->created_at )) }}</td>
                            <td>{!! $category->title !!}</td>
                            <td>{!! $category->slug !!}</td>
                            <td>
                                <form action="{{ action('PostsController@postDeleteCategory')}}" method="post"
                                      id="delete-form">
                                    {!! csrf_field() !!}
                                    <input type="hidden" value="{{ $category->id }}" name="category_id">
                                    <input type="submit" value="Remove Category" class='primary-button red'>
                                </form>
                            </td>
                            <td>
                                <a href="/abyss/public/admin/edit-category/{{ $category->id }}">Edit<i
                                            class="fas fa-edit"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                </div>
                </div>

            </div>
        </div>
    @endauth

@endsection