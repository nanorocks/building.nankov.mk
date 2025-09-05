<?php

namespace App\Dtos;

class ActionHistoryDto
{
    public function __construct(
        public readonly string $status,
        public readonly string $message,
        public readonly ?string $log = null
    ) {
    }
}
