<?php

use Illuminate\Database\Seeder;

class MaskSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'image' => '1486458223-maska@3x.png', 'price' => null, 'available_as_default' => 1,],

        ];

        foreach ($items as $item) {
            \App\Mask::firstOrCreate($item);
        }
    }
}
