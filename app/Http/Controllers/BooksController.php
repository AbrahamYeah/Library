<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App;
use Carbon\Carbon;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function Show_details($id)
    {
        //
        $user_id = auth()->user()->id;
        $libros =  App\Books::findOrFail($id);
        $prestamos = DB::table('borrow')->where([['book_id','=',$id],['status','=',1],])->exists();
        if( $prestamos != true){
            $prestamos = null;
            return view('library.Detalles',compact('libros','prestamos','user_id'));
        }else{
            $prestamos = DB::table('borrow')
            ->join('users', 'users.id', '=', 'borrow.user_id')
            ->select('borrow.*', 'users.name')
            ->where('book_id','=',$id)->orderBy('created_at', 'desc')->first();
            return view('library.Detalles',compact('libros','prestamos','user_id'));
        }

    }

    public function borrow_solicitud($id)
    {
         $prestamos = DB::table('borrow')->where([['book_id','=',$id],['status','=',1],])->exists();
         if($prestamos){
            return back()->with('Error', 'Book not aviable for now');
         }else{
            $user_id = auth()->user()->id;
            DB::table('borrow')->insert([
                'book_id'=>$id,
                'user_id'=>$user_id,
                'status'=> 1,
                'user_register'=> $user_id,
                'created_at'=> Carbon::now()->format('Y-m-d H:m:s')
             ]);
            return back()->with('mensaje', 'Book borrow successfully!');
         }
    }

    public function devolver($id)
    {
         $id_borrow = $id;
         $prestamos = DB::table('borrow')->where([['id','=',$id_borrow],])->orderBy('created_at', 'desc')->first();
         if($prestamos->status != 1){
            return back()->with('Error', 'The book is avible now');
         }else{
            $prestamos = DB::table('borrow')
              ->where('id','=', $id_borrow)
              ->update(['status' => 2]);
            return back()->with('mensaje', 'Book geting back successfully!');
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $libro_nuevo = new App\Books;

         $user_id = auth()->user()->id;
         $request->validate([
             'name_book'=> 'required',
             'author' => 'required',
             'publish_date' => 'required'
         ]);
         $libro_nuevo->name_book = $request->name_book;
         $libro_nuevo->author = $request->author;
         $libro_nuevo->public_date = $request->publish_date;
         $libro_nuevo->user_register = $user_id;
         $libro_nuevo->save();
         return back()->with('mensaje', 'Book register successfully!');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function autocomplete_by_name(Request $request)
    {
        //
        $user_id = auth()->user()->id;
        $nombre = $request->queryString;
        $libros =  DB::table('Books')->where('name_book','like','%'.$nombre.'%')->get();
        return json_encode($libros);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        $user_id = auth()->user()->id;

        $request->validate([
            'name_book'=> 'required',
            'author'=> 'required',
            'date_publish' => 'required'
        ]);
        $libro = App\Books::findOrFail($id);

        $libro->name_book = $request->name_book;
        $libro->author = $request->author;
        $libro->public_date = $request->date_publish;
        $libro->user_register = $user_id;
        // guardamos los cambios
        $libro->save();
        // retornamos a la vista anterior con un mensaje.
        return back()->with('mensaje', "Book Updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

         $nota = App\Books::findOrFail($id);
         $nota->delete();
         return back()->with('mensaje', "Book Deleted successfully");
    }

    public function Filter_by_name(Request $request)
    {
        //
        $request->validate([
            'name_book'=> 'required'
        ]);
        $nombre = $request->name_book;
        $libros = App\Books::where('name_book','like', '%'.$nombre.'%')->paginate(7);
        if(count($libros) >= 1){
            $mensaje = "Resultados de la busqueda: ".$nombre;
            return view('library.filtros',compact('libros'))->with('mensaje',$mensaje);
        }else{
            return back()->with('error', "Not Results");
        }
    }
}
