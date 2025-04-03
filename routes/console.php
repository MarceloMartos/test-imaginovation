<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

// Scheduler
app()->booted(function () {
    $schedule = app(Schedule::class);
    $schedule->command('emails:daily')->everyMinute();
});


// Command definitions
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
