<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipo;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Tipo::create([
            'tipo' => 'Administrador',
        ]);

         Tipo::create([
            'tipo' => 'Candidato',
        ]);

         Tipo::create([
            'tipo' => 'Julgador',
        ]);
    }
}
