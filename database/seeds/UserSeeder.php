<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'role_id' => '4',
                'email' => 'admin@spider.com',
                'password'  => bcrypt('12345678')  
            ], 
            [
                'name' => 'escuela',
                'role_id' => '3',
                'email' => 'escuela@spider.com',
                'password'  => bcrypt('12345678')  
            ],
            [
                'name' => 'artista',
                'role_id' => '2',
                'email' => 'artista@spider.com',
                'password'  => bcrypt('12345678')  
            ],
            [
                'name' => 'user',
                'role_id' => '1',
                'email' => 'user@spider.com',
                'password'  => bcrypt('12345678')  
            ]
        ]);
    }
}
