@extends('layouts.admin');
@section('content')
    <div class="container">
        <div class="row justify-content-center flex-column text-white">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"
                        placeholder="inserisci titolo" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                </div>

                <div class="mb-3">
                    <div class="form-group">
                        <h5>Tags</h5>
                        @foreach ($tags as $tag)
                            <div class="form-check-inline">
                                <input type="checkbox" class="form-check-input"
                                    {{ in_Array($tag->id, old('tags', [])) ? 'checked' : '' }} id="{{ $tag->slug }}"
                                    name="tags[]" value="{{ $tag->id }}">
                                <label class="form-check-label" for="{{ $tag->slug }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group">
                    <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200" alt="">
                    <label for="image">Aggiungi immagine</label>
                    <input type="file" name="image" id="image" onchange="boolpress.previewImage()">
                </div>





                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select id="category_id" name="category_id" class="form-control">
                        <option value="">Inserisci categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="published" name="published"
                        {{ old('published') ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">Published</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
