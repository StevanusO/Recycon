<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "username" => "user_1",
                "email" => "user_1@gmail.com",
                "password" => Hash::make('user_1'),
                "is_admin" => false
            ],
            [
                "username" => "user_2",
                "email" => "user_2@gmail.com",
                "password" => Hash::make('user_2'),
                "is_admin" => false
            ]
        ];

        $item_cats = [
            ["name" => "Recycle"],
            ["name" => "Second"]
        ];

        $items = [
            [
                "name" => "used can",
                "price" => 1500,
                "description" => "A used can i collect",
                "image" => "group_of_can.png",
                "category" => "Recycle"
            ],

            [
                "name" => "used can 2",
                "price" => 1500,
                "description" => "A used can i collect",
                "image" => "group_of_can.png",
                "category" => "Recycle"
            ],

            [
                "name" => "used can 3",
                "price" => 1500,
                "description" => "A used can i collect",
                "image" => "group_of_can.png",
                "category" => "Recycle"
            ],

            [
                "name" => "used can 4",
                "price" => 1500,
                "description" => "A used can i collect",
                "image" => "group_of_can.png",
                "category" => "Recycle"
            ]
        ];

        foreach ($users as $user) {
            User::insert($user);
        }


        foreach ($items as $item) {
            Item::insert($item);
        }
    }
}
