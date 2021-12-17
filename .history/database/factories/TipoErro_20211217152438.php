<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoErro;
use Faker\Generator as Faker;

$factory->define(TipoErro::class, function (Faker $faker) {
    return [
        'Titulo' => $faker->name,
        'telefone' => $faker->tollFreePhoneNumber,
        'email' => $faker->unique()->email,
        'motivo_contato' => $faker->numberBetween(1,3),
        'mensagem' => $faker->text(200)
    ];
});
