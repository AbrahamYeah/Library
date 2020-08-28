@extends('plantilla_inicio')

@section('Master2')
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Library</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @if (Route::has('login'))
                <ul class="navbar-nav ml-auto">
                    @auth
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                         </li>

                    @else
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                    @endauth
                </ul>
            @endif
            </div>
        </nav>

        <div class="container d-flex flex-column justify-content-center h-100 align-items-center">
            <div class="text-center" style="position: relative;">
                <h1 class ="display-2 my-3 " >
                    Welcome to the Library
                </h1>
                <div class="container py-5 text-center" >
                    <div class="">
                      <h2>Knowledge just a click:</h2>
                      <h3>Everything is easy if someone explain you</h3>
                      <div class="display-4">
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom" title="A huge list of books">
                            <i class="fas fa-swatchbook"></i>
                        </span>
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom" title="Choose the one you want">
                            <i class="fas fa-book-reader" ></i>
                        </span>
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip"data-placement="bottom"  title="Great genres to read">
                            <i class="fas fa-quran" ></i>
                        </span>
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom"  title="Always avaibles">
                            <i class="fas fa-book-open"></i>
                        </span>
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" data-placement="bottom" title="Save your favorites">
                            <i class="fas fa-bookmark"></i>
                        </span>
                      </div>
                    </div>
                </div>
            </div>

@endsection

