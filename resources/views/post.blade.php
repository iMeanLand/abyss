@extends('layouts.app')
@section('content')

    <div class="container py-4">
        @foreach($posts as $post)
            <article class="single-post">
                <div class="card">
                    <div class="card-body">
                        <div class="post-image-block">
                            <div class="post-single-image"
                                 style="background-image: url('/abyss/public/uploads/{{ $post->image }}')">
                            </div>
                        </div>
                        <div class="single-post-content">
                            <h3 class="text-uppercase">{{ $post->title }}</h3>
                            <p>{!! $post->message !!}</p>
                            <p>{{ $post->excerpt }}</p>
                            <p>Created at: {{  date('M j, Y', strtotime( $post->created_at )) }}</p>
                        </div>
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
        @endforeach
    </div>


@endsection


