<?php

use App\Category;
use App\Event;
use App\User;
use App\Expert;
use Faker\Generator as Faker;
use Illuminate\Support\Str;



$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'verified' => $verificado = $faker->randomElement([User::USER_VERIFIED, User::USER_UNVERIFIED]),
        'verification_token' => $verificado == User::USER_VERIFIED ? '' : User::generateVerificationToken(),
        'admin' => $faker->randomElement([User::USER_ADMIN, User::USER_REGULAR]),
    ];
});

$factory->define(Expert::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'title' => $faker->jobTitle,
        'biography' => $faker->paragraph(1),
        'photo' => $faker->imageUrl($width = 150, $height = 150)
    ];
});

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
    ];
});

$factory->define(Expert::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'title' =>$faker->word,
        'biography' =>  $faker->paragraph(2),
        'photo' => $faker->randomElement(['https://source.unsplash.com/user/erondu/150x150']),
    ];
});


$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'status' =>  $faker->numberBetween(1,3),
        'image' => $faker->randomElement(['https://source.unsplash.com/user/erondu/600x400']),
        'expert_id' => $faker->numberBetween(1,30),
        'brochure' => $faker->name,
        'objetives' => $faker->paragraph(5),
        'target' => $faker->paragraph(5),
        'information' => $faker->paragraph(5),
    ];
});








