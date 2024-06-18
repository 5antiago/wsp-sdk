<?php

namespace Santiago\WhatsappSdk\Enums;

enum ParameterTypes: string
{
    case Currency = 'currency';
    case Date_time = 'date_time';
    case document = 'document';
    case image = 'image';
    case text = 'text';
    case video = 'video';
    case payload = 'payload';
}
