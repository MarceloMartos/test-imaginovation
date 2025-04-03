<?php

namespace App\Console\Commands;

use App\Mail\DailyEmail;
use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendDailyEmails extends Command
{
    protected $signature = 'emails:daily';
    protected $description = 'Send daily emails to users at their local 5 PM';

    public function handle(): void
    {
        User::query()
            ->whereNotNull(User::EMAIL)
            ->whereNotNull(User::TIMEZONE)
            ->chunkById(100, function ($users) {
                foreach ($users as $user) {
                    $userTime = Carbon::now($user->timezone);

                    if ($userTime->format('H:i') >= '17:00' && $userTime->format('H:i') < '17:01') {
                        Mail::to($user->email)->queue(new DailyEmail($user));
                    }
                }
        });
    }
}
