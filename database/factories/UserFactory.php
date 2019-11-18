<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Category;
use App\Manufacture;
use App\Customer;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'address'=> $faker->address,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' =>  $password?:$passworde = bcrypt('secret'),  
        'remember_token' => Str::random(10),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    
    return [
        'categoryName'=> $faker->word,
        'categoryDescrition'=> $faker->text,
        'publicationStatus'=> $faker->boolean,
         
    ];
});

$factory->define(App\Manufacture::class, function (Faker $faker) {
    
    return [
        'manufactureName'=> $faker->word,
        'manufactureDescription'=> $faker->text,
        'publicationStatus'=> $faker->boolean,
         
    ];
});
$factory->define(App\Customer::class, function (Faker $faker) {
    
    return [
        'name'=> $faker->name,
        'email'=> $faker->unique()->safeEmail,
        'message'=> $faker->text,
         
    ];
});