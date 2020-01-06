<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('books')->insert([
        [
            'title'=>'Name of the wind',
            'description'=>'good book',
        ],
        [
            'title'=>'Les rois mages',
            'description'=>'Livre 1',
        ],
        [
            'title'=>'Les mésirables',
            'description'=>'faire machine avant',
        ],
        [
            'title'=>'Name the goods',
            'description'=>'good book two',
        ],
        [
            'title'=>'Name of the world',
            'description'=>'book type',
        ]
    ]);

        $this->call(AuthorTableSeeder::class);
        
        $this->call(BookTableSeeder::class);

    }
}
