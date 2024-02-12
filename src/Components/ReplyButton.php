<?php

namespace Santiago\WhatsappSdk\Components;

use Santiago\WhatsappSdk\Interfaces\Jsonable;

class ReplyButton implements Jsonable
{

    public function __construct(
        private readonly string $id,
        private readonly string $title
        ){}

    public function toJson(): string
    {
        return json_encode([
            'type'=> "reply",
            'reply' => [
                'id' => $this->id,
                'title' => $this->title
                ]
        ]);
    }
}
