<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;


class permission_role extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission_role::create([
            'permisison_id' => '1',
            'role_id' => '1',
        ]);
        Permission_role::create([
            'permisison_id' => '2',
            'role_id' => '1',
        ]);
        Permission_role::create([
            'permisison_id' => '3',
            'role_id' => '1',
        ]);
        Permission_role::create([
            'permisison_id' => '4',
            'role_id' => '1',
        ]);
        Permission_role::create([
            'permisison_id' => '5',
            'role_id' => '1',
        ]);
    }
}
