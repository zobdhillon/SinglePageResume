<?php

namespace App\DataObjects;

readonly class Resume
{
    /**
     * @param  list<WorkExperience>  $work
     * @param  list<VolunteerExperience>  $volunteer
     * @param  list<Education>  $education
     * @param  list<Award>  $awards
     * @param  list<Certificate>  $certificates
     * @param  list<Publication>  $publications
     * @param  list<Skill>  $skills
     * @param  list<SpokenLanguage>  $languages
     * @param  list<Interest>  $interests
     * @param  list<ResumeReference>  $references
     * @param  list<Project>  $projects
     */
    public function __construct(
        public Basics $basics = new Basics,
        public array $work = [],
        public array $volunteer = [],
        public array $education = [],
        public array $awards = [],
        public array $certificates = [],
        public array $publications = [],
        public array $skills = [],
        public array $languages = [],
        public array $interests = [],
        public array $references = [],
        public array $projects = []
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            basics: Basics::fromArray($data['basics'] ?? []),
            work: array_map(
                static fn (array $item): WorkExperience => WorkExperience::fromArray($item),
                $data['work'] ?? []
            ),
            volunteer: array_map(
                static fn (array $item): VolunteerExperience => VolunteerExperience::fromArray($item),
                $data['volunteer'] ?? []
            ),
            education: array_map(
                static fn (array $item): Education => Education::fromArray($item),
                $data['education'] ?? []
            ),
            awards: array_map(
                static fn (array $item): Award => Award::fromArray($item),
                $data['awards'] ?? []
            ),
            certificates: array_map(
                static fn (array $item): Certificate => Certificate::fromArray($item),
                $data['certificates'] ?? []
            ),
            publications: array_map(
                static fn (array $item): Publication => Publication::fromArray($item),
                $data['publications'] ?? []
            ),
            skills: array_map(
                static fn (array $item): Skill => Skill::fromArray($item),
                $data['skills'] ?? []
            ),
            languages: array_map(
                static fn (array $item): SpokenLanguage => SpokenLanguage::fromArray($item),
                $data['languages'] ?? []
            ),
            interests: array_map(
                static fn (array $item): Interest => Interest::fromArray($item),
                $data['interests'] ?? []
            ),
            references: array_map(
                static fn (array $item): ResumeReference => ResumeReference::fromArray($item),
                $data['references'] ?? []
            ),
            projects: array_map(
                static fn (array $item): Project => Project::fromArray($item),
                $data['projects'] ?? []
            )
        );
    }
}
