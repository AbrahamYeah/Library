@extends('layouts.app')

@section('content')
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

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>List of Books for {{ auth()->user()->name }}</span>
                    <a href="{{route('library.newbook')}}" class="btn btn-primary btn-sm">New Book</a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-row-reverse">
                            <form class="form-inline" action="{{route('library.filtros')}}">
                                @csrf
                                    <label class="sr-only" for="name_book">Name</label>
                                    <filterbooks />
                                </form>
                            </div>
                        </div>
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col ">Name of Book</th>
                                    <th scope="col">Autor</th>
                                    <th scope="col">published date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($libros as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>
                                            <a href="{{ route('library.detalle', $item->id) }}">
                                                {{ $item->name_book }}
                                            </a>
                                        </td>
                                        <td>{{ $item->author }}</td>
                                        <td>{{ $item->public_date }}</td>
                                        <td>
                                            <a href="{{ route('library.editbook', $item->id) }}"
                                                class="btn btn-warning btn-sm">
                                                Modify
                                            </a>
                                            <form action="{{ route('library.delete', $item) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $libros->links() }}
                        {{-- fin card body --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
