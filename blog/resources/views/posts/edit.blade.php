@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('post.update', $post) }}" method="post" class="form-control">
            @csrf
            @method('PUT')
            <div class="form-group mt-3">
                <label for="title">Title</label>
                <input type="text" id="title" value="{{ $post->title }}" name="title" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control">{{ $post->content }}</textarea>
            </div>
            <div class="form-group mt-3">
                <label for="image">Image</label>
                <input type="text" name="image" value="{{ $post->image }}" id="image" class="form-control">
            </div>
            <button class="btn btn-info mt-3">Save</button>
        </form>
    </div>
@endsection
