<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "login" => "Admin",
            "name" => "Денис",
            "surname" => "Иванов",
            "role" => "admin",
            "password" => "124578-You",
        ]);
    }
}
