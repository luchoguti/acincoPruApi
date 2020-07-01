<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Balances::class, function (Faker $faker) {
    $account = \App\Models\Accounts::query ()->selectRaw ('id_accounts')->inRandomOrder ()->first ();
    return [
        'id_balances'=>$faker->uuid,
        'balance'=>$faker->randomNumber (6),
        'id_accounts'=> $account->id_accounts
    ];
});
