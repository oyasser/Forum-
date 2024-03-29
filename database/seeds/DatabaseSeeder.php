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
        factory(App\User::class, 10)->create();
//        factory(App\Channel::class, 50)->create();
//        factory(App\Thread::class, 50)->create();
        factory(App\Reply::class, 10)->create();
    }

}
