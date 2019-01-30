<?php

use Illuminate\Database\Seeder;

class ProfessorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table((new Professor)->getTable())->truncate();

        Professor::insert([
            [
                // 'id' => '',
                // 'name' => '',
                // 'email' => '',
                // 'joining_date' => '',
                // 'password' => '',
                // 'designation' => '',
                // 'department' => '',
                // 'gender' => '',
                // 'role_id' => ,
                // 'remember_token' => '',
            ],
        ]);
    }
}
