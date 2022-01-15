<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'role_id' => '1',
            'full_name' => 'Admin',
            'user_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone_number' => '0987654321',
            'password' => bcrypt('admin'),
            'passing_year' => 1972,
        ]);
        DB::table('users')->insert([
            'role_id' => '2',
            'full_name' => 'Manager',
            'user_name' => 'Manager',
            'email' => 'manager@gmail.com',
            'phone_number' => '0987654322',
            'password' => bcrypt('manager'),
            'passing_year' => 1972,
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'full_name' => 'User',
            'user_name' => 'User',
            'email' => 'user@gmail.com',
            'phone_number' => '0987654333',
            'password' => bcrypt('user'),
            'passing_year' => 1972,
        ]);

    }
}
