<?php

namespace App\DataObjects;

use Illuminate\Support\Carbon;

readonly class Project
{
    /**
     * @param  list<string>  $highlights
     */
    public function __construct(
        public string $name = '',
        public ?Carbon $startDate = null,
        public ?Carbon $endDate = null,
        public string $description = '',
        public array $highlights = [],
        public string $url = ''
    ) {
    }

    public static function fromArray(array $data): self
    {
        $start = $data['startDate'] ?? null;
        $end = $data['endDate'] ?? null;

        return new self(
            name: $data['name'] ?? '',
            startDate: (is_string($start) && $start !== '') ? Carbon::parse($start) : null,
            endDate: (is_string($end) && $end !== '') ? Carbon::parse($end) : null,
            description: $data['description'] ?? '',
            highlights: $data['highlights'] ?? [],
            url: $data['url'] ?? ''
        );
    }
}
