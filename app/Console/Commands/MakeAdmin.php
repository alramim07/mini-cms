<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {email}';



    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Promotes a user to administrator';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');

        $user = User::where('email', $email)->first();

        if (!$user) {
            $this->error("No user found with email: $email");
            return;
        }

        $user->is_admin = true;
        $user->save();

        $this->info("User $email is now an administrator.");
    }
}