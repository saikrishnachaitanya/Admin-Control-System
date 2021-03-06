<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

         $this->call(CountryTableSeeder::class);
         $this->call(StateTableSeeder::class);
         $this->call(CityTableSeeder::class);
         $this->call(QuotationTableSeeder::class);
         
         DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
