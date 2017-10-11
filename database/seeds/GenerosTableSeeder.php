<?php

use Illuminate\Database\Seeder;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Genero::class)->create([
        	'genero'=>'Femenino',
        ]);
        factory(App\Genero::class)->create([
        	'genero'=>'Masculino',
        ]);
    }
}
