<?php

namespace App\DataObjects;

use App\Enums\SkillLevel;

readonly class Skill
{
    /**
     * @param  list<string>  $keywords
     */
    public function __construct(
        public string $name = '',
        public ?SkillLevel $level = null,
        public array $keywords = []
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            level: SkillLevel::fromString($data['level'] ?? ''),
            keywords: $data['keywords'] ?? []
        );
    }
}
