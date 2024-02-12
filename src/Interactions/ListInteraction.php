<?php

namespace Santiago\WhatsappSdk\Interactions;

class ListInteraction extends BaseInteraction
{
    public function __construct()
    {
        parent::__construct('list');
    }
    public function toJson(): string
    {
        return json_encode([]);
    }
}
