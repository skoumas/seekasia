<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Cron\CronExpression;
use Carbon\Carbon;

class DailyEmailTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDailyCheck()
    {
        $event = $this->getCommandEvent('dailycheck');

        $test_date = Carbon::now()->startOfDay()->addHours(8);

        for ($i=0; $i < 356; $i++) { 
            $test_date->addDay();
            Carbon::setTestNow($test_date);

            // Run the when() & skip() filters
            $filters_pass = $event->filtersPass($this->app);
            // Test that the Cron expression passes
            $date_passes = $this->isEventDue($event);
            $will_run = $filters_pass && $date_passes;

            // Should only run on first friday of month
            if ($test_date->format('l') === 'Friday' && $test_date->weekOfMonth === 1) {
                $this->assertTrue($will_run, 'Task should run on '. $test_date->toDateTimeString());
            } else {
                $this->assertFalse($will_run, 'Task should not run on '. $test_date->toDateTimeString());
            }
        }
    }

     /**
     * Get the event matching the given command signature from the scheduler
     * 
     * @param  string  $command_signature
     * 
     * @return Illuminate\Console\Scheduling\Event
     */
    private function getCommandEvent($command_signature)
    {
        $schedule = app()->make(Schedule::class);

        $event = collect($schedule->events())->first(function (Event $event) use ($command_signature) {
            return stripos($event->command, $command_signature);
        });

        if (!$event) {
            $this->fail('Event for '. $command_signature .' not found');
        }

        return $event;
    }


    /**
     * Determine if the Cron expression passes.
     * 
     * Copied from the protected method Illuminate\Console\Scheduling\Event@isEventDue
     * 
     * @return bool
     */
    private function isEventDue(Event $event)
    {
        $date = Carbon::now();

        if ($event->timezone) {
            $date->setTimezone($event->timezone);
        }

        return CronExpression::factory($event->expression)->isDue($date->toDateTimeString());
    }

}
