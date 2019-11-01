<?php

use App\Category;
use App\Event;
use App\User;
use App\Expert;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Eliminamos la data

        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // desactivamos la verificacion de los Foreign Keys

        User::truncate();
        Category::truncate();
        Expert::truncate();
        Event::truncate();
        DB::table('category_event')->truncate();

        User::flushEventListeners();
        Category::flushEventListeners();
        Expert::flushEventListeners();
        Event::flushEventListeners();


        // Catidad de entradas a crear

        $usersQuantity = 1000;
        $CategoriesQuantity = 30;
        $EventsQuantity = 1000;
        $ExpertsQuantity = 30;

        // Ejecutamos los Factories

        factory(User::class, $usersQuantity)->create();
        factory(Category::class, $CategoriesQuantity)->create();
        factory(Expert::class, $ExpertsQuantity)->create();
		factory(Event::class, $EventsQuantity)->create()->each(function ($event) {
			   	$categories = Category::all()->random(mt_rand(1, 5))->pluck('id');
			    foreach ($categories as $category)
			    {
                    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
				    DB::table('category_event')->insert([
			            'category_id' => $category,
			            'event_id' => $event->id
			        ]);
			     }

			}
        );





    }
}
