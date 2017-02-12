<?php

use Illuminate\Database\Seeder;

class BodySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [

            [
                'id' => 1,
                'image' => '1486458240-telo1@3x.png',
                'price' => null,
                'available_as_default' => 1,
                'body_miniature_image' => ''
            ],

        ];

        foreach ($items as $item) {
            \App\Body::firstOrCreate($item);
        }
    }
}
