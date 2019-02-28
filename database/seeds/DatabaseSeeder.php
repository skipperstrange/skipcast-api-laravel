<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Model\Channel::class, 60)->create();
        //factory(App\Model\Review::class, 300)->create();
        //factory(App\Model\Genre::class, 38)->create();
    }
}
