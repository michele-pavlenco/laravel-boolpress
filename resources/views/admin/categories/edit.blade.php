@extends('layouts.admin')
@section('content')

<form action="{{ route('admin.tags.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')
    <h1>Modifica dati</h1>
  <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" id="name" name="name"  placeholder="inserisci nome" value="{{ $category->name }}">
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
    
@endsection