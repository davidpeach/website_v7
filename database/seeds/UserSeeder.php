<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User')->create([
        	'name' => env('MY_NAME'),
        	'email' => env('MY_EMAIL'),
        	'password' => bcrypt(env('MY_PASSWORD')),
        	'email_verified_at' => \Carbon\Carbon::now(),
        ]);
    }
}
