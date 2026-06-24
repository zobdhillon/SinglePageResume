<?php

namespace App\DataObjects;

use Illuminate\Support\Carbon;

readonly class Publication
{
    public function __construct(
        public string $name = '',
        public string $publisher = '',
        public ?Carbon $releaseDate = null,
        public string $url = '',
        public string $summary = ''
    ) {
    }

    public static function fromArray(array $data): self
    {
        $releaseDate = $data['releaseDate'] ?? null;

        return new self(
            name: $data['name'] ?? '',
            publisher: $data['publisher'] ?? '',
            releaseDate: (is_string($releaseDate) && $releaseDate !== '') ? Carbon::parse($releaseDate) : null,
            url: $data['url'] ?? '',
            summary: $data['summary'] ?? ''
        );
    }
}
