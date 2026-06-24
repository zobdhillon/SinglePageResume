<?php

namespace App\DataObjects;

use Illuminate\Support\Carbon;

readonly class Certificate
{
    public function __construct(
        public string $name = '',
        public ?Carbon $date = null,
        public string $issuer = '',
        public string $url = ''
    ) {
    }

    public static function fromArray(array $data): self
    {
        $date = $data['date'] ?? null;

        return new self(
            name: $data['name'] ?? '',
            date: (is_string($date) && $date !== '') ? Carbon::parse($date) : null,
            issuer: $data['issuer'] ?? '',
            url: $data['url'] ?? ''
        );
    }
}
