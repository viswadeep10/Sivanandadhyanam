<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MediaScheduleStarted implements ShouldBroadcastNow
{
    public $schedule;

    public function __construct($schedule)
    {
        $this->schedule = [
            'id'    => $schedule->id,
            'type'  => $schedule->type,
            'media'  => asset('uploads/'.$schedule->media),

        ];
    }

    public function broadcastOn(): array
    {
        return [new Channel('video-stream')];
    }

    public function broadcastAs(): string
    {
        return 'video.start';
    }
}
