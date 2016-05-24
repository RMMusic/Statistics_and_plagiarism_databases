<?php

use Illuminate\Database\Seeder;

class WorkStatusTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\WorkStatusModel::create([
            'name' => 'В роботі'
        ]);
        \App\WorkStatusModel::create([
            'name' => 'Без стат. розрахунків'
        ]);
        \App\WorkStatusModel::create([
            'name' => 'Надано розрахунки'
        ]);
        \App\WorkStatusModel::create([
            'name' => 'Погодженно'
        ]);
        \App\WorkStatusModel::create([
            'name' => 'Цитовано'
        ]);
    }
}
