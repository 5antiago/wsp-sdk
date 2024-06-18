<?php

namespace Santiago\WhatsappSdk\Objects;

use Santiago\WhatsappSdk\Enums\MediaTypesSupported;
use Santiago\WhatsappSdk\Interfaces\Arrayable;
use Santiago\WhatsappSdk\Interfaces\Jsonable;

class Media implements Jsonable, Arrayable
{
    private MediaTypesSupported $type;
    private ?string $id;
    private ?string $url;
    private ?string $caption;
    private ?string $filename;

    public function __construct(
        MediaTypesSupported $type,
        ?string $id,
        ?string $url,
        ?string $caption = null,
        ?string $filename = null
    ) {
        if (($type == MediaTypesSupported::Audio || $type == MediaTypesSupported::Sticker) && $caption) {
            throw new \Exception('Caption is not supported for audio and sticker media');
        }
        if ($type != MediaTypesSupported::Document && $filename) {
            throw new \Exception('Filename is not supported for non-document media');
        }
        if (!$id && !$url) {
            throw new \Exception('Media must have an id or url');
        }
        $this->id = $id;
        $this->type = $type;
        $this->url = $url;
        $this->caption = $caption;
        $this->filename = $filename;
    }
    public function getType(): MediaTypesSupported
    {
        return $this->type;
    }
    public function toJson(): string
    {
        return json_encode($this->toArray());
    }
    public function toArray(): array
    {
        return $this->url ? [
            'url' => $this->url,
            'caption' => $this->caption,
            'filename' => $this->filename
        ] : [
            'id' => $this->id,
            'caption' => $this->caption,
            'filename' => $this->filename
        ];
    }
}
