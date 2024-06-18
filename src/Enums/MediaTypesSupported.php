<?php

namespace Santiago\WhatsappSdk\Enums;

enum MediaTypesSupported: string
{
    case Image = 'image';
    case Video = 'video';
    case Audio = 'audio';
    case Document = 'document';
    case Sticker = 'sticker';
}
