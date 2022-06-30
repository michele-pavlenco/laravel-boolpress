@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width: 18rem;">
            
                <div class="card-body">
                    <h5 class="card-title">Nome: {{ $tag->name }}</h5>
                </div>
            </div>
        </div>
    @endsection
