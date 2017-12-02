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
        App\Post::unguard();

        /**
         * Delete all registers in table
         */
        App\Post::truncate();

        factory(App\Post::class, 20)->create();
    }
}
