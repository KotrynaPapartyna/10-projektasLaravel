<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Owner;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        factory(Owner::class, 10)->create();

        // DB::table('owners')->insert([
        //     "name" => Str::random(20),
        //     "surname" => Str::random(20),
        //     "email" => Str::random(10).'@gmail.com',
        //     "phone" => '+370'.Str::random(8),
        // ]);

        // DB::table('owners')->insert([
        //     "name" => Str::random(20),
        //     "surname" => Str::random(20),
        //     "email" => Str::random(10).'@gmail.com',
        //     "phone" => '+370'.Str::random(8),
        // ]);

        // DB::table('owners')->insert([
        //     "name" => Str::random(20),
        //     "surname" => Str::random(20),
        //     "email" => Str::random(10).'@gmail.com',
        //     "phone" => '+370'.Str::random(8),
        // ]);

        // DB::table('owners')->insert([
        //     "name" => Str::random(20),
        //     "surname" => Str::random(20),
        //     "email" => Str::random(10).'@gmail.com',
        //     "phone" => '+370'.Str::random(8),
        // ]);

        // DB::table('owners')->insert([
        //     "name" => Str::random(20),
        //     "surname" => Str::random(20),
        //     "email" => Str::random(10).'@gmail.com',
        //     "phone" => '+370'.Str::random(8),
        // ]);

        // DB::table('owners')->insert([
        //     "name" => Str::random(20),
        //     "surname" => Str::random(20),
        //     "email" => Str::random(10).'@gmail.com',
        //     "phone" => '+370'.Str::random(8),
        // ]);

        // DB::table('owners')->insert([
        //     "name" => Str::random(20),
        //     "surname" => Str::random(20),
        //     "email" => Str::random(10).'@gmail.com',
        //     "phone" => '+370'.Str::random(8),
        // ]);

        // DB::table('owners')->insert([
        //     "name" => Str::random(20),
        //     "surname" => Str::random(20),
        //     "email" => Str::random(10).'@gmail.com',
        //     "phone" => '+370'.Str::random(8),
        // ]);

        // DB::table('owners')->insert([
        //     "name" => Str::random(20),
        //     "surname" => Str::random(20),
        //     "email" => Str::random(10).'@gmail.com',
        //     "phone" => '+370'.Str::random(8),
        // ]);
    }
}
