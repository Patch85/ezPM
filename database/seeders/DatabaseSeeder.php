<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Building;
use \App\Models\Equipment;
use \App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => config('app.dev_user_name'),
            'email' => config('app.dev_user_email'),
            'password' => bcrypt(config('app.dev_user_password')),
        ]);

        Building::factory(12)
            ->has(Equipment::factory()->count(12))
            ->create();
    }
}
