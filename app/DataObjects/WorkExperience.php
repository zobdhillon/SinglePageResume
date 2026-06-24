<?php

namespace App\DataObjects;

use Illuminate\Support\Carbon;

readonly class WorkExperience
{
    /**
     * @param  list<string>  $highlights
     */
    public function __construct(
        public string $name = '',
        public string $position = '',
        public string $url = '',
        public ?Carbon $startDate = null,
        public ?Carbon $endDate = null,
        public string $summary = '',
        public array $highlights = []
    ) {
    }

    public static function fromArray(array $data): self
    {
        $start = $data['startDate'] ?? null;
        $end = $data['endDate'] ?? null;

        return new self(
            name: $data['name'] ?? '',
            position: $data['position'] ?? '',
            url: $data['url'] ?? '',
            startDate: (is_string($start) && $start !== '') ? Carbon::parse($start) : null,
            endDate: (is_string($end) && $end !== '') ? Carbon::parse($end) : null,
            summary: $data['summary'] ?? '',
            highlights: $data['highlights'] ?? []
        );
    }
}
