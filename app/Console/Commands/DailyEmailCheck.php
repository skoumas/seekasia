<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class DailyEmailCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dailycheck';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Emails Daily after checking user status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::all();
        forEach ($users as $user) {
            $user->calculateStatus();
            $user->sendEmail();
        }
    }
}
