<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
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

            'view_any_transaksi',
            'view_transaksi',
            'create_transaksi',
            'update_transaksi',
            'delete_transaksi',

            'view_any_blog',
            'view_blog',
            'create_blog',
            'update_blog',
            'delete_blog',
            'delete_any_blog',

            'view_any_divisi',
            'view_divisi',
            'create_divisi',
            'update_divisi',
            'delete_divisi',
            'delete_any_divisi',

            'view_any_program',
            'view_program',
            'create_program',
            'update_program',
            'delete_program',
            'delete_any_program',

            'view_any_student',
            'view_student',
            'create_student',
            'update_student',
            'delete_student',
            'delete_any_student',

            'view_any_mentor',
            'view_mentor',
            'create_mentor',
            'update_mentor',
            'delete_mentor',
            'delete_any_mentor',

            'view_role',
            'view_any_role',
            'create_role',
            'update_role',
            'delete_role',
            'delete_any_role',

            'page_Logs',

            'page_DiskonPage',

            'view_dashboard',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        $superAdmin = Role::firstOrCreate(['name' => 'super_admin', 'guard_name' => 'web']);
        $mentor = Role::firstOrCreate(['name' => 'mentor', 'guard_name' => 'web']);
        $student = Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);

        $superAdmin->syncPermissions(Permission::all());

        $mentorPermissions = [
            'view_any_kursus',
            'view_kursus',
            'create_kursus',
            'update_kursus',
            'view_any_student',
            'view_student',
            'view_any_transaksi',
            'view_transaksi',
        ];
        $mentor->syncPermissions($mentorPermissions);

        $adminUser = User::where('email', 'admin@laos.test')->first();
        if ($adminUser && !$adminUser->hasRole('super_admin')) {
            $adminUser->assignRole('super_admin');
            echo "Assigned super_admin role to {$adminUser->email}\n";
        }

        $filamentUser = User::where('email', 'force@gmail.com')->first();
        if ($filamentUser && !$filamentUser->hasRole('super_admin')) {
            $filamentUser->assignRole('super_admin');
            echo "Assigned super_admin role to {$filamentUser->email}\n";
        }
    }
}
