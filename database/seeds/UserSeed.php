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
            
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$ar9XCiyK1UykNX/XDr2xLeVvbvJaWh8yxILBbqZsOcJTtLQ2sxhQy', 'role_id' => 1, 'remember_token' => '', 'device_id' => null, 'current_hair_id' => null, 'current_mask_id' => null, 'current_body_id' => null, 'current_suit_id' => null,],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
    }
}
