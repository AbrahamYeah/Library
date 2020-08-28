@extends('layouts.app')

@section('content')
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
    <div class="container">
        <form action="{{ route('library.update', $libro->id) }}" class='form-group form-row' method="post">
            <!-- con la etiqueta csrf nos ayuda a proteger nuestros sitios
        para evitar que terceros manden inserts a nuestro sitio
        creando un tocken unico por sesión del usuario. -->
            @method('PUT')
            @csrf
            <input type="text" name='name_book' placeholder='Name of Book' class='form-control mb-2'
                value="{{ $libro->name_book }}">
            <input type="text" name='author' placeholder='Author' class='form-control mb-2'
                value="{{ $libro->author }}">
            <input type="date" name='date_publish' placeholder='Published date' class='form-control mb-2'
                value="{{ $libro->publish_date }}">
            <button type="submit" class='btn btn-outline-success btn-block'>Editar</button>
        </form>
    </div>

@endsection
