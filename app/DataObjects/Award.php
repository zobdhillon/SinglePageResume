<?php

namespace App\DataObjects;

use Illuminate\Support\Carbon;

readonly class Award
{
    public function __construct(
        public string $title = '',
        public ?Carbon $date = null,
        public string $awarder = '',
        public string $summary = ''
    ) {
    }

    public static function fromArray(array $data): self
    {
        $date = $data['date'] ?? null;

        return new self(
            title: $data['title'] ?? '',
            date: (is_string($date) && $date !== '') ? Carbon::parse($date) : null,
            awarder: $data['awarder'] ?? '',
            summary: $data['summary'] ?? ''
        );
    }
}
