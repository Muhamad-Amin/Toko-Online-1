<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'role_id' => 1,
                'name' => 'amin',
                'email' => 'amin@gmail.com',
                'password' => bcrypt('rahasia'),
                'no_hp' => '086234543123',
                'address' => 'NTB, Lombok Timur dan Lombok Barat beserta Lombok Utara dan Lombok Tengah',
            ],
            [
                'role_id' => 2,
                'name' => 'bot',
                'email' => 'bot@gmail.com',
                'password' => bcrypt('rahasia'),
                'no_hp' => '086234543153',
                'address' => 'NTB, Lombok Timur dan Lombok Barat beserta Lombok Utara dan Lombok Tengah',
            ],
        ];

        foreach ($data as $value) {
            User::insert([
                'role_id' => $value['role_id'],
                'name' => $value['name'],
                'email' => $value['email'],
                'password' => $value['password'],
                'no_hp' => $value['no_hp'],
                'address' => $value['address'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
