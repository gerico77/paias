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
        $items = [

        ];

        foreach ($items as $item) {
            \App\Professor::create($item);
        }
    }
}
