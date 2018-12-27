<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    private function dateDifferenceInDays($to) {
        if ($to==null) {
            return 100000;
        }
        $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', \Carbon\Carbon::now());
        $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $to );
        return $to->diffInDays($from, false);
    }

    public function calculateStatus() {
        $this->last_status_check = \Carbon\Carbon::now();
        $this->save();

        if ($this->status=="active") {
            if ($this->dateDifferenceInDays($this->last_login) > env('EMAIL_F_FOR_INACTIVE', 4)) {
                $this->status = "not_responsive";
                $this->save();
                return;
            }
        } elseif ($this->status=="not_responsive") {
            if ($this->dateDifferenceInDays($this->last_login) > env('DAYS_TO_NONACTIVE', 2)) {
                $this->status = "inactive";
                $this->save();
                return;
            } else {
                $this->status = "active";
                $this->save();
                return;
            }
        }  elseif ($this->status=="inactive") {
            if ($this->dateDifferenceInDays($this->last_login) < env('EMAIL_F_FOR_INACTIVE', 4)) {
                $this->status = "active";
                $this->save();
                return;
            }
        }
    }

    public function sendEmail() {
        if ($this->status=="active") {
            if ($this->dateDifferenceInDays($this->last_email) > env('EMAIL_F_FOR_ACTIVE', 1) ) {
                dispatch(new \App\Jobs\SendDailyEmail($this));
            }
        } elseif ($this->status=="not_responsive") {
            if ($this->dateDifferenceInDays($this->last_email) > env('EMAIL_F_FOR_INACTIVE', 3) ) {
                dispatch(new \App\Jobs\SendDailyEmail($this));
            }
        }  elseif ($this->status=="inactive") {
           // Dont send anything
        }
    }
}
