@extends('layouts.app')

@section('content')
    <h1>
        New Book
    </h1>

    <div class="container">
        @if (session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('library.create') }}" class='form-group' method="post">
            <!-- con la etiqueta csrf nos ayuda a proteger nuestros sitios
        para evitar que terceros manden inserts a nuestro sitio
        creando un tocken unico por sesión del usuario. -->
            @csrf
            <input type="text" name='name_book' placeholder='Name of Book' class='form-control mb-2'
                value="{{ old('name_book') }}">
            <input type="text" name='author' placeholder='Author' class='form-control mb-2'
                value="{{ old('author') }}">
            <input type="date" name='publish_date' placeholder='Publish date' class='form-control mb-2'
                value="{{ old('publish_date') }}">
            <button type="submit" class='btn btn-outline-success mb-2'>Add</button>
        </form>
    </div>


@endsection
