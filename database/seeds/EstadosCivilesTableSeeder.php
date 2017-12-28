<?php

use Illuminate\Database\Seeder;

class EstadosCivilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Estado::class)->create([
        	'estado_civil'=>'Soltero(a)',
        ]);
        factory(App\Estado::class)->create([
        	'estado_civil'=>'Casado(a)',
        ]);
        factory(App\Estado::class)->create([
        	'estado_civil'=>'Divorciado(a)',
        ]);
        factory(App\Estado::class)->create([
        	'estado_civil'=>'Viudo(a)',
        ]);
    }
}
