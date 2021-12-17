<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoErro;
use Faker\Generator as Faker;

$factory->define(TipoErro::class, function (Faker $faker) {
    return [
        'Titulo' => $faker->name,
        'tipoErro' => $faker->numberBetween(1,3),
        'Titulo' => $faker->name,

        'Descricao' => $faker->text(200)
    ];
});
