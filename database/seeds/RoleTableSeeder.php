<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Super Admin',
            'Admin',
            'Customer'
        ];

        if (!empty($roles)) {
            foreach ($roles as $role) {
                Role::firstOrCreate(['name' => $role]);
            }
        }
    }
}
