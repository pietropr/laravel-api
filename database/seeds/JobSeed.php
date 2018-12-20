<?php

use Illuminate\Database\Seeder;

class JobSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Models\Job::create([
            'titulo' => str_random(10),
            'descricao' => str_random(191),
            'local' => 'São Paulo / SP',
            'remoto' => 'no',
            'tipo' => 3,
            'company_id' => 1,
        ]);
    }
}
