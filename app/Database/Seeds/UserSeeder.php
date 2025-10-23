<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserModel;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $userModel = new UserModel();

        // Data for the users
        $users = [
            [
                'nama'       => 'Admin Coga',
                'email'      => 'admin@coga.com',
                'password'   => password_hash('password123', PASSWORD_BCRYPT),
                'role'       => 'admin',
                'no_telpon'  => '081234567890',
            ],
            [
                'nama'       => 'Budi Kapster',
                'email'      => 'budi@coga.com',
                'password'   => password_hash('password123', PASSWORD_BCRYPT),
                'role'       => 'kapster',
                'no_telpon'  => '081234567891',
            ],
            [
                'nama'       => 'Andi Pelanggan',
                'email'      => 'andi@pelanggan.com',
                'password'   => password_hash('password123', PASSWORD_BCRYPT),
                'role'       => 'pelanggan',
                'no_telpon'  => '081234567892',
            ],
        ];

        // Using the Model to insert data
        // This is better than db->insert() as it will trigger model events.
        foreach ($users as $user) {
            // Check if user already exists to avoid errors on re-running the seeder
            if ($userModel->findByEmail($user['email']) === null) {
                $userModel->insert($user);
                echo "User created: " . $user['email'] . "\n";
            } else {
                echo "User already exists: " . $user['email'] . "\n";
            }
        }
    }
}
