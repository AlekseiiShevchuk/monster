<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
//        $this->call(BodySeed::class);
//        $this->call(HairSeed::class);
//        $this->call(MaskSeed::class);
//        $this->call(RoleSeed::class);
//        $this->call(SuitSeed::class);
//        $this->call(TestSeed::class);
//        $this->call(UserSeed::class);
        $this->call(LocalizationsSeed::class);

    }
}
