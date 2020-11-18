<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create([
            'email' => 'a@a',
            'admin' => true,
            'password' => Hash::make('a')
        ]);
        \App\Models\User::factory(1)->create([
            'email' => 'u@a',
            'admin' => false,
            'password' => Hash::make('a')
        ]);
        \App\Models\User::factory(8)->create();
        \App\Models\Task::factory(10)->create();
        \App\Models\Movie::factory(10)->create();
    }
}
