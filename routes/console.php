<?php
use Illuminate\Support\Facades\Schedule;
use App\Events\MediaScheduleStarted;

Schedule::command('media:dispatch')
    ->everyMinute();

