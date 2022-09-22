<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => config('app.dev_user_name'),
            'email' => config('app.dev_user_email'),
            'password' => bcrypt(config('app.dev_user_password')),
        ]);

        \App\Models\Building::factory(10)->create();
    }
}
