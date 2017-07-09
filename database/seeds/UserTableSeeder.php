<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<50;$i++) {
            DB::table('user')->insert([

                'name' => str_random(5),
                'age' => 22
            ]);
        }
    }
}
