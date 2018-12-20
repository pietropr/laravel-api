<?php

use Illuminate\Database\Seeder;

class CompaniesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Company::create([
            'nome' => str_random(10),
            'email' => str_random(5).'gmail.com',
            'senha' => bcrypt('123'),
        ]);
    }
}
