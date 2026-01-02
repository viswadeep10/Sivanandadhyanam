<?php

namespace App\Helpers;
use Carbon\Carbon;
use App\Models\Schedule;



class AppHelper
{

    public static function PlaySchedule()
    {
         $now = Carbon::now('Asia/Kolkata');
        $startTimeBoundary = $now->copy()->subMinutes(30)->toTimeString();
        $endTimeBoundary = $now->toTimeString();
        $media = '<img src="'.asset('assets/front/img/hero.jpg').'" alt="Meditation Image">';
        $schedule = Schedule::whereBetween('start_time', [$startTimeBoundary, $endTimeBoundary])
                            ->first();
                    if(auth()->id() && $schedule) 
                    {
                        $path = asset('uploads/'.$schedule->media);
                       switch ($schedule->type) {
                        case 'audio':
                            $media = '<img src="'.asset('assets/front/img/hero.jpg').'" alt="Meditation Image">
                            <audio class="audio-player">
                            <source src="'.$path.'" type="audio/mpeg">
                        </audio>';
                            break;
                        case 'video':
                            $media = '<video width="100%" controls id="videoId">
                                    <source src="'.$path.'" type="video/mp4">
                                    </video>';
                            break;
                        
                    }

                    }
         return $media;          
   
    }

    }
