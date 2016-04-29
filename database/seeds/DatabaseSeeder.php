<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('START');
        $this->call(users::class);
        $this->command->info('-----------------------------------------');
        $this->command->info('The Users Services table has been seeded!');
        $this->command->info('-----------------------------------------');
        $this->call(options::class);
        $this->command->info('-----------------------------------------');
        $this->command->info('The Options Services table has been seeded!');
        $this->command->info('-----------------------------------------');
        $this->command->info('END');
    }
}
