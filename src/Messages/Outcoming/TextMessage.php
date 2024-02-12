<?php

namespace Santiago\WhatsappSdk\Messages\Outcoming;

use Santiago\WhatsappSdk\Interfaces\Jsonable;

class TextMessage implements Jsonable
{
    public function __construct(
        private string $phoneNumber,
        private string $text,
        private ?string $replyingTo = null,
        private ?string $previewUrl = null
    ) {
    }
    public function toJson(): string
    {
        $data = [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $this->phoneNumber,
            'type' => 'text',
            'text' => [
                'preview_url' => $this->previewUrl ?: false,
                'body' => $this->text
            ]
        ];
        if (isset($this->replyingTo)) {
            $data = $data + ['context' => ['message_id' => $this->replyingTo]];
        }
        return json_encode($data);
    }
}
