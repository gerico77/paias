<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // public function run()
    // {
    //     DB::table((new User)->getTable())->truncate();

    //     User::insert([
    //         [
    //             'id' => 1,
    //             'name' => 'Admin',
    //             'email' => 'admin@admin.com',
    //             'password' => '$2y$10$GdubO8p..1F4Ic60m0e6Nu3H.0T5k6fhRmd3ozDuqaN.dBD83J9ue',
    //             'role_id' => 1,
    //             'remember_token' => '',
    //         ],
    //     ]);
    // }

    public function run()
    {
        $items = [

            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@admin.com', 'password' => '$2y$10$TVGK0XTVyNNKKTUoJRfWAunxP.jBVCgI4TMkU/tj/kO1O01iorNfq', 'role_id' => 1, 'remember_token' => '', ],

        ];

        foreach ($items as $item) {
            \App\User::create($item);
        }
        factory(App\User::class, 10)->create();
    }
}
