<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            // Kursus
            'view_any_kursus',
            'view_kursus',
            'create_kursus',
            'update_kursus',
            'delete_kursus',
            'delete_any_kursus',
            'force_delete_kursus',
            'force_delete_any_kursus',
            'restore_kursus',
            'restore_any_kursus',
            'replicate_kursus',
            'reorder_kursus',

            // Transaksi
            'view_any_transaksi',
            'view_transaksi',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $superAdmin = Role::findOrCreate('super_admin');
        $mentor = Role::findOrCreate('mentor');
        $student = Role::findOrCreate('student');

        $mentor->givePermissionTo($permissions);
    }
}
