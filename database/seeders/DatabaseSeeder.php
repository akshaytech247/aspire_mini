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
        \App\Models\User::factory(1)->create(['name'=>'Test Customer','email'=>'customer@example.com']);
        \App\Models\User::factory(1)->create(['name'=>'Administrator','email'=>'admin@example.com' , 'is_admin'=>1]);
        \App\Models\User::factory(10)->create();
        $this->call(UserLoansSeeder::class);
    }
}
