<?php

namespace Santiago\WhatsappSdk\Objects;

use Santiago\WhatsappSdk\Interfaces\Arrayable;
use Santiago\WhatsappSdk\Interfaces\Jsonable;

abstract class Message implements Jsonable, Arrayable
{
    public function __construct(
        private string $phoneNumber,
        private string $type,
        private ?string $replyingTo = null
    ) {
    }
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
    public function toArray(): array
    {
        $data =  [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $this->phoneNumber,
            'type' => $this->type,
        ];
        return $this->replyingTo ? $data + ['context' => ['message_id' => $this->replyingTo]] : $data;
    }
}
