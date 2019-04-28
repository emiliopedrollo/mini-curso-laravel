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

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-subtitle">By {{ $post->author->name }} at {{ $post->created_at->format('m/d/Y H:i') }}</h6>
                        <div class="card-text my-3">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                        <a href="{{route('posts.edit',$post->id)}}" class="card-link">Edit</a>

                        <form method="post" id="deleteForm" class="d-inline" action="{{ route('posts.destroy',$post->id) }}">
                            @csrf
                            @method('DELETE')
                            <a href="javascript:document.getElementById('deleteForm').submit()" class="card-link">Delete</a>
                        </form>
                    </div>
                </div>
                <div class="card-title"></div>
            </div>
        </div>
    </div>
@endsection