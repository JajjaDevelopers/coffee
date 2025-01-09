<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create a password hash
        $password = password_hash('password123', PASSWORD_BCRYPT);

        // Define the data
        $data = [
            [
                'title' => 'Mr.',
                'fname' => 'Jajja',
                'lname' => 'Guga',
                'phone' => '0786644987',
                'address' => 'Kasubi',
                'role' => 'Admin',
                'email' => 'devjajja@gmail.com',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            // [
            //     'title' => 'Mr.',
            //     'fname' => 'Nuwagaba',
            //     'lname' => 'Deus',
            //     'email' => 'deus.nuwagaba@nucafe.org',
            //     'password' => $password,
            //     'created_at' => date('Y-m-d H:i:s'),
            //     'updated_at' => date('Y-m-d H:i:s'),
            //     'deleted_at' => null,
            // ],
            // [
            //     'title' => 'Mr.',
            //     'fname' => 'Madaba',
            //     'lname' => 'Emmanuel',
            //     'email' => 'emmanuel.madaba@nucafe.org',
            //     'password' => $password,
            //     'created_at' => date('Y-m-d H:i:s'),
            //     'updated_at' => date('Y-m-d H:i:s'),
            //     'deleted_at' => null,
            // ],
        ];

        // Insert the data into the database
        $this->db->table('users')->insertBatch($data);
    }
}
