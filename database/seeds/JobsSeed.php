<?php

use Illuminate\Database\Seeder;
use App\Job;

class JobsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 100; $i++) {
            App\Job::create([
                'title' => str_random(10),
                'description' => str_random(1000),
                'local' => 'Belo Horizonte/MG',
                'title' => str_random(10),
                'remote' => 'no',
                'type' => 3,
                'company_id' => 1,
            ]);
        }
    }
}
