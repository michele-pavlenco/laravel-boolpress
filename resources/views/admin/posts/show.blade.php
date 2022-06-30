@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 18rem;">
                 <img src="{{asset('/storage/'.$post->image)}}" class="card-img-top" alt="..."> 
                <div class="card-body">
                    <h5 class="card-title">Titolo: {{ $post->title }}</h5>
                    <p class="card-text" value="{{$post->content}}">Contenuto: {!! $post->content !!}</p>
                </div>
                {{-- @if (auth()->user()->id == $post->user_id) --}}
                     <ul class="list-group list-group-flush">
                    <li class="list-group-item">Categoria: 
                        @if($post->category)
                        {{ $post->category->name }}
                        @endif
                    </li>
                    <li class="list-group-item">Tags:
                        @foreach ($post->tags as $item)
                            {{ $item->name . ','}}
                        @endforeach
                    .</li>
                    <li class="list-group-item">Pubblicato: {{ $post->published }}</li>
                </ul>
              
               
            </div>
        </div>
    @endsection
