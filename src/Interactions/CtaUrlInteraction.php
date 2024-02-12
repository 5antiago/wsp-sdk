<?php

namespace Santiago\WhatsappSdk\Interactions;

class CtaUrlInteraction extends BaseInteraction
{
    public function __construct(
        private string $actionText,
        private string $url
    )
    {
        parent::__construct('cta_url');
    }

    public function toJson(): string
    {
        return json_encode([
            'name' => 'cta_url',
            'parameters' => [
                'display_text' => $this->actionText,
                'url' => $this->url
            ]
        ]);
    }
}
