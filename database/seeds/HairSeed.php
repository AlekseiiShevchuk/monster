<?php

use Illuminate\Database\Seeder;

class HairSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'image' => '1486458194-volosy@3x.png', 'price' => null, 'available_as_default' => 1,],

        ];

        foreach ($items as $item) {
            \App\Hair::firstOrCreate($item);
        }
    }
}
