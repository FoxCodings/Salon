<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatMensaje implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $usuario;
    public $mensaje;
    public $nombre_persona;
    public function __construct($usuario,$mensaje,$nombre_persona)
    {
      $this->usuario = $usuario;
      $this->mensaje = $mensaje;
      $this->nombre_persona = $nombre_persona;


    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return 'chat-channel';
    }

    public function broadcastAs()
    {
        return "chat-event";
    }
}
