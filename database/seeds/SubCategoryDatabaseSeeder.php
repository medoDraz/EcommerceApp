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
        \App\Category::create([
		'ar' =>[
				'name' => 'الرجال',
				'slug' => 'الرجال',
			],
			'en' =>[
				'name' => 'men',
				'slug' => 'men',
			],
			'active' => 1,
            'parent_id' => \App\Category::all()->random()->id,
        ]);
    }
    
}
