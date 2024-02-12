<?php

namespace Santiago\WhatsappSdk\Messages\Outcoming;

use Santiago\WhatsappSdk\Interactions\BaseInteraction;
use Santiago\WhatsappSdk\Interfaces\Jsonable;

class InteractiveMessage implements Jsonable
{
    public function __construct(
        private string $phoneNumber,
        private string $header,
        private string $body,
        private string $footer,
        private BaseInteraction $action,
        private ?string $replyingTo = null
    ) {
    }
    public function toJson(): string
    {
        $data = [
            'messaging_product' => 'whatsapp',
            "recipient_type" => "individual",
            'to' => $this->phoneNumber,
            'type' => 'interactive',
            'interactive' => [
                'type' => $this->action->gettype(),
                'header' => [
                    'type' => 'text',
                    'text' => $this->header
                ],
                'body' => [
                    'text' => $this->body
                ],
                'footer' => [
                    'text' => $this->footer
                ],
                'action' => $this->action->toJson()
            ]
        ];
        if (isset($this->replyingTo)) {
            $data = $data + ['context' => ['message_id' => $this->replyingTo]];
        }
        return json_encode($data);
    }
}
