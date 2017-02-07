<?php

use Illuminate\Database\Seeder;

class TestSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'name_en' => 'With numbers 0-5', 'name_da' => 'Med talen 0-5', 'group' => '0-10',],
            ['id' => 2, 'name_en' => 'With numbers 0-10', 'name_da' => 'Med talen 0-10', 'group' => '0-10',],
            ['id' => 3, 'name_en' => 'Ten-Buddies', 'name_da' => 'Tiokamrater', 'group' => '0-10',],
            ['id' => 4, 'name_en' => 'Which number is missing?', 'name_da' => 'Vilket tal fattas?', 'group' => '0-10',],

        ];

        foreach ($items as $item) {
            \App\Test::create($item);
        }
    }
}
