<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LibrarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('libraries')->truncate();

        $libraries = array(

            // Libraries
            array('id' => 1, 'name' => 'John Doe'),
            array('id' => 2, 'name' => 'Ilesanmi'),
            array('id' => 3, 'name' => 'Yoodule'),
            array('id' => 4, 'name' => 'Neo'),
            array('id' => 5, 'name' => 'Union'),
            array('id' => 6, 'name' => 'Gasline'),
            array('id' => 7, 'name' => 'Glory'),
            array('id' => 8, 'name' => 'Lorem Ipsum'),
            array('id' => 9, 'name' => 'Generous'),
            array('id' => 10, 'name' => 'Wonderful'),

        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('libraries')->insert($libraries);
    }
}
