<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            [
                "name" => "Food",
                "slug" => "food",
                "icon" => "images/ic_food.svg",
            ],
            [
                "name" => "Drink",
                "slug" => "drink",
                "icon" => "images/ic_drink.svg",
            ],
            [
                "name" => "Snack",
                "slug" => "snack",
                "icon" => "images/ic_snack.svg",
            ],
            [
                "name" => "Package",
                "slug" => "package",
                "icon" => "images/ic_package.svg",
            ],

        ]);
    }
}
