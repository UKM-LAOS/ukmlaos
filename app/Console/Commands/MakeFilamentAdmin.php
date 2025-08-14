<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class MakeFilamentAdmin extends Command
{
    protected $signature = 'make:filament-admin {--name=} {--email=} {--password=}';

    protected $description = 'Create a new Filament admin user with super_admin role';

    public function handle()
    {
        $name = $this->option('name') ?? $this->ask('Name');
        $email = $this->option('email') ?? $this->ask('Email address');
        $password = $this->option('password') ?? $this->secret('Password');

        if (User::where('email', $email)->exists()) {
            $this->error('User with this email already exists!');
            return 1;
        }

        $role = Role::firstOrCreate([
            'name' => 'super_admin',
            'guard_name' => 'web'
        ]);

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $user->assignRole('super_admin');

        $this->info('✅ Admin user created successfully!');
        $this->info("📧 Email: {$email}");
        $this->info("🔑 Password: {$password}");
        $this->info("👑 Role: super_admin");

        return 0;
    }
}
