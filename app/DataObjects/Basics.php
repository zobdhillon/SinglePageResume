<?php

namespace App\DataObjects;

use App\DataObjects\SocialProfile;

readonly class Basics
{
    /**
     * @param  list<SocialProfile>  $profiles
     */
    public function __construct(
        public string $name = '',
        public string $label = '',
        public string $image = '',
        public string $email = '',
        public string $phone = '',
        public string $url = '',
        public string $summary = '',
        public Location $location = new Location(),
        public array $profiles = []
    ) {
    }

    public static function fromArray(array $data): self
    {
        $profiles = array_map(
            static fn (array $item): SocialProfile => SocialProfile::fromArray($item),
            $data['profiles'] ?? []
        );

        return new self(
            name: $data['name'] ?? '',
            label: $data['label'] ?? '',
            image: $data['image'] ?? '',
            email: $data['email'] ?? '',
            phone: $data['phone'] ?? '',
            url: $data['url'] ?? '',
            summary: $data['summary'] ?? '',
            location: Location::fromArray($data['location'] ?? []),
            profiles: $profiles
        );
    }
}
