@extends('layouts.default')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        Hello {{ $name }}
                        @if ($content)
                            <label class="d-block">
                            {{ $method }} Content:
                            <textarea readonly class="form-control d-block col-12" rows="3">{{ $content }}</textarea>
                            </label>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection