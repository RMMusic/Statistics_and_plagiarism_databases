<?php

use Illuminate\Database\Seeder;

class JobTypesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\JobTypeModel::create([
            'name' => 'Статистичні обрахунки'
        ]);
        \App\JobTypeModel::create([
            'name' => 'Академічний плагіат'
        ]);
    }
}
