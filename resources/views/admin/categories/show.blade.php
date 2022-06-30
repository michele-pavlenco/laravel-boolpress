@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 18rem;">
                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">Nome:
                        {{ $category->id }} {{ $category->name }}
                    </h5>
                </div>
            </div>
        </div>
    @endsection
