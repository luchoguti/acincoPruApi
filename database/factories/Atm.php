<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Atm::class, function (Faker $faker) {
    return [
        'id_atm'=>$faker->uuid,
        'name_atm'=>$faker->name,
        'ubication'=>$faker->address
    ];
});
