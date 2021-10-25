<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('types')->insert([
            'title'=>'atlikta',
            'description'=>'atlikta',
        ]);

        DB::table('types')->insert([
            'title'=>'neatlikta',
            'description'=>'neatlikta',
        ]);

        DB::table('types')->insert([
            'title'=>'vykdoma',
            'description'=>'vykdoma',
        ]);

        DB::table('types')->insert([
            'title'=>'nebeaktuali',
            'description'=>'nebeaktuali',
        ]);

    }
}



