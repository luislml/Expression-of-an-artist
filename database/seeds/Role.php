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
            ['name_role' => 'user'],
            ['name_role' => 'artist'],
            ['name_role' => 'art-school'],
            ['name_role' => 'admin']
        ]);
    }
}
