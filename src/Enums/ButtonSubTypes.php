<?php

namespace Santiago\WhatsappSdk\Enums;

enum ButtonSubTypes: string
{
    case QuickReply = 'quick_reply';
    case Url = 'url';
    case Catalog = 'catalog';
}
