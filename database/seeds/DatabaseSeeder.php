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
        //factory(App\User::class,50)->create();
       //  factory(App\Category::class,5)->create();
         //factory(App\Manufacture::class,5)->create();
           factory(App\Customer::class,100)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
