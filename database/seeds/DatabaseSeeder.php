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
        $this->call(WorkTypesTable::class);
        $this->command->info('---------------------------------------------');
        $this->command->info('The WorkTypesTable table has been seeded!');
        $this->command->info('---------------------------------------------');
        $this->call(WorkStatusTable::class);
        $this->command->info('---------------------------------------------');
        $this->command->info('The WorkStatusTable table has been seeded!');
        $this->command->info('---------------------------------------------');
        $this->call(JobTypesTable::class);
        $this->command->info('---------------------------------------------');
        $this->command->info('The JobTypesTable table has been seeded!');
        $this->command->info('---------------------------------------------');
        $this->call(users::class);
        $this->command->info('---------------------------------------------');
        $this->command->info('The Users table has been seeded!');
        $this->command->info('---------------------------------------------');
        $this->call(options::class);
        $this->command->info('---------------------------------------------');
        $this->command->info('The Options table has been seeded!');
        $this->command->info('---------------------------------------------');
        $this->command->info('END \(0_0)/ ');
    }
}
