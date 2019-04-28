@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <form method="post" action="{{ route('posts.store') }}">
                        <div class="card-header">New Post</div>
                        <div class="card-body">
                            @csrf

                            <div class="form-group">
                                <label for="postInputTitle">Title</label>
                                <input class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                                       id="postInputTitle" name="title" value="{{ old('title') }}" placeholder="Title"/>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="postInputContent">Content</label>
                                <textarea class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                          id="postInputContent" name="content"
                                          placeholder="Content" rows="10">{{ old('content') }}</textarea>
                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection