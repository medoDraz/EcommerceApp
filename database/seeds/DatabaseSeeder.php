<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategoryDatabaseSeeder::class);
        $this->call(SubCategoryDatabaseSeeder::class);
        $this->call(TagDatabaseSeeder::class);
        $this->call(ClientDatabaseSeeder::class);
    }
}
