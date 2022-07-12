<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestNew implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

  public $cat;

  public function __construct($cat)
  {
      $this->cat = $cat;
  }

  public function broadcastOn()
  {
      return ['add-channel'];
  }

  public function broadcastAs()
  {
      return 'add-event';
  }

public function broadcastWith()
    {
        return [
            'id' => $this->cat->id,
            'name' => $this->cat->name
        ];
    }
}
