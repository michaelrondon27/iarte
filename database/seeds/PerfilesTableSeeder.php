<?php

use Illuminate\Database\Seeder;

class PerfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Perfil::class)->create([
        	'perfil'=>'Administrador',
        ]);
        factory(App\Perfil::class)->create([
        	'perfil'=>'Artista',
        ]);
        factory(App\Perfil::class)->create([
            'perfil'=>'Auditor',
        ]);
        factory(App\Perfil::class)->create([
            'perfil'=>'Publicista',
        ]);
        factory(App\Perfil::class)->create([
            'perfil'=>'Solicitante',
        ]);
        factory(App\Perfil::class)->create([
            'perfil'=>'Atención al Ciudadano',
        ]);
    }
}
