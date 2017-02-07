<?php

use Illuminate\Database\Seeder;

class SuitSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'image' => '1486458274-shtany@3x.png', 'price' => null, 'available_as_default' => 1,],

        ];

        foreach ($items as $item) {
            \App\Suit::create($item);
        }
    }
}
