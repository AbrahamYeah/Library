@extends('layouts.app')

@section('content')


<h1>Detalles del libro: {{$libros->name_book}}</h1>

<div class="container">
    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Characters</th>
            <th scope="col">Dates</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">Name_book</th>
            <td>{{$libros->name_book}}</td>
          </tr>
          <tr>
            <th scope="row">Author</th>
            <td>{{$libros->author}}</td>
          </tr>
          <tr>
            <th scope="row">published date</th>
            <td >{{$libros->public_date }}</td>
          </tr>
          <tr>
            <th scope="row">State of Borrow</th>
            <td >
            @if ($prestamos != null)
                @if ($user_id = $prestamos->user_id)
                <a class="btn btn-warning" href="{{route('library.devolver', $prestamos->id)}}">Get it back</a>
                Who? {{$prestamos->name}}
                @else
                    Not aviable for now
                    Who? {{$prestamos->name}}
                @endif
            @else
                <a class="btn btn-success" href="{{route('library.solicitar', $libros->id)}}">Aviable</a>
            @endif
            </td>
          </tr>

        </tbody>
      </table>
</div>

@if (session('mensaje'))
<div class="alert alert-success">
    {{ session('mensaje') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('mensaje'))
<div class="alert alert-warning">
    {{ session('Error') }}
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
@endsection
