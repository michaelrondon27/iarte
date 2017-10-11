<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
        	'name'=>'Michael Rondon',
        	'email'=>'mrondon72@gmail.com',
        	'password' => bcrypt('filadelfia'),
	        'status_id'=>1,
        ]);
    }
}
