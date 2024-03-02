<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use App\Models\User;

class ShaUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
               'name'   => 'SHA User',
               'email'  => 'grievance.mmlsay@aaasassam.in',
               'sha_user'   => 1,
               'password'   => Hash::make('admin123@mmlsay'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
