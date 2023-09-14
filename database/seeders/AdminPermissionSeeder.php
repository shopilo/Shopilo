<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = config('permissions.admin');

        /**
         * Get the first admin from the database
         */
        $admin = \App\Models\Admin::first();

        /**
         * Loop through the permissions array and create the permissions
         */
        foreach ($permissions as $permission => $actions) {
            foreach ($actions as $action) {
                $admin->permissions()->create([
                    'permission' => $permission . '.' . $action
                ]);
            }
        }
    }
}
