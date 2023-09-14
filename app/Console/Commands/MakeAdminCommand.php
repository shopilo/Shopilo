<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a new Admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Enter your name');
        $email = $this->ask('Enter your email');
        $password = $this->secret('Enter your password');

        $validate = validator([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ], [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validate->fails()) {
            $this->info('Validation failed!');
            $this->error($validate->errors()->first());
            return;
        }

        $admin = \App\Models\Admin::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role' => 'admin',
        ]);

        $admin->sendEmailVerificationNotification();

        $this->info('Admin created successfully!');

        return;
    }
}
