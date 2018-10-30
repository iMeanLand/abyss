@extends('layouts.admin-layout')
@php $posts_controller = new \App\Http\Controllers\PostsController() @endphp
@php $posts = $posts_controller->postShowPostsOnPage() @endphp
@section('content')

@auth
    <div class="card">
        <div class="card-header">
            <h3>All Posts</h3>
        </div>
        <div class="card-body">
            <table class="table_template">
                <thead>
                <tr>
                    <th>ID<i class="fas fa-id-card"></i></th>
                    <th>Date<i class="far fa-clock"></i></th>
                    <th>Image<i class="far fa-image"></i></th>
                    <th>Title<i class="fab fa-cuttlefish"></i></th>
                    <th>Status<i class="fas fa-signal"></i></th>
                    <th>Author<i class="fas fa-user"></i></th>
                    <th>Category Slug<i class="fas fa-user"></i></th>
                    <th>Category ID<i class="fas fa-user"></i></th>
                    <th>Edit Post</th>
                </tr>
                </thead>
                <tbody>

                @foreach($posts as $post)
                    <tr>
                        <td>{!! $post->id !!}</td>
                        <td>Created at: {{  date('M j, Y', strtotime( $post->created_at )) }}</td>
                        <td><img style="width: 90px;" src="/abyss/public/uploads/{!! $post->image !!}" alt=""/></td>
                        <td>{!! $post->title !!}</td>
                        <td>Published</td>
                        <td>{!! $post->user_id !!}</td>
                        <td>{!! $post->category_slug !!}</td>
                        <td>{!! $post->category_id!!}</td>
                        <td><a href="{{ url('/admin/edit-post/' . $post->id) }}"><i class="edit-post-icon fas fa-edit"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endauth

@endsection