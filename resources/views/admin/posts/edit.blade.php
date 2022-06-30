@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <form class="text-white" action="{{ route('admin.posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h1>Modifica dati</h1>
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" class="text-white" id="title" name="title"
                        placeholder="inserisci titolo" value="{{ $post->title }}">
                </div>
                <div class="mb-3 text-white">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" type="text" id="content" cols="120" rows="20" value="{{ $post->content }}">
                        {{ $post->content }}
                    </textarea>
                </div>
                <div class="form-group">
                    @if ($post->image)
                        <img id="uploadPreview" width="100" src="{{ asset("storage/{$post->image}") }}"
                            alt="{{ $post->title }}">
                    @endif
                    <label for="image">Aggiungi immagine</label>
                    <input type="file" id="image" name="image" onchange="boolpress.previewImage();">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select name="category_id" id="category"
                        class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Select category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
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





                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="published" name="published"
                        {{ old('published') ? 'checked' : '' }}>
                    <label class="form-check-label" for="published">Published</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection
