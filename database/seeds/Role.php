<?php

use Illuminate\Database\Seeder;

class Role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert([
            [
                'name_role' => 'User'
            ],
            [
                'name_role' => 'Artists'
            ],
            [
                'name_role' => 'Art-School'
            ],
            [
                'name_role' => 'Administrator'
            ]
        ]);
    }
}
