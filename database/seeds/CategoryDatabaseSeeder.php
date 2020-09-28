<?php

use Illuminate\Database\Seeder;

class CategoryDatabaseSeeder extends Seeder
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
	   ]);
	   \App\Category::create([
			'ar' =>[
				'name' => 'النساء',
				'slug' => 'النساء',
			],
			'en' =>[
				'name' => 'women',
				'slug' => 'women',
			],
			'active' => 1,
	   ]);
	   \App\Category::create([
			'ar' =>[
				'name' => 'الاطفال',
				'slug' => 'الاطفال',
			],
			'en' =>[
				'name' => 'children',
				'slug' => 'children',
			],
			'active' => 1,
	   ]);
	   \App\Category::create([
			'ar' =>[
				'name' => 'الاكسيسوارات',
				'slug' => 'الاكسيسوارات',
			],
			'en' =>[
				'name' => 'Accessories',
				'slug' => 'Accessories',
			],
			'active' => 1,
	   ]);
    }
}
