<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BooksTable::class);
        $this->call(CategoryTable::class);
        $this->call(BooksCategoryTableSeed::class);
    }
}
