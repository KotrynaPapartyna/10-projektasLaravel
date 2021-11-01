<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title'=>$faker->jobTitle(),
        'description'=>$faker->sentence(2),
        'logo'=>$faker->imageUrl(300,300, "animals", true),
        'created_at'=>$faker->date(),
        'updated_at'=>$faker->date(),
        'type_id'=>rand(1,4),
        'owner_id'=>rand(1,4),
    ];
});
