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
        <a class="primary-button" href="{{ url('/admin/addposts') }}"><i class="fas fa-plus"></i> Add Post</a>
        <hr/>
        <input type="number" value="10"> Posts per page
        <table class="table_template">
            <thead>
                <tr>
                    <th>ID<i class="fas fa-id-card"></i></th>
                    <th>Date<i class="far fa-clock"></i></th>
                    <th>Title<i class="fab fa-cuttlefish"></i></th>
                    <th>Status<i class="fas fa-signal"></i></th>
                    <th>Author<i class="fas fa-user"></i></th>
                    <th>Category Slug<i class="fas fa-user"></i></th>
                    <th>Category ID<i class="fas fa-user"></i></th>
                </tr>
            </thead>
            <tbody>

                @foreach($posts as $post)
                    <tr>
                        <td>{!! $post->id !!}</td>
                        <td>Created at: {{  date('M j, Y', strtotime( $post->created_at )) }}</td>
                        <td>{!! $post->title !!}</td>
                        <td>Published</td>
                        <td>{!! $post->user_id !!}</td>
                        <td>{!! $post->category_slug !!}</td>
                        <td>{!! $post->category_id !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endauth
@endsection