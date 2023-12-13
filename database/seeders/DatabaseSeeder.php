<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
          \App\Models\Product::factory(5)->create();
           \App\Models\Sale::factory(5)->create();
                DB::table('users')->insert([
                    "name"=>"Admin",
                    "email"=>"admin@gmail.com",
                    "password"=>Hash::make("password")
                ]);
    }
}
