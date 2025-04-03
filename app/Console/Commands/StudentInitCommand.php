<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class StudentInitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student-init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $student = User::create([
            'name' => 'Student 1',
            'email' => 'student@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $student->assignRole('student');

        $this->info('Student created successfully');
    }
}
