<?php

namespace Santiago\WhatsappSdk\Components;

use Santiago\WhatsappSdk\Interfaces\Jsonable;

class Row implements Jsonable
{

    public function __construct(
        private readonly string $id,
        private readonly string $title,
        private readonly ?string $description
        ){}

    public function toJson():  string
    {
        return json_encode([
            'id' => $this->id,
            'title' => $this->title,
            'description'=> $this->description ?? '',
        ]);
    }
}
