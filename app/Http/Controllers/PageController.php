<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libros = App\Books::paginate(7);
        return view('home',compact('libros'));
    }

    public function nuevo_libro()
    {
        //
        return view('library.newbook');
    }

    public function editar_libro($id)
    {
        //
        $libro = App\Books::findOrFail($id);
        return view('library.editbook',compact('libro'));
    }

}
