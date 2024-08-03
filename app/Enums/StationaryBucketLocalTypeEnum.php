<?php

namespace App\Enums;

enum StationaryBucketLocalTypeEnum: string
{
    case INTERNAL = 'I';
    case EXTERNAL = 'E';
    case BOTH = 'B';
}
