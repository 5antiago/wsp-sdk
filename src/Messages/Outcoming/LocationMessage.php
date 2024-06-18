<?php

namespace Santiago\WhatsappSdk\Messages\Outcoming;

use Santiago\WhatsappSdk\Enums\SupportedLanguages;
use Santiago\WhatsappSdk\Objects\Location;
use Santiago\WhatsappSdk\Objects\Message;

class LocationMessage extends Message
{
    public function __construct(
        private string $to,
        private Location $location,
        private ?string $replyingTo = null,
    ) {
        parent::__construct($to, 'location', $replyingTo);
    }
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
    public function toArray(): array
    {
        return [
            'location' => $this->location->toArray(),
        ];
    }
}
