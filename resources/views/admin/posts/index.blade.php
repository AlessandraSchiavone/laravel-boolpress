@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('deleted'))
        <div class="alert alert-success">
           <strong>{{ session('deleted')}}  eliminato correttamente!</strong> 
           
        </div>
         @endif
        <h1 class="my-4">Elenco Articoli</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-4">Nuovo articolo</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titolo</th>
                    <th>Slug</th>
                    <th colspan="3">Azioni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->slug }}</td>
                        <td>
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-success">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href=" {{ route('admin.posts.edit', $post->id) }} " class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.posts.destroy', $post -> id )}}" method="POST" onSubmit="return confirm('Sei sicuro di voler eliminare questo articolo?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" >
                                <i class="fas fa-times"></i>
                                </button>
                            </form>
                            
                        </td>
                            
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection