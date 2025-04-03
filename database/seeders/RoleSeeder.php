<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::findOrCreate('super_admin');
        $mentor = Role::findOrCreate('mentor');
        Role::findOrCreate('student');

        $mentor->givePermissionTo([
            'view_any_course',
            'view_course',
            'create_course',
            'update_course',
            'delete_course',
            'delete_any_course',
            'force_delete_course',
            'force_delete_any_course',
            'restore_course',
            'restore_any_course',
            'replicate_course',
            'reorder_course',
        ]);
    }
}
