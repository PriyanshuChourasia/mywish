<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

<<<<<<< HEAD
        // $this->call(StudentSeeder::class);
=======

>>>>>>> 03ebf515f79192fa20f8e830178cbbda88250e8e
        $this->call(AdminSeeder::class);
    }
}
