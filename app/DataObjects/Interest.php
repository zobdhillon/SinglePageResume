<?php

namespace App\DataObjects;

readonly class Interest
{
    /**
     * @param  list<string>  $keywords
     */
    public function __construct(
        public string $name = '',
        public array $keywords = []
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            keywords: $data['keywords'] ?? []
        );
    }
}
