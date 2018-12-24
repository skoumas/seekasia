<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\DailyEmail as DailyEmail;
use Mail;
use Exception;

class SendDailyEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5;
    public $timeout = 10;
    protected $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        //$email = new DailyEmail();
   
        if ($this->user) {
            $email = new DailyEmail($this->user);
            try {
                Mail::to($this->user->email)->send($email);
                $this->user->last_email = \Carbon\Carbon::now();
                $this->user->save();

            } catch(\Exception $e){
                // Get error here
              
                throw new Exception($e);
             

                
            }
        }
         
    }
 

}
