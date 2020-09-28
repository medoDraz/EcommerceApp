<?php

use Illuminate\Database\Seeder;

class TagDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Tag::create([
			'ar' =>[
				'name' => 'ملابس',
			],
			'en' =>[
				'name' => 'cloths',
			],
			'active' => 1,
        ]);
		\App\Tag::create([
			'ar' =>[
				'name' => 'أحذية',
			],
			'en' =>[
				'name' => 'shoes',
			],
			'active' => 1,
        ]);
		\App\Tag::create([
			'ar' =>[
				'name' => 'اكسيسوارات',
			],
			'en' =>[
				'name' => 'Accessories',
			],
			'active' => 1,
        ]);
		\App\Tag::create([
			'ar' =>[
				'name' => 'الرجال',
			],
			'en' =>[
				'name' => 'men',
			],
			'active' => 1,
        ]);
		\App\Tag::create([
			'ar' =>[
				'name' => 'النساء',
			],
			'en' =>[
				'name' => 'women',
			],
			'active' => 1,
        ]);
		\App\Tag::create([
			'ar' =>[
				'name' => 'الاطفال',
			],
			'en' =>[
				'name' => 'children',
			],
			'active' => 1,
        ]);
		\App\Tag::create([
			'ar' =>[
				'name' => 'الكترونيات',
			],
			'en' =>[
				'name' => 'electronics',
			],
			'active' => 1,
        ]);
		\App\Tag::create([
			'ar' =>[
				'name' => 'موبيلات',
			],
			'en' =>[
				'name' => 'mobiles',
			],
			'active' => 1,
        ]);
		\App\Tag::create([
			'ar' =>[
				'name' => 'اجهزة كمبيوتر',
			],
			'en' =>[
				'name' => 'computer',
			],
			'active' => 1,
        ]);
		\App\Tag::create([
			'ar' =>[
				'name' => 'لاب توب',
			],
			'en' =>[
				'name' => 'labtop',
			],
			'active' => 1,
        ]);
		
		
    }
}
