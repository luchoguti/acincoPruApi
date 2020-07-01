<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Accounts::class, function (Faker $faker) {
    $typeDocument = \App\Models\TypeDocument::query ()->selectRaw ('id_type_document as type_document')->inRandomOrder ()->first ();
    $bank = \App\Models\Banks::query ()->selectRaw ('id_banks as banks')->inRandomOrder ()->first ();
    $typeAccount = \App\Models\TypeAccount::query ()->selectRaw ('id_type_account as type_account')->inRandomOrder ()->first ();

    return [
        'id_accounts'=>$faker->uuid,
        'number_account'=>$faker->bankAccountNumber,
        'name_cardholder'=>$faker->firstNameMale,
        'id_type_document'=>$typeDocument->type_document,
        'number_identification'=>$faker->randomNumber (9),
        'banks'=>$bank->banks,
        'type_account'=>$typeAccount->type_account,
        'password_account'=> bcrypt (1234)
    ];
});
