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
        //factory(\App\Mensaje::class, 10)->create();
        //factory(\App\User::class, 10)->create();
        factory(\App\Calificacione::class, 50)->create();
    }
}
