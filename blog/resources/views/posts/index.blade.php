@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Likes</th>
                <th scope="col">Doing</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->likes }}</td>
                <td>
                    <form action="{{ route('post.delete', $post) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a href=""><button class="btn btn-danger">Delete</button></a>
                    </form>
                    <a href="{{ route('post.edit', $post) }}"><button class="btn btn-primary">Edit</button></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div>
            {{ $posts->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection
