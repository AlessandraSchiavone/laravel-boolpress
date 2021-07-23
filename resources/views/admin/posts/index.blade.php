@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Elenco Articoli</h1>
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
                @foreach ($posts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->slug }}</td>
                        <td>
                            <a href="" class="btn btn-success">
                                <i class="fas fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="" class="btn btn-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="" class="btn btn-danger">
                                <i class="fas fa-times"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection