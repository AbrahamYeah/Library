<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $nombres_libros = ["Comedia",
        "Terror",
        "Sangriento",
        "Romatico",
        "Abstracto",
        "Imaginación"];
        foreach($nombres_libros as $key => $value){
            DB::table('Category')->insert([
                'name_cat'=>$value,
                'desc_cat'=>Str::random(60),
                'user_register'=> 1
            ]);
        }
    }
}
