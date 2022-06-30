@extends('layouts.admin')
@include('partials.popupDelete')
@section('content')

<div class="container">
  <div class="row">
     <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">Crea nuovo post</a>
    <table class="table">
        <thead>
            <tr class="text-white">
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Creation Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr class="text-white">
                    <td><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->id }}</a></td>
                    <td><a href="{{ route('admin.posts.show', $post->id) }}"> {{ $post->title }}</a></td>
                    <td>{{ $post->created_at }}</td>
                    <td><a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">Modifica</a></td>
                    <td>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="boolpress.openModal(event, {{$post->id}})" class="btn btn-danger">
                                Elimina
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

  </div>
</div>
   
    {{$posts->links()}}
@endsection
