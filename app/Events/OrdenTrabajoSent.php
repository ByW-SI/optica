<?php

namespace App\Events;

use App\User;
use App\OrdenTrabajo;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class OrdenTrabajoSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * User that sent the message
     *
     * @var User
     */
    public $user;

    /**
     * OrdenTrabajo details
     *
     * @var Message
     */
    public $orden_trabajo;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User  $user, OrdenTrabajo $orden_trabajo)
    {
        $this->user = $user;
        $this->orden_trabajo = $orden_trabajo;
    }

   

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('orden_trabajo');
    }

    public function broadcastAs()
{
    return 'ordenCreado';
}
}
