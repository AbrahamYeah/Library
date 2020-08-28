<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksCategoryTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        for($i=0; $i<30;$i++){
            $random_cat = mt_rand(1,6);
            $ramdom_book = mt_rand(1,30);
            DB::table('rel_books_category')->insert([
                'idbook'=>$ramdom_book,
                'category_id'=>$random_cat,
                'user_register'=> 1
            ]);
        }
    }
}
