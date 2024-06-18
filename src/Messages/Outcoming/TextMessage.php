<?php

namespace Santiago\WhatsappSdk\Messages\Outcoming;

use Santiago\WhatsappSdk\Objects\Message;

class TextMessage extends Message
{
    private string $body;
    private bool $previewUrl;
    public function __construct(
        string $phoneNumber,
        string $body,
        ?bool $previewUrl = null,
        ?string $replyingTo = null
    ) {
        parent::__construct($phoneNumber, 'text', $replyingTo);
        $this->body = $body;
        $this->previewUrl = $previewUrl ?: false;
    }
    public function toArray(): array
    {
        return parent::toArray() + ['text' => [
            'preview_url' => $this->previewUrl,
            'body' => $this->body
        ]];
    }
}
