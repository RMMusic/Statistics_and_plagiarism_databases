<?php

use Illuminate\Database\Seeder;

class options extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Options::create([
            'key' => 'title',
            'name' => 'Your title',
            'description' => 'Enter your title',
            'tag' => 'options-input',
            'value' => 'Your title',
            'group' => '0',
            'columns' => '4',
        ]);
        \App\Options::create([
            'key' => 'themes',
            'name' => 'Color theme',
            'description' => 'Change color theme',
            'tag' => 'options-select',
            'value' => 'skin-blue',
            'options' => '[
                {"name":"skin-black"}, 
                {"name":"skin-black-light"},
                {"name":"skin-blue"},
                {"name":"skin-blue-light"},
                {"name":"skin-green"},
                {"name":"skin-green-light"},
                {"name":"skin-purple"},
                {"name":"skin-purple-light"},
                {"name":"skin-red"},
                {"name":"skin-red-light"},
                {"name":"skin-yellow"},
                {"name":"skin-yellow-light"}
                ]',
            'group' => '0',
            'columns' => '4',
        ]);
    }
}