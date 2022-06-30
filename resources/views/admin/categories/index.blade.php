@extends('layouts.admin')

@section('content')
    <div class="modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" @@click="submitForm()">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Crea nuova categoria</a>
            <table class="table">
                <thead>
                    
                    <tr class="text-white">
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Creation Date</th>
                    </tr>
                </thead>
                <tbody> 
                    @foreach ($categories as $category)
                        <tr class="text-white">
                            <td><a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->id }}</a>
                            </td>
                            <td><a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }} </a>
                            </td>
                            <td>{{ $category->created_at }}</td>
                            <td><a href="{{ route('admin.categories.edit', $category->id) }}"
                                    class="btn btn-primary">Modifica</a></td>
                            <td>
                                <form id="form" action="{{ route('admin.categories.destroy', $category->id) }}"
                                    method="POST"> 
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        @@click="openModal($event, {{ $category->id }})"
                                        class="btn btn-danger">
                                        Elimina
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    {{ $categories->links() }}
@endsection
