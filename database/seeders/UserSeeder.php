<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
            'name' => 'Administrador',
            'tipo_id' => 1,
            'email' => 'secretaria@ibape-nacional.com.br',
            'status_id' => 4,
            'password' => Hash::make('123456'),
        ])->givePermissionTo('admin');
    }
}
