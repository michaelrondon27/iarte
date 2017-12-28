<?php

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Estado::class)->create([
        	'estado'=>'Amazonas',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Anzoátegui',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Apure',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Aragua',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Barinas',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Bolívar',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Carabobo',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Cojedes',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Delta Amacuro',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Distrito Capital',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Falcón',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Guárico',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Lara',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Mérida',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Miranda',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Monagas',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Nueva Esparta',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Portuguesa',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Sucre',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Táchira',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Trujillo',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Vargas',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Yaracuy',
        ]);
        factory(App\Estado::class)->create([
        	'estado'=>'Zulia',
        ]);
    }
}
