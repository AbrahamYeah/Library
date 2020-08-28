<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BooksTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $nombres_libros = ["Harry Potter ",
        "Los piratas del caribe ",
        "El señor de los anillos ",
        "Juego de Tronos",
        "Java",
        "PHP v"];
        foreach($nombres_libros as $key => $value){
            for($i=1; $i<count($nombres_libros);$i++){
                DB::table('Books')->insert([
                    'name_book'=>$value." ".$i,
                    'author'=>Str::random(40),
                    'public_date'=> Carbon::now()->format('Y-m-d'),
                    'user_register'=> 1
                ]);
            }
        }
    }
}
