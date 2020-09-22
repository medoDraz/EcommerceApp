<?php

use Illuminate\Database\Seeder;

class ClientDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Client::create([
            'first_name'=>'mohamed',
            'last_name' =>'ali',
            'email' =>'mohamed@app.com',
            'password' =>bcrypt('12345678'),
        ]);
    }
}
