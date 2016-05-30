<?php

use Illuminate\Database\Seeder;

class WorkTypesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\WorkTypeModel::create([
            'name' => 'Стаття'
        ]);
        \App\WorkTypeModel::create([
            'name' => 'Дисертація'
        ]);
        \App\WorkTypeModel::create([
            'name' => 'Тези'
        ]);
        \App\WorkTypeModel::create([
            'name' => 'Кафедральний звіт'
        ]);
    }
}
