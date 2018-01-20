<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Company::create([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'website' => 'company.com.br',
            'logo' => 'company.com.br',
            'password' => bcrypt('secret'),
        ]);
    }
}
