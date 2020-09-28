<?php

use Illuminate\Database\Seeder;

class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Product::create([
			'category_id' => 1,
			'ar' =>[
				'name' => 'Fujifilm X100T 16 MP Digital Camera (Silver)',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'en' =>[
				'name' => 'Fujifilm X100T 16 MP Digital Camera (Silver)',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'purchase_price' => 500,
			'sale_price' => 600,
			'amount' => 10,
			'image' => 'product_1.png',
			'tag_ids' => '1,4',
			'active' => 1,
        ]);
		\App\Product::create([
			'category_id' => 4,
			'ar' =>[
				'name' => 'Samsung CF591 Series Curved 27-Inch FHD Monitor',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'en' =>[
				'name' => 'Samsung CF591 Series Curved 27-Inch FHD Monitor',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'purchase_price' => 400,
			'sale_price' => 550,
			'amount' => 10,
			'image' => 'product_2.png',
			'tag_ids' => '1,3,5',
			'active' => 1,
        ]);
		\App\Product::create([
			'category_id' => 2,
			'ar' =>[
				'name' => 'Blue Yeti USB Microphone Blackout Edition',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'en' =>[
				'name' => 'Blue Yeti USB Microphone Blackout Edition',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'purchase_price' => 500,
			'sale_price' => 600,
			'amount' => 10,
			'image' => 'product_5.png',
			'tag_ids' => '1,5',
			'active' => 1,
        ]);
		\App\Product::create([
			'category_id' => 4,
			'ar' =>[
				'name' => 'DYMO LabelWriter 450 Turbo Thermal Label Printer',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'en' =>[
				'name' => 'DYMO LabelWriter 450 Turbo Thermal Label Printer',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'purchase_price' => 500,
			'sale_price' => 600,
			'amount' => 10,
			'image' => 'product_4.png',
			'tag_ids' => '1,3,5',
			'active' => 1,
        ]);
		\App\Product::create([
			'category_id' => 1,
			'ar' =>[
				'name' => 'Pryma Headphones, Rose Gold & Grey',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'en' =>[
				'name' => 'Pryma Headphones, Rose Gold & Grey',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'purchase_price' => 500,
			'sale_price' => 600,
			'amount' => 10,
			'image' => 'product_5.png',
			'tag_ids' => '2,4',
			'active' => 1,
        ]);
		\App\Product::create([
			'category_id' => 1,
			'ar' =>[
				'name' => 'Fujifilm X100T 16 MP Digital Camera (Silver) 2',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'en' =>[
				'name' => 'Fujifilm X100T 16 MP Digital Camera (Silver) 2',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'purchase_price' => 500,
			'sale_price' => 600,
			'amount' => 10,
			'image' => 'product_6.png',
			'tag_ids' => '3,4',
			'active' => 1,
        ]);
		\App\Product::create([
			'category_id' => 2,
			'ar' =>[
				'name' => 'Samsung CF591 Series Curved 27-Inch FHD Monitor 2',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'en' =>[
				'name' => 'Samsung CF591 Series Curved 27-Inch FHD Monitor 2',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'purchase_price' => 500,
			'sale_price' => 600,
			'amount' => 10,
			'image' => 'product_7.png',
			'tag_ids' => '1,5',
			'active' => 1,
        ]);
		\App\Product::create([
			'category_id' => 4,
			'ar' =>[
				'name' => 'Blue Yeti USB Microphone Blackout Edition 2',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'en' =>[
				'name' => 'Blue Yeti USB Microphone Blackout Edition 2',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'purchase_price' => 500,
			'sale_price' => 600,
			'amount' => 10,
			'image' => 'product_8.png',
			'tag_ids' => '3,5',
			'active' => 1,
        ]);
		\App\Product::create([
			'category_id' => 1,
			'ar' =>[
				'name' => 'DYMO LabelWriter 450 Turbo Thermal Label Printer 2',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'en' =>[
				'name' => 'DYMO LabelWriter 450 Turbo Thermal Label Printer 2',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'purchase_price' => 500,
			'sale_price' => 600,
			'amount' => 10,
			'image' => 'product_9.png',
			'tag_ids' => '1,4',
			'active' => 1,
        ]);
		\App\Product::create([
			'category_id' => 2,
			'ar' =>[
				'name' => 'Pryma Headphones, Rose Gold & Grey 2',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'en' =>[
				'name' => 'Pryma Headphones, Rose Gold & Grey 2',
				'description' => 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut...',
			],
			'purchase_price' => 500,
			'sale_price' => 600,
			'amount' => 10,
			'image' => 'product_5.png',
			'tag_ids' => '1,5',
			'active' => 1,
        ]);
		
		
    }
}
