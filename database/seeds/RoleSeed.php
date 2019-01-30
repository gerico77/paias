<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table((new Role)->getTable())->truncate();

        Role::insert([
            [
                'id' => 1,
                'title' => 'Administrator (can create other users)',
            ],
            [
                'id' => 2,
                'title' => 'Simple user',
            ],
        ]);
    }
}
