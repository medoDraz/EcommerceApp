<?php

use Illuminate\Database\Seeder;

class SubCategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Category::class, 3)->create([
            'parent_id' => \App\Category::all()->random()->id,
        ]);
    }
    private function getRandomParentId()
    {
        $parent_id =  \App\Category::all()->random()->id;
        return $parent_id;
    }
}
