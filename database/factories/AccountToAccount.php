<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\AccountToAccount::class, function (Faker $faker) {
    $account = \App\Models\Accounts::query ()->selectRaw ('id_accounts as account')->inRandomOrder ()->first ();
    return [
        'account_origin'=>"a9705803-a28b-30bf-85b6-d4ca912628e0",
        'account_association'=> $account->account
    ];
});
