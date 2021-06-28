<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
        //
        User::create([
            'nama' => 'Admin',
            'email' => 'admindemo@mail.com',
            'password' => Hash::make("123123"),
            'role' => 1,
        ]);

        User::create([
            'nama' => 'Rizky',
            'email' => 'rizky@mail.com',
            'password' => Hash::make("123123"),
            'role' => 1,
        ]);
    }
}
