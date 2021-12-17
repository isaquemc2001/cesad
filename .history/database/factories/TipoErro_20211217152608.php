<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TipoErro;
use Faker\Generator as Faker;

$factory->define(TipoErro::class, function (Faker $faker) {
    return [
        'Titulo' => $faker->titulo,
        'tipoErro' => $faker->numberBetween(1,2),
        'Anexo' => $faker->name,
        'Descricao' => $faker->text(200)
    ];
});
