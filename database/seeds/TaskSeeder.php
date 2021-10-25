<?php

use App\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('tasks')->insert([
            'title'=>'title',
            'description'=>'description',
            'type_id'=>rand(1,4),
            'created_at'=>date('y-m-d'),
            'updated_at'=>date('y-m-d'),
            'logo'=>'logo',
       ]);

       DB::table('tasks')->insert([
            'title'=>'title',
            'description'=>'description',
            'type_id'=>rand(1,4),
            'created_at'=>date('y-m-d'),
            'updated_at'=>date('y-m-d'),
            'logo'=>'logo',

        ]);

        DB::table('tasks')->insert([
            'title'=>'title',
            'description'=>'description',
            'type_id'=>rand(1,4),
            'created_at'=>date('y-m-d'),
            'updated_at'=>date('y-m-d'),
            'logo'=>'logo',

        ]);

        DB::table('tasks')->insert([
            'title'=>'title',
            'description'=>'description',
            'type_id'=>rand(1,4),
            'created_at'=>date('y-m-d'),
            'updated_at'=>date('y-m-d'),
            'logo'=>'logo',

        ]);

        DB::table('tasks')->insert([
            'title'=>'title',
            'description'=>'description',
            'type_id'=>rand(1,4),
            'created_at'=>date('y-m-d'),
            'updated_at'=>date('y-m-d'),
            'logo'=>'logo',

        ]);

        DB::table('tasks')->insert([
            'title'=>'title',
            'description'=>'description',
            'type_id'=>rand(1,4),
            'created_at'=>date('y-m-d'),
            'updated_at'=>date('y-m-d'),
            'logo'=>'logo',

        ]);

        DB::table('tasks')->insert([
            'title'=>'title',
            'description'=>'description',
            'type_id'=>rand(1,4),
            'created_at'=>date('y-m-d'),
            'updated_at'=>date('y-m-d'),
            'logo'=>'logo',
        ]);

        DB::table('tasks')->insert([
            'title'=>'title',
            'description'=>'description',
            'type_id'=>rand(1,4),
            'created_at'=>date('y-m-d'),
            'updated_at'=>date('y-m-d'),
            'logo'=>'logo',
        ]);

        DB::table('tasks')->insert([
            'title'=>'title',
            'description'=>'description',
            'type_id'=>rand(1,4),
            'created_at'=>date('y-m-d'),
            'updated_at'=>date('y-m-d'),
            'logo'=>'logo',
        ]);

        DB::table('tasks')->insert([
            'title'=>'title',
            'description'=>'description',
            'type_id'=>rand(1,4),
            'created_at'=>date('y-m-d'),
            'updated_at'=>date('y-m-d'),
            'logo'=>'logo',
        ]);

    }
}
