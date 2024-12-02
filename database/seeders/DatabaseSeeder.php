<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\User;
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

        User::create([
            'name' => 'inas Tsabitah Dien',
            'username' => 'inas',
            'email' => 'inas.tsabitah22@gmail.com',
            'gender' => 'Perempuan',
            'school_name' => 'SMK Raden Umar Said Kudus',
            'address' => 'Tangerang',
            'role' => 'admin',
            'password' => bcrypt('tsabitah'),
        ]);

        Category::create([
            [
                'name' => 'Novel',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Manga',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Manhwa',
                'created_at' => now(),
                'updated_at' => now()
            ], [
                'name' => 'Manhua',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
