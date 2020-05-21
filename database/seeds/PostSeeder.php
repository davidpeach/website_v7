<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory('App\User')->create();
        auth()->loginUsingId($user->id);

        factory('App\Post', 20)->create();
    }
}
