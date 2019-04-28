@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card mb-3">
                    <div class="card-body">
                        <a href="{{ route('posts.create') }}" class="btn btn-outline-success">New Post</a>
                    </div>
                </div>

                @foreach($posts as $post)
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle">By {{ $post->author->name }} at {{ $post->created_at->format('m/d/Y H:i') }}</h6>
                        <div class="card-text my-3">
                            {!! Str::words(nl2br(e($post->content))) !!}
                        </div>
                        <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-outline-primary">View more</a>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-primary">Edit</a>
                        <form method="post" class="d-inline" action="{{ route('posts.destroy',$post->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-outline-danger"/>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection