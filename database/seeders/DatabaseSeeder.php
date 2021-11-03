<?php

namespace Database\Seeders;

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
         \App\Models\User::factory(10)->create();
         $this->command->info('Facker user upload successfully');
        \App\Models\Product::factory(100)->create();
        $this->command->info('product created successfully');
    }
}
