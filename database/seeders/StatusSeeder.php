<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'status' => 'Aprovado',
            'tipo' => '1',
            'created_at' => Carbon::now(),
        ]);

        DB::table('statuses')->insert([
            'status' => 'Reprovado',
            'tipo' => '1',
            'created_at' => Carbon::now(),
        ]);

        DB::table('statuses')->insert([
            'status' => 'Análise',
            'tipo' => '1',
            'created_at' => Carbon::now(),
        ]);

        DB::table('statuses')->insert([
            'status' => 'Ativo',
            'tipo' => '2',
            'created_at' => Carbon::now(),
        ]);

        DB::table('statuses')->insert([
            'status' => 'Inativo',
            'tipo' => '2',
            'created_at' => Carbon::now(),
        ]);
    }
}
