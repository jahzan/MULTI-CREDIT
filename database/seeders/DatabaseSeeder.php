<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            Inicial::class,
            Departamentos::class,
            Ciudades::class,
            Conceptos::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
