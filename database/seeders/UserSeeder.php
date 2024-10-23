<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'password' => bcrypt('12345'),
        ]);
        
        User::factory()->count(10)->create();
        // php artisan db:seed --class=UserSeeder

    }
}
