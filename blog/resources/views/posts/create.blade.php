@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('post.create') }}" method="post" class="form-control">
            @csrf
            <div class="form-group mt-3">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control">
            </div>
            <div class="form-group mt-3">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>
            <div class="form-group mt-3">
                <label for="image">Image</label>
                <input type="text" name="image" id="image" class="form-control">
            </div>
            <button class="btn btn-primary mt-3">Create</button>
        </form>
    </div>
@endsection
