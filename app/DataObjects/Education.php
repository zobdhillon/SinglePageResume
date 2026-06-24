<?php

namespace App\DataObjects;

use Illuminate\Support\Carbon;

readonly class Education
{
    /**
     * @param  list<string>  $courses
     */
    public function __construct(
        public string $institution = '',
        public string $url = '',
        public string $area = '',
        public string $studyType = '',
        public ?Carbon $startDate = null,
        public ?Carbon $endDate = null,
        public string $score = '',
        public array $courses = []
    ) {
    }

    public static function fromArray(array $data): self
    {
        $start = $data['startDate'] ?? null;
        $end = $data['endDate'] ?? null;

        return new self(
            institution: $data['institution'] ?? '',
            url: $data['url'] ?? '',
            area: $data['area'] ?? '',
            studyType: $data['studyType'] ?? '',
            startDate: (is_string($start) && $start !== '') ? Carbon::parse($start) : null,
            endDate: (is_string($end) && $end !== '') ? Carbon::parse($end) : null,
            score: $data['score'] ?? '',
            courses: $data['courses'] ?? []
        );
    }
}
