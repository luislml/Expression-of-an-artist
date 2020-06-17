<?php

use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('art_categories')->insert([
            ['name' => 'Pintura'],
            ['name' => 'Literatura'],
            ['name' => 'Grabado'],
            ['name' => 'Fotografía'],
            ['name' => 'Escultura'],
            ['name' => 'Diseño e Ilustración'],
            ['name' => 'Dibujo'],
            ['name' => 'Cómic']
        ]);
    }
}
