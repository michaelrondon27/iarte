<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Status::class)->create([
        	'status'=>'Activo',
        ]);
        factory(App\Status::class)->create([
        	'status'=>'Inactivo',
        ]);
        factory(App\Status::class)->create([
            'status'=>'Disponible',
        ]);
        factory(App\Status::class)->create([
            'status'=>'Restringido',
        ]);
        factory(App\Status::class)->create([
            'status'=>'Bloqueado',
        ]);
        factory(App\Status::class)->create([
            'status'=>'Pendiente',
        ]);
        factory(App\Status::class)->create([
            'status'=>'En edición',
        ]);
        factory(App\Status::class)->create([
            'status'=>'Publicado',
        ]);
        factory(App\Status::class)->create([
            'status'=>'En proceso',
        ]);
        factory(App\Status::class)->create([
            'status'=>'En evaluación',
        ]);
        factory(App\Status::class)->create([
            'status'=>'Rechazado',
        ]);
        factory(App\Status::class)->create([
            'status'=>'Aceptado',
        ]);
    }
}
