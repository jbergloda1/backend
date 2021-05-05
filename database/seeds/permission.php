<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'review_product'],
            ['name' => 'update_product'],
            ['name' => 'delete_product'],
            ['name' => 'restore_product'],
            ['name' => 'force_delete_product'],
        ]);

    }
}
