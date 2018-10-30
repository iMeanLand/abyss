@extends('layouts.app')
@php
    $categories_controller = new App\Http\Controllers\PostsController();
    $categories = $categories_controller->showCategoriesInAdmin();
    use Illuminate\Support\Str;
@endphp
@section('content')

    <div class="container-fluid py-4">
        <div class="row">

            @if(!$posts->isEmpty())
                <div class="col-md-8">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('post-edited'))
                        <div class="alert alert-success">
                            {{ session('post-edited') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-6">
                                <article class="post">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>{{ $post->title }}</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="post-image-block">
                                                <div class="post-image"
                                                     style="background-image: url('/abyss/public/uploads/{{ $post->image }}')">
                                                    <a href="/abyss/public/blog/post/{{ $post->id }}" class="post-image-wrap">
                                                    </a>
                                                    <div class="post-image-content">
                                                        <a class="post-image-button" href="/abyss/public/blog/post/{{ $post->id }}">read more</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>{!! str_limit($post->message, 200) !!}</p>
                                            <p>{{ $post->excerpt }}</p>
                                            <hr>
                                            <p>Created at: {{  date('M j, Y', strtotime( $post->created_at )) }}</p>
                                            @auth
                                                <a class="primary-button move-left"
                                                   href="{{ url('/admin/edit-post/'.$post->id) }}">Edit
                                                    Post</a>
                                                <form action="{{ action('PostsController@postDeletePost')}}"
                                                      method="POST"
                                                      id="delete-form">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" value="{{ $post->id }}" name="id">
                                                    <input type="submit" value="Remove Post"
                                                           class='primary-button red move-right'>
                                                </form>
                                            @endauth
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>


            @else
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3>There are no posts :(</h3>
                        </div>
                        <div class="card-body">
                            ...
                        </div>
                    </div>
                </div>
            @endif


            <div class="col-md-4">
                @include('layouts.inc.sidebar')
                @include('layouts.inc.blog-sidebar')
            </div>

            <div class="post-pagination">
                {{ $posts->links() }}
            </div>

        </div>
    </div>


@endsection


