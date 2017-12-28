<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusTableSeeder::class);
        $this->call(PerfilesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(GenerosTableSeeder::class);
        $this->call(PaisesTableSeeder::class);
        $this->call(IconsTableSeeder::class);
        $this->call(EstadosTableSeeder::class);
        $this->call(EstadosCivilesTableSeeder::class);
    }
}
