<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use App\Models\Schedule;
use App\Events\MediaScheduleStarted;
use Carbon\Carbon;



class StartScheduledMedia extends Command
{
    protected $signature = 'media:dispatch';

    public function handle()
    {
        $now = Carbon::now('Asia/Kolkata');
        $startTimeBoundary = $now->copy()->subMinutes(30)->toTimeString();
        $endTimeBoundary = $now->toTimeString();

        $schedule = Schedule::where('status', 1)
        ->whereBetween('start_time', [$startTimeBoundary, $endTimeBoundary])
            ->first();
        if ($schedule) {
            $this->info("Found schedule ID: " . $schedule->id);
           broadcast(new MediaScheduleStarted($schedule));
        }
    }
}

