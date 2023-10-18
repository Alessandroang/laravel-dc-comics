<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\Train;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            $train = new Train();
            $train->azienda = $faker->name();
            $train->stazione_partenza = $faker->city();
            $train->stazione_arrivo = $faker->city();
            $train->orario_di_partenza = $faker->time();
            $train->orario_di_arrivo = $faker->time();

            $randomDate = $faker->date();
            $train->data_di_partenza = $randomDate;
            $train->data_di_arrivo = $randomDate;
            $train->codice_treno = Str::random(8);
            $train->numero_carrozze = $faker->numberBetween(1, 20);
            $train->save();
        }
    }
}