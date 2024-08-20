<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            // 
            'username' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("admin"),
            'usertype' => 'admin',
        ]);
        
        User::create([
            'username' => 'Arin',
            'email' => 'arin@gmail.com',
            'password' => Hash::make("1366"),
            'birthday' => now(),
            'bloodtype' => "AZ",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        User::create([
            'username' => 'DOCTOR1',
            'email' => 'doct1@gmail.com',
            'password' => Hash::make("doct"),
            'card_id' => '1480500000000',
            'prefix' => 'นายแพทย์',
            'firstname' => 'สมพง',
            'lastname' => 'สมสุข',
            'usertype' => 'doctor',
            'birthday' => now(),
            'bloodtype' => "AZ",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Doctor::create([
            'id'=>1,
            'user_id'=>3
        ]);
        User::create([
            'username' => 'Kamonwan',
            'email' => 'kamonwan@gmail.com',
            'password' => Hash::make("1234"),
            'card_id' => '1111111222333',
            'prefix' => '-',
            'firstname' => '-',
            'lastname' => '-',
            'usertype' => 'doctor',
            'birthday' => now(),
            'bloodtype' => "AZ",
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Doctor::create([
            'id'=>2,
            'user_id'=>4
        ]);
    }
}
