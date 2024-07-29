<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
         // Create a password hash
        $password = password_hash('password123', PASSWORD_BCRYPT);
         $data = 
         [
         'title' => 'Mr.',
         'fname' => 'Jajja',
         'lname' => 'Guga',
         'email' => 'devjajja@gmail.com',
         'password' => $password,
         'created_at' => date('Y-m-d H:i:s'),
         'updated_at' => date('Y-m-d H:i:s'),
         'deleted_at' => null,
         ];

         $this->db->table('users')->insert($data);
    }
}
