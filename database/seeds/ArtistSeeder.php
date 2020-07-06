<?php

use Illuminate\Database\Seeder;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert([
            [
                'user_id' => 3,
                'biography' => 'biografia del artista',
                'birthday' => '1994-01-25',
                'tel_cel' => '0000000',
                'location'  => 'Bolivia'
            ]
        ]);
        DB::table('artist_cvs')->insert([
            [
                'artist_id' => 1,
                'type_cv' => 'url',
                'curriculum' => 'www.cv.com'
            ]
        ]);
        DB::table('artist_art_categories')->insert([
            [
                'artist_id' => 1,
                'category_id' => 1
            ]
        ]);
    }
}
