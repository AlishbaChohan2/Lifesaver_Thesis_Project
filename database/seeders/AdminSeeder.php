<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            [
            'name' => 'Alishba Chohan',
            'email' => 'alishba@yahoo.com',
            'password' => Hash::make('alishba'), 
            ],
            
            [
                'name' => 'Admin',
                'email' => 'admin@yahoo.com',
                'password' => Hash::make('admin'), 
            ]
            
    ]);
    }
}
