<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name' => 'Admin', 'prenom_user' => null, 'email' => 'admin@admin.com', 'password' => '$2y$10$ocRulm35h8ixlhKwG9bSkew4Xfu2wcpYbNnC59PHhtxFIWwryzIfu', 'role_id' => 1, 'remember_token' => '',],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
